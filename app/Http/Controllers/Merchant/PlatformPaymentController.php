<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Services\TenantSubscriptionService;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Facades\DB;

class PlatformPaymentController extends Controller
{
    public function store(
        Request $request,
        Plan $plan,
        TenantSubscriptionService $subscriptionService
    ) {
        $request->validate([
            'payment_method_id'     => 'required|exists:platform_payment_methods,id',
            'transaction_reference' => 'required|string|max:255',
        ]);

        $tenant = auth()->user()->tenant;

        try {
            $subscriptionService->createPendingSubscription(
                tenant: $tenant,
                plan: $plan,
                paymentMethodId: $request->payment_method_id,
                transactionReference: $request->transaction_reference
            );

            return redirect()
                ->away("http://{$tenant->subdomain}.subd.test/dashboard")
                ->with('success', 'تم إرسال طلب الاشتراك بنجاح، سيتم مراجعته قريبًا');
        } catch (\Exception $e) {

            return redirect()
                ->away("http://{$tenant->subdomain}.subd.test/dashboard")
                ->with('error', 'لديك اشتراك قيد المراجعة بالفعل، لا يمكنك إنشاء اشتراك جديد الآن');
        }
    }



    public function free(Request $request, Plan $plan)
    {

        $tenant = auth()->user()->tenant;

        DB::transaction(function () use ($plan) {


            // Activate tenant plan
            $tenant = auth()->user()->tenant;

            $tenant->update([
                'plan_id'               => $plan->id,
                'plan'                  => $plan->name,
                'subscription_ends_at'  => null,
                'status'                => 'active',
            ]);
        });

        return redirect()->away("http://{$tenant->subdomain}.subd.test");
    }
}
