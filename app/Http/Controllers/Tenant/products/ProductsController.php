<?php

namespace App\Http\Controllers\Tenant\products;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Tenant\ProductStoreRequest;
use App\Services\Tenant\ProductStoreService;
use App\Models\Tenant;
use App\Models\Game;
use App\Models\Client;
use App\Models\GameOrder;
use App\Models\GiftCardOrder;
use App\Models\Wallet;
use App\Models\GiftCardCode;

class ProductsController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::with('packages', 'giftCard')->get();
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        $tenantName =  $tenant->name;
        return view('tenant.products.index', compact('games', 'tenantName'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request, ProductStoreService $service)
    {
        $service->create($request->validated());

        return redirect()
            ->back()
            ->with('success', 'games created successfully');
    }
}
