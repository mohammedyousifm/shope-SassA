<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Clients\ClientsController;
use App\Http\Controllers\Clients\ProfileController;
use App\Http\Controllers\Clients\RechargeController;
use App\Http\Controllers\clients\auth\RegisteredclientsController;
use App\Http\Controllers\clients\auth\AuthenticatedSessionController;

use App\Http\Controllers\clients\orders\CodeOrderController;
use App\Http\Controllers\clients\orders\PackageOrderController;


Route::middleware(['clients.auth'])->group(function () {
    Route::get('/', [ClientsController::class, 'index'])->name('clients.index');
});

/*
|--------------------------------------------------------------------------
| Order
|--------------------------------------------------------------------------
*/
Route::middleware(['clients.auth'])->group(function () {
    Route::prefix('order')->group(function () {

        //   prders pages
        Route::post('/games', [PackageOrderController::class, 'store'])->name('clients.order.package.store');

        //  gift-cards page
        Route::post('/gift-cards/buy', [CodeOrderController::class, 'store'])->name('clients.giftcards.buy');
    });
});


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/
Route::middleware(['clients.auth'])->group(function () {
    Route::prefix('profile')->group(function () {
        // صفحة الملف الشخصي
        Route::get('/', [ProfileController::class, 'index'])
            ->name('clients.profile');

        // تحديث البيانات الشخصية
        Route::patch('/profile', [ProfileController::class, 'updateProfile'])
            ->name('clients.profile.update');

        // تحديث كلمة المرور
        Route::patch('/profile/password', [ProfileController::class, 'updatePassword'])
            ->name('clients.profile.password');
    });
});

/*
|--------------------------------------------------------------------------
| Recharge
|--------------------------------------------------------------------------
*/
Route::middleware(['clients.auth'])->group(function () {
    Route::prefix('recharge')->group(function () {
        //  recharge page
        Route::get('/', [RechargeController::class, 'index'])->name('clients.recharge');

        Route::post('/deposit', [RechargeController::class, 'store'])->name('clients.recharge.store');
    });
});

/*
|--------------------------------------------------------------------------
| AUTH LOGIN & REGISTER
|--------------------------------------------------------------------------
*/
Route::prefix('auth')->group(function () {
    Route::get('register', [RegisteredclientsController::class, 'create'])
        ->name('clients.register');


    Route::post('clients/verify-email/send', [RegisteredclientsController::class, 'sendCode'])
        ->name('clients.verify.send');

    Route::post('clients/verify-email/check', [RegisteredclientsController::class, 'checkCode'])
        ->name('clients.verify.check');

    Route::post('register', [RegisteredclientsController::class, 'store'])
        ->name('clients.register.store');

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
        ->name('clients.login');

    Route::post('login', [AuthenticatedSessionController::class, 'store'])
        ->name('clients.login.store');
});
