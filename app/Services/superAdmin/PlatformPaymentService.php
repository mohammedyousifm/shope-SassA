<?php

namespace App\Services\superAdmin;

use App\Models\PlatformPayment;
use Illuminate\Support\Facades\DB;

class PlatformPaymentService
{
    /**
     * Get all platform payments with relations
     */
    public function getAllPayments()
    {
        return PlatformPayment::with(['tenant', 'plan', 'method'])
            ->latest()
            ->paginate(10);
    }

    /**
     * Approve payment and activate subscription
     */
    public function approvePayment(PlatformPayment $payment): void
    {
        if ($payment->status !== 'pending') {
            return;
        }

        DB::transaction(function () use ($payment) {

            $payment->update([
                'status' => 'approved',
                'approved_at' => now(),
            ]);

            $tenant = $payment->tenant;
            $plan = $payment->plan;

            $tenant->update([
                'plan_id' => $plan->id,
                'subscription_ends_at' => now()->addDays($plan->duration_days),
                'status' => 'active',
            ]);

            $this->sendPaymentApprovedMail($payment);
        });
    }

    /**
     * Reject a pending payment
     */
    public function rejectPayment(PlatformPayment $payment): void
    {
        if ($payment->status !== 'pending') {
            return;
        }

        $payment->update([
            'status' => 'rejected',
        ]);

        $this->sendPaymentRejectedMail($payment);
    }

    /**
     * Send mail when payment is approved (empty – future use)
     */
    protected function sendPaymentApprovedMail(
        PlatformPayment $payment
    ): void {
        // TODO:
        // Mail::to($payment->tenant->user->email)
        // ->send(new PaymentApprovedMail($payment));
    }

    /**
     * Send mail when payment is rejected (empty – future use)
     */
    protected function sendPaymentRejectedMail(
        PlatformPayment $payment
    ): void {
        // TODO:
        // Mail::to($payment->tenant->user->email)
        // ->send(new PaymentRejectedMail($payment));
    }
}
