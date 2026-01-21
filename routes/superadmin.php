<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdmin\SuberAdminController;
use App\Http\Controllers\SuperAdmin\TenantsController;
use App\Http\Controllers\SuperAdmin\SubscriptionsController;
use App\Http\Controllers\SuperAdmin\PlansController;
use App\Http\Controllers\SuperAdmin\PlatformPaymentsController;
use App\Http\Controllers\SuperAdmin\PlatformPaymentMethodsController;

Route::get('/', [SuberAdminController::class, 'index'])->name('superadmin.index');


Route::prefix('tenants')->group(function () {
    Route::get('/', [TenantsController::class, 'index'])
        ->name('superadmin.tenants');
});


/*
|--------------------------------------------------------------------------
| PLANS
|--------------------------------------------------------------------------
*/
Route::prefix('plans')->name('superadmin.plans.')->group(function () {

    Route::get('/', [PlansController::class, 'index'])->name('index');
    Route::post('/', [PlansController::class, 'store'])->name('store');
    Route::put('{plan}', [PlansController::class, 'update'])->name('update');
    Route::delete('{plan}', [PlansController::class, 'destroy'])->name('destroy');
    Route::post('{plan}/toggle', [PlansController::class, 'toggle'])->name('toggle');
});


/*
|--------------------------------------------------------------------------
| PAYMENTS-METHODS
|--------------------------------------------------------------------------
*/
Route::prefix('payment-methods')->group(function () {
    Route::get('/', [PlatformPaymentMethodsController::class, 'index'])
        ->name('superadmin.payment-methods.index');

    Route::post('/', [PlatformPaymentMethodsController::class, 'store'])
        ->name('superadmin.payment-methods.store');

    Route::post('/{method}/toggle', [PlatformPaymentMethodsController::class, 'toggle'])
        ->name('superadmin.payment-methods.toggle');
});

/*
|--------------------------------------------------------------------------
| PAYMENTS
|--------------------------------------------------------------------------
*/
Route::prefix('payments')->group(function () {

    Route::get('/', [PlatformPaymentsController::class, 'index'])
        ->name('superadmin.payments.index');

    Route::post('{payment}/approve', [PlatformPaymentsController::class, 'approve'])
        ->name('superadmin.payments.approve');

    Route::post('{payment}/reject', [PlatformPaymentsController::class, 'reject'])
        ->name('superadmin.payments.reject');
});

/*
|--------------------------------------------------------------------------
| subscriptions
|--------------------------------------------------------------------------
*/
Route::prefix('subscriptions')->group(function () {

    Route::get('/', [SubscriptionsController::class, 'index'])
        ->name('superadmin.subscriptions');

    Route::post('/assign/{tenant}', [SubscriptionsController::class, 'assign'])
        ->name('superadmin.subscriptions.assign');

    Route::patch('/toggle-status/{tenant}', [SubscriptionsController::class, 'toggleStatus'])
        ->name('superadmin.subscriptions.toggle-status');
});
