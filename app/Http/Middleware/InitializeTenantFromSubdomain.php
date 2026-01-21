<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\URL;
use App\Models\Tenant;

class InitializeTenantFromSubdomain
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Extract subdomain
        $subdomain = $this->extractSubdomain($host);

        if (!$subdomain) {
            abort(404, 'Invalid subdomain');
        }

        // Find tenant by subdomain
        $tenant = Tenant::where('subdomain', $subdomain)->first();

        if (!$tenant) {
            abort(404, 'Invalid subdomain');
        }


        // Store tenant in container for global access
        app()->instance('tenant', $tenant);

        // Share with all views
        View::share('tenant', $tenant);

        // Set default route parameter
        URL::defaults(['subdomain' => $subdomain]);

        return $next($request);
    }

    private function extractSubdomain(string $host): ?string
    {
        // For local development: subdomain.subd.test
        // For production: subdomain.yourdomain.com

        $parts = explode('.', $host);

        // Minimum 3 parts needed: subdomain.domain.tld
        if (count($parts) < 3) {
            return null;
        }

        // Skip 'www'
        $subdomain = $parts[0];
        if ($subdomain === 'www') {
            return null;
        }

        return $subdomain;
    }
}
