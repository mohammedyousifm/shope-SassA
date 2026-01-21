<?php

namespace App\Http\Controllers\clients\orders;

use App\Http\Controllers\Controller;
use App\Http\Requests\Clients\StoreGameOrderRequest;
use App\Services\Clients\GameOrderService;


class PackageOrderController extends Controller
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
