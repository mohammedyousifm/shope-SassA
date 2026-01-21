<?php

namespace App\Http\Middleware\clients;

use Closure;
use Illuminate\Http\Request;

class EnsureClientsHasAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (! auth()->guard('client')->check()) {
            return redirect()->route('clients.login');
        }

        return $next($request);
    }
}
