<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\EnsureMerchantAuthenticated;
use App\Http\Middleware\EnsureCorrectTenant;
use App\Http\Middleware\EnsureSuperadminAuthenticated;
use App\Http\Middleware\EnsureTenantHasActivePlan;
use App\Http\Middleware\EnsureTenantHasAuth;

// clients
use App\Http\Middleware\clients\EnsureClientsHasAuth;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'tenantAuth' => EnsureMerchantAuthenticated::class,
            'ensure.correct.tenant' => EnsureCorrectTenant::class,
            'superadminAuth' => EnsureSuperadminAuthenticated::class,
            'ensure.active.plan' => EnsureTenantHasActivePlan::class,
            'tenant.auth' => EnsureTenantHasAuth::class,

            // clients
            'clients.auth' => EnsureClientsHasAuth::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
