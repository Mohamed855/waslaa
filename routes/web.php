<?php

use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\Passwords\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Passwords\ResetPasswordController;
use App\Http\Controllers\Dashboard\General\ActionsController;
use App\Http\Controllers\Dashboard\General\ManagersController;
use App\Http\Controllers\Dashboard\General\SettingsController;
use App\Http\Controllers\Dashboard\General\UsersController;
use App\Http\Controllers\Dashboard\Vendor\OrdersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    // Anyone Routes
    Route::get('/', function () {
        return view('app');
    });

    // Must be not Auth Routes
    Route::group(['middleware' => 'not.auth'], function () {
        Route::get('login', [LoginController::class, 'login'])->name('signIn');
        Route::post('check-credentials', [LoginController::class, 'checkCredentials'])->name('checkCredentials');
        // Reset Password
        Route::prefix('password')->group(function () {
            Route::get('request', [ForgetPasswordController::class, 'requestPassword'])->name('password.request');
            Route::post('email', [ForgetPasswordController::class, 'sendEmailPassword'])->name('password.email');
            Route::get('reset-sent-successfully', [ForgetPasswordController::class, 'emailSentSuccessfully'])->name('resetEmailSentSuccessfully');
            Route::get('reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
            Route::post('update', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
        });
    });

    // Any Auth User Routes
    Route::group(['middleware' => 'must.auth'], function () {
        Route::resource('users', UsersController::class)->except(['create', 'store', 'edit', 'update']);
        Route::get('profile', function () { return view('general.profile'); })->name('profile');
        Route::post('password/change', [ActionsController::class, 'changePassword'])->name('password.change');

        Route::resource('managers', ManagersController::class)->except(['edit']);

        Route::prefix('orders')->group(function () {
            Route::get('ordered/{id?}', [OrdersController::class, 'ordered'])->name('orders.ordered');
            Route::get('accepted/{id?}', [OrdersController::class, 'accepted'])->name('orders.accepted');
            Route::get('canceled/{id?}', [OrdersController::class, 'canceled'])->name('orders.canceled');
        });

        Route::prefix('{guard}/{id}')->group(function () {
            Route::post('profile/update', [ActionsController::class, 'updateProfile'])->name('profile.update');
            Route::post('avatar/update', [ActionsController::class, 'updateAvatar'])->name('avatar.update');
            Route::post('avatar/remove', [ActionsController::class, 'removeAvatar'])->name('avatar.remove');
        });

        Route::get('settings', [SettingsController::class, 'settings'])->name('settings');
        Route::post('settings/update', [SettingsController::class, 'updateSettings'])->name('settings.update');

        Route::post('primary/toggle/{id}', [ActionsController::class, 'togglePrimary'])->name('primary.toggle');
        Route::post('{table}/activation/toggle/{id}', [ActionsController::class, 'toggleActive'])->name('activation.toggle');

        Route::get('logout', [LoginController::class, 'logout'])->name('signOut');
        Route::post('end-session', [LoginController::class, 'endSession'])->name('endSession');
    });
});

