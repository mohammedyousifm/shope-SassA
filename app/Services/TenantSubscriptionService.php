<?php

namespace App\Services;

use App\Models\Plan;
use App\Models\Tenant;
use App\Models\PlatformPayment;
use Illuminate\Support\Facades\DB;

class TenantSubscriptionService
{
    /**
     * Create pending subscription with payment record
     */
    public function createPendingSubscription(
        Tenant $tenant,
        Plan $plan,
        int $paymentMethodId,
        string $transactionReference
    ): void {

        if (
            PlatformPayment::where('tenant_id', $tenant->id)
            ->where('status', 'pending')
            ->exists()
        ) {
            throw new \Exception('You already have a pending plan');
        }


        DB::transaction(function () use (
            $tenant,
            $plan,
            $paymentMethodId,
            $transactionReference
        ) {

            $this->storePayment(
                tenant: $tenant,
                plan: $plan,
                paymentMethodId: $paymentMethodId,
                transactionReference: $transactionReference
            );

            $this->markTenantAsPending(
                tenant: $tenant,
                plan: $plan
            );

            $this->sendPendingSubscriptionMail($tenant);
        });
    }

    /**
     * Store platform payment
     */
    protected function storePayment(
        Tenant $tenant,
        Plan $plan,
        int $paymentMethodId,
        string $transactionReference
    ): void {
        PlatformPayment::create([
            'tenant_id'                     => $tenant->id,
            'plan_id'                       => $plan->id,
            'platform_payment_method_id'    => $paymentMethodId,
            'transaction_reference'         => $transactionReference,
            'amount'                        => $plan->price,
        ]);
    }

    /**
     * Update tenant subscription as pending
     */
    protected function markTenantAsPending(
        Tenant $tenant,
        Plan $plan
    ): void {
        $tenant->update([
            'plan_id'               => $plan->id,
            'plan'                  => $plan->name,
            'subscription_ends_at'  => now()->addDays($plan->duration_days),
            'status'                => 'pending',
        ]);
    }

    /**
     * Send mail (empty – future use)
     */
    protected function sendPendingSubscriptionMail(Tenant $tenant): void
    {
        // TODO:
        // Mail::to($tenant->owner->email)
        //     ->send(new SubscriptionPendingMail($tenant));
    }
}
