<?php

namespace App\Services\Clients;

use App\Models\WalletDeposit;
use App\Models\DepositMethod;
use App\Models\Client;

class WalletRechargeService
{
    /**
     * Get recharge page data
     */
    public function getRechargeData(Client $client): array
    {
        // Get tenant safely from container
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        return [
            'depositMethods' => DepositMethod::where('is_active', true)
                ->where('tenant_id',  $tenant->id)
                ->get(),

            'deposits' => WalletDeposit::with('method')
                ->where('client_id', $client->id)
                ->latest()
                ->paginate(10),
        ];
    }

    /**
     * Create new wallet deposit
     */
    public function createDeposit(Client $client, array $data): WalletDeposit
    {

        $deposit = WalletDeposit::create([
            'client_id'             => $client->id,
            'deposit_method_id'     => $data['deposit_method_id'],
            'amount'                => $data['amount'],
            'transaction_reference' => $data['transaction_reference'],
            'status'                => 'pending',
        ]);

        // 🔔 notify admin (empty for now)
        $this->notifyAdmin($deposit);

        return $deposit;
    }

    /**
     * Notify admin about new deposit (EMPTY – ready later)
     */
    protected function notifyAdmin(WalletDeposit $deposit): void
    {
        // Mail::to(config('mail.admin_address'))
        //     ->send(new NewWalletDepositMail($deposit));
    }
}
