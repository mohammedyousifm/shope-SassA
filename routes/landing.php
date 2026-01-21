<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Merchant\LandingController;
use App\Http\Controllers\Merchant\MerchantRegisterController;
use App\Http\Controllers\Merchant\MerchantLoginController;
use App\Http\Controllers\Merchant\PlanSelectionController;
use App\Http\Controllers\Merchant\PlatformPaymentController;
use App\Http\Controllers\Merchant\auth\PasswordResetLinkController;
use App\Http\Controllers\Merchant\auth\NewPasswordController;

Route::get('/', [LandingController::class, 'index'])
    ->name('merchant.index');

Route::get('/register', [MerchantRegisterController::class, 'show'])
    ->name('merchant.register');

Route::post('/register', [MerchantRegisterController::class, 'store'])
    ->name('merchant.register.store');

Route::get('/login', [MerchantLoginController::class, 'show'])
    ->name('merchant.login');

Route::post('/login', [MerchantLoginController::class, 'store'])
    ->name('merchant.login.store');

Route::prefix('auth')->group(function () {
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
        ->name('merchant.password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
        ->name('merchant.password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
        ->name('merchant.password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
        ->name('merchant.password.store');
});

Route::prefix('pricing')->group(function () {

    Route::get('/', [PlanSelectionController::class, 'index'])
        ->name('merchant.plans');

    Route::post('/{plan}', [PlanSelectionController::class, 'subscribe'])
        ->name('merchant.plans.subscribe');

    Route::post('/checkout/{plan}', [PlatformPaymentController::class, 'store'])
        ->name('merchant.platform.payment.store');

    // مجاني
    Route::post('/checkout/{plan}/free', [PlatformPaymentController::class, 'free'])
        ->name('merchant.platform.payment.free');
});
