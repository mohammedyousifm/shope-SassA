<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Tenant;
use App\Models\Feature;
use App\Models\PlatformPayment;

class SuberAdminController extends Controller
{
    public function index()
    {
        $merchantsCount = Tenant::count();

        $activeMerchantsCount = Tenant::where('status', 'active')->count();

        $pendingMerchantsCount = Tenant::where('status', 'pending')->count();

        $suspendedMerchantsCount = Tenant::where('status', 'suspended')->count();

        $platformPaymentsSum = PlatformPayment::sum('amount');

        return view('super-admin.index', compact(
            'merchantsCount',
            'activeMerchantsCount',
            'pendingMerchantsCount',
            'suspendedMerchantsCount',
            'platformPaymentsSum'
        ));
    }
}
