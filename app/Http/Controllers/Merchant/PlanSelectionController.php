<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use App\Models\PlatformPaymentMethod;

class PlanSelectionController extends Controller
{
    public function index()
    {
        $plans = Plan::where('is_active', true)->get();

        return view('landing.plans.index', compact('plans'));
    }

    public function subscribe(Plan $plan)
    {

        if (! auth()->check()) {
            return  redirect()->route('merchant.register');
        };

        $methods = PlatformPaymentMethod::where('is_active', true)->latest()->get();
        return view('landing.plans.show', compact('plan', 'methods'));
    }
}
