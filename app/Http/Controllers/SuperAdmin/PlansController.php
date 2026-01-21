<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function index()
    {
        $plans = Plan::latest()->paginate(10);
        $features =  Feature::all();
        return view('super-admin.plans.index', compact('plans', 'features'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);

        $plan = Plan::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
            'slug' => 'yyy'
        ]);

        if (!empty($validated['features'])) {
            $plan->features()->sync($validated['features']);
        }

        return redirect()
            ->back()
            ->with('success', 'تمت إضافة الباقة بنجاح');
    }


    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration_days' => 'required|integer|min:1',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
        ]);

        $plan->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'duration_days' => $validated['duration_days'],
        ]);

        $plan->features()->sync($validated['features'] ?? []);

        return back()->with('success', 'تم تحديث الباقة بنجاح');
    }


    public function destroy(Plan $plan)
    {
        dd('yes');
        $plan->delete();
        return back();
    }

    public function toggle(Plan $plan)
    {
        $plan->update([
            'is_active' => ! $plan->is_active,
        ]);

        return back()->with('success', 'تم تحديث حالة الباقة');
    }
}
