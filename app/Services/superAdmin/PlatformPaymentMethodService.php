<?php

namespace App\Services\superAdmin;


use App\Models\PlatformPaymentMethod;
use Illuminate\Http\Request;

class PlatformPaymentMethodService
{
    /**
     * Get all platform payment methods
     */
    public function getAllMethods()
    {
        return PlatformPaymentMethod::latest()->get();
    }

    /**
     * Create a new payment method
     */
    public function createMethod(Request $request): void
    {
        $request->validate([
            'method_name' => 'required|string|max:255',
            'bank_name' => 'nullable|string|max:255',
            'account_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
        ]);

        PlatformPaymentMethod::create([
            'method_name' => $request->method_name,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'is_active' => true,
        ]);
    }

    /**
     * Toggle payment method active status
     */
    public function toggleMethodStatus(PlatformPaymentMethod $method): void
    {
        $method->update([
            'is_active' => ! $method->is_active,
        ]);
    }
}
