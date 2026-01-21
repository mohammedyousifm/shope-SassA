<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PlatformPayment;
use App\Services\SuperAdmin\PlatformPaymentService;

class PlatformPaymentsController extends Controller
{
    /**
     * Display all platform payments
     */
    public function index(PlatformPaymentService $service)
    {
        $payments = $service->getAllPayments();

        return view('super-admin.payments.index', compact('payments'));
    }

    /**
     * Approve payment and activate tenant subscription
     */
    public function approve(
        PlatformPayment $payment,
        PlatformPaymentService $service
    ) {
        $service->approvePayment($payment);

        return back()->with('success', 'تم قبول الدفع وتفعيل الاشتراك');
    }

    /**
     * Reject a pending payment
     */
    public function reject(
        PlatformPayment $payment,
        PlatformPaymentService $service
    ) {
        $service->rejectPayment($payment);

        return back()->with('success', 'تم رفض عملية الدفع');
    }
}
