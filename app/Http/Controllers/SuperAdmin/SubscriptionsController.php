<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Services\superAdmin\SubscriptionManagementService;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    /**
     * Display tenants subscriptions list with available plans
     */
    public function index(SubscriptionManagementService $service)
    {
        [$tenants, $plans] = $service->getSubscriptionsData();

        return view('super-admin.subscriptions.index', compact('tenants', 'plans'));
    }

    /**
     * Assign a plan to a tenant and activate subscription
     */
    public function assign(
        Request $request,
        Tenant $tenant,
        SubscriptionManagementService $service
    ) {
        $service->assignPlanToTenant($tenant, $request);

        return back()->with('success', 'تم تحديث اشتراك التاجر');
    }

    /**
     * Toggle tenant subscription status (active / suspended)
     */
    public function toggleStatus(
        Tenant $tenant,
        SubscriptionManagementService $service
    ) {
        $service->toggleTenantSubscriptionStatus($tenant);

        return back()->with('success', 'تم تحديث حالة المتجر بنجاح');
    }
}
