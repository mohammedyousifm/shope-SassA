<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCorrectTenant
{
    public function handle(Request $request, Closure $next)
    {
        $tenant = app()->bound('tenant') ? app('tenant') : null;
        $user = auth()->user();

        if (! $tenant || ! $user) {
            abort(403);
        }

        if ((int) $user->tenant_id !== (int) $tenant->id) {
            abort(403, 'Unauthorized tenant access');
        }

        return $next($request);
    }
}
