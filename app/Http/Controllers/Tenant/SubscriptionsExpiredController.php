<?php

namespace App\Http\Controllers\Tenant;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Tenant;
use App\Models\Plan;
use App\Models\User;
use Carbon\Carbon;

class SubscriptionsExpiredController extends Controller
{
    public function index()
    {
        // Get active paid plans
        $plans = Plan::query()
            ->where('is_active', true)
            ->where('price', '>', 0)
            ->get();

        // Get tenant safely from container
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        /**
         * Redirect conditions:
         * - No tenant (central app)
         * - Tenant suspended
         * - Subscription still active
         */
        if (
            !$tenant ||
            $tenant->isSubscriptionActive()
        ) {
            return redirect('/');
        }

        // Only expired tenants reach here
        return view('tenant.subscription.expired', compact('plans'));
    }
}
