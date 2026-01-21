<?php

namespace App\Services\Tenant;

use App\Models\Clentnotification;
use App\Models\Client;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Exceptions\AlreadyAppliedException;

class UserBalanceService
{
    /**
     * شحن رصيد المستخدم
     */
    public function addBalance(int $client_id, float $amount): void
    {
        DB::transaction(function () use ($client_id, $amount) {

            // قفل المستخدم
            $client = Client::lockForUpdate()->findOrFail($client_id);

            // جلب أو إنشاء المحفظة مع قفل
            $wallet = Wallet::where('client_id', $client->id)
                ->lockForUpdate()
                ->firstOrCreate(
                    ['client_id' => $client->id],
                    ['balance' => 0]
                );

            // زيادة الرصيد
            $wallet->increment('balance', $amount);

            // إشعار المستخدم
            $this->notifyWalletDeposit($client, $wallet, $amount);
        });
    }

    /**
     * إشعار شحن المحفظة
     */
    protected function notifyWalletDeposit(Client $client, Wallet $wallet, float $amount): void
    {
        Clentnotification::create([
            'client_id'   => $client->id,
            'sender_id' => auth()->id(), // admin
            'type'      => 'wallet_deposit',
            'data'      => [
                'title'         => 'تم شحن محفظتك بنجاح',
                'amount'        => $amount,
                'balance_after' => $wallet->balance,
                'admin_message' => 'تم إضافة مبلغ ' . number_format($amount, 0) . ' ج.س إلى محفظتك',
            ],
        ]);
    }
}
