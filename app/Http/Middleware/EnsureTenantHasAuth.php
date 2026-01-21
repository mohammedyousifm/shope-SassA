<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EnsureTenantHasAuth
{
    public function handle(Request $request, Closure $next)
    {

        if (! auth()->check()) {
            return redirect()->route('merchant.login');
        }

        return $next($request);
    }
}
