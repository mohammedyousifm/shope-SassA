<?php

namespace App\Http\Controllers\clients\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\Auth\LoginClientRequest;
use App\Services\Clients\Auth\ClientLoginService;
use App\Http\Requests\Clients\StoreGameOrderRequest;
use App\Services\Clients\GameOrderService;
use Illuminate\Http\Request;


class CodeOrderController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameOrderRequest $request, GameOrderService $service)
    {
        $client = auth()->guard('client')->user();

        $service->createOrder($client, $request->validated());

        return back()->with('success', 'تم إنشاء طلب الشحن بنجاح');
    }
}
