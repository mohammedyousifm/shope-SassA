<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\User;
use App\Models\Client;
use App\Models\GameOrder;
use App\Models\GiftCardOrder;
use App\Models\Wallet;
use App\Models\GiftCardCode;

class TenantController extends Controller
{

    public function index()
    {

        $totalOrders =
            GameOrder::where('status', 'completed')->count()
            +
            GiftCardOrder::count();

        $tenant = app()->bound('tenant') ? app('tenant') : null;

        $totalBalance = Wallet::whereHas('client', function ($q) use ($tenant) {
            $q->where('tenant_id', $tenant->id);
        })->sum('balance');



        return view('tenant.index', [
            'tenantName' => $tenant->name,
            'user' =>  auth::user(),
            'totalUsers'   => Client::count(),
            'totalOrders' =>  $totalOrders,
            'totalGiftCardSold'   => GiftCardCode::where('is_used', true)->count(),
            'totalBalance' =>  $totalBalance,
        ]);
    }
}
