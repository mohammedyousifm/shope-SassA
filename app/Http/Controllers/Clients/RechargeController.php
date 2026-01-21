<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreWalletDepositRequest;
use App\Services\Clients\WalletRechargeService;
use App\Models\DepositMethod;

class RechargeController extends Controller
{
    public function index(WalletRechargeService $service)
    {
        $client = auth()->guard('client')->user();

        $userBalance = $client->wallet?->balance ?? 0;

        $data = $service->getRechargeData($client);


        return view('clients.Recharge.index',  compact('client', 'data', 'userBalance'));
    }

    public function store(
        StoreWalletDepositRequest $request,
        WalletRechargeService $service
    ) {
        $client = auth()->guard('client')->user();

        $service->createDeposit($client, $request->validated());

        return redirect()
            ->route('clients.recharge')
            ->with('success', 'تم إرسال طلب التعبئة بنجاح، وسيتم مراجعته قريبًا.');
    }
}
