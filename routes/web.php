<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Tenant\Subscription\ExpiredController;
use App\Http\Controllers\Tenant\TenantController;
use App\Http\Middleware\InitializeTenantFromSubdomain;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| SUPER ADMIN
|--------------------------------------------------------------------------
*/

// Route::middleware(['superadminAuth'])->group(function () {
Route::domain('admin.subd.test')->group(function () {
    require __DIR__ . '/superadmin.php';
});
// });

/*
|--------------------------------------------------------------------------
| TENANT (MERCHANT APP)
|--------------------------------------------------------------------------
*/

Route::domain('{subdomain}.subd.test')
    ->middleware(['web', InitializeTenantFromSubdomain::class])
    ->group(function () {
        require __DIR__ . '/tenant.php';
    });

/*
|--------------------------------------------------------------------------
| MAIN DOMAIN (LANDING + MERCHANT REGISTER)
|--------------------------------------------------------------------------
*/
Route::domain('subd.test')->group(function () {
    require __DIR__ . '/landing.php';
});

Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
