<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Tenant\TenantController;

use App\Http\Controllers\Tenant\SubscriptionsExpiredController;

use App\Http\Controllers\Tenant\TenantBlokedController;

use App\Http\Controllers\Tenant\TenantPendingController;

use App\Http\Controllers\Tenant\clients\TenantClientsController;

use App\Http\Controllers\Tenant\DepositController;


use App\Http\Controllers\Tenant\products\ProductsController;

use App\Http\Controllers\Tenant\products\CodeController;

use App\Http\Controllers\Tenant\products\PackagesController;


Route::middleware(['tenant.auth', 'ensure.active.plan'])->group(function () {
    Route::prefix('dashboard')->group(function () {

        Route::get('/', [TenantController::class, 'index'])->name('tenant.index');

        /*
        |--------------------------------------------------------------------------
        | Products
        |--------------------------------------------------------------------------
        */
        Route::get('/products',  [ProductsController::class, 'index'])->name('tenant.products');
        Route::post('/products', [ProductsController::class, 'store'])->name('tenant.products.store');


        /*
        |--------------------------------------------------------------------------
        | Products - Packages
        |--------------------------------------------------------------------------
        */
        Route::post('products/packages', [PackagesController::class, 'store'])->name('tenant.products.packages.store');
        Route::patch('packages/{GamePackage}/toggle', [PackagesController::class, 'toggle'])->name('tenant.products.packages.toggle');
        Route::delete('/games/Packages/{id}', [PackagesController::class, 'destroy'])->name('tenant.products.packages.destroy');
        Route::put('/packages/{package}',  [PackagesController::class, 'update'])->name('tenant.products.packages.update');

        /*
        |--------------------------------------------------------------------------
        | Products - code
        |--------------------------------------------------------------------------
        */
        Route::get('/products/code',  [CodeController::class, 'index'])->name('tenant.code.products');
        Route::post('/products/code', [CodeController::class, 'store'])->name('tenant.code.products.store');
        Route::delete('/products/code', [CodeController::class, 'destroy'])->name('tenant.code.products.destroy');

        /*
         |--------------------------------------------------------------------------
         | clients
         |--------------------------------------------------------------------------
         */
        Route::get('/clients', [TenantClientsController::class, 'index'])->name('tenant.clients');

        /*
        |--------------------------------------------------------------------------
        | Deposits-methods
        |--------------------------------------------------------------------------
        */
        Route::get('/deposits',  [DepositController::class, 'index'])->name('tenant.deposits');
        Route::post('/deposits/{deposit}/accept', [DepositController::class, 'accept'])->name('tenant.deposits.accept');
        Route::post('/deposits/{deposit}/reject', [DepositController::class, 'reject'])->name('tenant.deposits.reject');

        /*
        |--------------------------------------------------------------------------
        | Deposits-methods
        |--------------------------------------------------------------------------
        */
        Route::post('/deposit-methods', [DepositController::class, 'store'])->name('tenant.deposit-methods.store');
        Route::put('/methods/update/{depositMethod}', [DepositController::class, 'update'])->name('tenant.deposit-methods.update');
        Route::delete('/deposit-methods{method}', [DepositController::class, 'destroy'])->name('tenant.deposit-methods.destroy');
    });
});



/*
|--------------------------------------------------------------------------
| PAYMENTS
|--------------------------------------------------------------------------
*/
Route::prefix('dashboard/subscriptions')->group(function () {
    Route::get('/expired', [SubscriptionsExpiredController::class, 'index'])
        ->name('tenant.subscriptions.expired');

    Route::get('/suspended', [TenantBlokedController::class, 'index'])
        ->name('tenant.subscriptions.suspended');

    Route::get('/pending', [TenantPendingController::class, 'index'])
        ->name('tenant.subscriptions.pending');
});

/*
|--------------------------------------------------------------------------
| clients
|--------------------------------------------------------------------------
*/
require __DIR__ . '/clients.php';
