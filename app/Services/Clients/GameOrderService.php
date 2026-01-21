<?php

namespace App\Services\Clients;

use App\Models\GameOrder;
use App\Models\GamePackage;
use App\Models\Wallet;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class GameOrderService
{
    public function createOrder($client, array $data): void
    {


        DB::transaction(function () use ($client, $data) {

            $package = $this->getActivePackage($data);

            $wallet = $this->getClientWallet($client->id);

            $this->checkBalance($wallet, $package->price);

            $wallet->decrement('balance', $package->price);

            $order = GameOrder::create([
                'client_id'       => $client->id,
                'game_id'         => $data['game_id'],
                'game_package_id' => $package->id,
                'price'           => $package->price,
                'player_id'       => $data['player_id'],
                'status'          => 'pending',
            ]);

            $this->sendOrderMail($client, $order);
        });
    }

    // ------------------------
    // Helper Functions
    // ------------------------

    protected function getActivePackage(array $data)
    {
        $package = GamePackage::where('id', $data['game_package_id'])
            ->where('game_id', $data['game_id'])
            ->where('is_active', true)
            ->first();

        if (! $package) {
            throw ValidationException::withMessages([
                'package' => 'الباقة غير متوفرة أو غير مفعّلة.',
            ]);
        }

        return $package;
    }

    protected function getClientWallet(int $clientId)
    {
        $wallet = Wallet::where('client_id', $clientId)
            ->lockForUpdate()
            ->first();

        if (! $wallet) {
            throw ValidationException::withMessages([
                'wallet' => 'رصيدك غير كافٍ لإتمام الطلب.',
            ]);
        }

        return $wallet;
    }


    protected function checkBalance($wallet, float $price): void
    {
        if ($wallet->balance < $price) {
            throw ValidationException::withMessages([
                'balance' => 'رصيدك غير كافٍ لإتمام الطلب.',
            ]);
        }
    }

    // 📨 Mail (فارغة حاليًا)
    protected function sendOrderMail($client, $order): void
    {
        // سيتم تنفيذها لاحقًا
    }
}
