<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureSuperadminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {


        if (! auth()->check()) {
            return redirect()->route('merchant.login');
        } else {
            $user = auth()->user();

            if ($user->role !== 'super_admin') {
                abort(403);
            }
        }

        return $next($request);
    }
}
