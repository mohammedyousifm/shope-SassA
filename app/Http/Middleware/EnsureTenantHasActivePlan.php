<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EnsureTenantHasActivePlan
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = app()->bound('tenant') ? app('tenant') : null;

        if (!$tenant) {
            abort(404, 'Invalid subdomain');
        }

        // 3️⃣ If tenant is suspended → blocked page
        if ($tenant->status === 'suspended') {
            return redirect()->route('tenant.subscriptions.suspended');
        }

        if ($tenant->status === 'pending') {
            return redirect()->route('tenant.subscriptions.pending');
        }

        // 4️⃣ If subscription has end date AND is expired
        if (
            $tenant->subscription_ends_at !== null &&
            Carbon::parse($tenant->subscription_ends_at)->isPast()
        ) {
            return redirect()->route('tenant.subscriptions.expired');
        }

        return $next($request);
    }
}
