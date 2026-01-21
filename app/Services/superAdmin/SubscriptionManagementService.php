<?php

namespace App\Services\superAdmin;

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Http\Request;

class SubscriptionManagementService
{
    /**
     * Get tenants with subscriptions and active plans
     */
    public function getSubscriptionsData(): array
    {
        $tenants = Tenant::with('plan')->latest()->paginate(10);

        $plans = Plan::where('is_active', true)->get();

        return [$tenants, $plans];
    }

    /**
     * Assign plan to tenant and activate subscription
     */
    public function assignPlanToTenant(Tenant $tenant, Request $request): void
    {
        $request->validate([
            'plan_id' => 'required|exists:plans,id',
        ]);

        $plan = Plan::findOrFail($request->plan_id);

        $tenant->update([
            'plan_id'               => $plan->id,
            'subscription_ends_at'  => $plan->price > 0
                ? now()->addDays($plan->duration_days)
                : null,
            'status'                => 'active',
        ]);

        $this->sendSubscriptionAssignedMail($tenant, $plan);
    }

    /**
     * Toggle tenant subscription status
     */
    public function toggleTenantSubscriptionStatus(Tenant $tenant): void
    {
        $tenant->update([
            'status' => $tenant->status === 'active' ? 'suspended' : 'active',
        ]);

        $this->sendSubscriptionStatusChangedMail($tenant);
    }

    /**
     * Send mail when subscription is assigned (empty – future use)
     */
    protected function sendSubscriptionAssignedMail(Tenant $tenant, Plan $plan): void
    {
        // TODO:
        // Mail::to($tenant->user->email)
        //     ->send(new SubscriptionAssignedMail($tenant, $plan));
    }

    /**
     * Send mail when subscription status is changed (empty – future use)
     */
    protected function sendSubscriptionStatusChangedMail(Tenant $tenant): void
    {
        // TODO:
        // Mail::to($tenant->user->email)
        //     ->send(new SubscriptionStatusChangedMail($tenant));
    }
}
