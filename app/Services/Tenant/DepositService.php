<?php

namespace App\Services\Tenant;

use App\Models\WalletDeposit;
use App\Models\DepositMethod;
use App\Models\Notification;
use App\Services\Tenant\UserBalanceService;

class DepositService
{
    /**
     * Get deposits list with filters
     */
    public function getDeposits(array $filters, $tenant)
    {
        return WalletDeposit::query()
            ->with(['client', 'method'])

            // 🔐 Tenant isolation (IMPORTANT)
            ->whereHas('client', function ($q) use ($tenant) {
                $q->where('tenant_id', $tenant->id);
            })

            // 🔍 Search (transaction reference OR client name)
            ->when($filters['search'] ?? null, function ($q, $search) {
                $q->where(function ($q2) use ($search) {
                    $q2->where('transaction_reference', 'like', "%{$search}%")
                        ->orWhereHas('client', function ($u) use ($search) {
                            $u->where('name', 'like', "%{$search}%");
                        });
                });
            })

            // 💰 Filter by amount
            ->when(
                $filters['amount'] ?? null,
                fn($q, $amount) => $q->where('amount', $amount)
            )

            ->latest()
            ->paginate(10)
            ->withQueryString();
    }


    /**
     * Create new deposit method
     */
    public function createMethod(array $data): void
    {
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        DepositMethod::create([
            ...$data,
            'tenant_id' =>  $tenant->id,
            'is_active' => request()->has('is_active'),
        ]);
    }

    /**
     * Update existing deposit method
     */
    public function updateMethod(DepositMethod $method, array $data): void
    {

        $method->update([
            'name'           => $data['name'],
            'account_name'   => $data['account_name'],
            'account_number' => $data['account_number'],
            'is_active'      => request()->boolean('is_active'),
        ]);
    }


    /**
     * Approve wallet deposit
     */
    public function approveDeposit(WalletDeposit $deposit, UserBalanceService $balanceService): void
    {
        if ($deposit->status !== 'pending') {
            abort(400, 'Deposit already processed');
        }

        if ($deposit->client->is_blocked) {
            abort(400, 'User is blocked');
        }

        $balanceService->addBalance(
            $deposit->client_id,
            $deposit->amount
        );

        $deposit->update(['status' => 'approved']);

        $this->notifyClientApproved($deposit);
    }

    /**
     * Reject wallet deposit
     */
    public function rejectDeposit(WalletDeposit $deposit): void
    {
        if ($deposit->status !== 'pending') {
            abort(400, 'Deposit already processed');
        }

        $deposit->update(['status' => 'rejected']);

        Notification::create([
            'user_id'   => $deposit->user_id,
            'sender_id' => auth()->id(),
            'type'      => 'wallet_deposit_rejected',
            'data'      => [
                'title'   => 'Wallet deposit rejected',
                'amount'  => $deposit->amount,
                'message' => 'Your wallet deposit request was rejected.',
            ],
        ]);

        $this->notifyClientRejected($deposit);
    }

    /**
     * Delete deposit method if unused
     */
    public function deleteMethod(DepositMethod $method): void
    {
        if ($method->deposits()->exists()) {
            abort(400, 'Deposit method already used');
        }

        $method->delete();
    }

    /**
     * Notify client when deposit approved (EMPTY)
     */
    protected function notifyClientApproved(WalletDeposit $deposit): void
    {
        // Mail::to($deposit->user->email)
        //     ->send(new DepositApprovedMail($deposit));
    }

    /**
     * Notify client when deposit rejected (EMPTY)
     */
    protected function notifyClientRejected(WalletDeposit $deposit): void
    {
        // Mail::to($deposit->user->email)
        //     ->send(new DepositRejectedMail($deposit));
    }
}
