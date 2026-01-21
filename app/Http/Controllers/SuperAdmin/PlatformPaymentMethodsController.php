<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\PlatformPaymentMethod;
use App\Services\superAdmin\PlatformPaymentMethodService;
use Illuminate\Http\Request;

class PlatformPaymentMethodsController extends Controller
{
    /**
     * Display all platform payment methods
     */
    public function index(PlatformPaymentMethodService $service)
    {
        $methods = $service->getAllMethods();

        return view('super-admin.payment-methods.index', compact('methods'));
    }

    /**
     * Store a new platform payment method
     */
    public function store(
        Request $request,
        PlatformPaymentMethodService $service
    ) {
        $service->createMethod($request);

        return back()->with('success', 'تم إضافة طريقة الدفع بنجاح');
    }

    /**
     * Toggle payment method active status
     */
    public function toggle(
        PlatformPaymentMethod $method,
        PlatformPaymentMethodService $service
    ) {
        $service->toggleMethodStatus($method);

        return back()->with('success', 'تم تحديث حالة طريقة الدفع');
    }
}
