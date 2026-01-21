<?php

namespace App\Services\superAdmin;

use App\Models\PlatformPayment;
use Illuminate\Support\Facades\DB;

class TenantSubscriptionService
{
    /**
     * Approve payment and activate subscription
     */
    public function approvePayment(PlatformPayment $payment): void
    {
        DB::transaction(function () use ($payment) {

            $this->approvePlatformPayment($payment);

            $this->activateTenantSubscription($payment);

            $this->sendSubscriptionApprovedMail($payment);
        });
    }

    /**
     * Update payment as approved
     */
    protected function approvePlatformPayment(PlatformPayment $payment): void
    {
        $payment->update([
            'status'      => 'approved',
            'approved_at' => now(),
        ]);
    }

    /**
     * Activate tenant subscription
     */
    protected function activateTenantSubscription(PlatformPayment $payment): void
    {
        $tenant = $payment->tenant;
        $plan   = $payment->plan;

        $tenant->update([
            'plan_id'               => $plan->id,
            'plan'                  => $plan->name,
            'subscription_ends_at'  => now()->addDays($plan->duration_days),
            'status'                => 'active',
        ]);
    }

    /**
     * Send mail (empty – future use)
     */
    protected function sendSubscriptionApprovedMail(PlatformPayment $payment): void
    {
        // TODO:
        // Mail::to($payment->tenant->owner->email)
        //     ->send(new SubscriptionApprovedMail($payment));
    }
}
