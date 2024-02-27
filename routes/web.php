<?php

use App\Http\Controllers\Dashboard\Admin\AdminsController;
use App\Http\Controllers\Dashboard\Admin\ADsController;
use App\Http\Controllers\Dashboard\Admin\CategoriesController;
use App\Http\Controllers\Dashboard\Admin\CitiesController;
use App\Http\Controllers\Dashboard\Admin\CountriesController;
use App\Http\Controllers\Dashboard\Admin\InvoicesController;
use App\Http\Controllers\Dashboard\Admin\NotificationsController;
use App\Http\Controllers\Dashboard\Admin\SubcategoriesController;
use App\Http\Controllers\Dashboard\Admin\VendorsController;
use App\Http\Controllers\Dashboard\Auth\LoginController;
use App\Http\Controllers\Dashboard\Auth\Passwords\ForgetPasswordController;
use App\Http\Controllers\Dashboard\Auth\Passwords\ResetPasswordController;
use App\Http\Controllers\Dashboard\General\ActionsController;
use App\Http\Controllers\Dashboard\General\ManagersController;
use App\Http\Controllers\Dashboard\General\GeneralController;
use App\Http\Controllers\Dashboard\General\OrdersController;
use App\Http\Controllers\Dashboard\General\UsersController;
use App\Http\Controllers\Dashboard\Vendor\ProductsController;
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
        Route::get('profile', [UsersController::class, 'profile'])->name('profile');

        Route::resource('managers', ManagersController::class)->except(['edit']);

        Route::resource('products', ProductsController::class)->except([]);
        Route::resource('orders', OrdersController::class)->except('index', 'create', 'edit');
        Route::get('ordered', [OrdersController::class, 'ordered'])->name('ordered');
        Route::get('accepted', [OrdersController::class, 'accepted'])->name('accepted');
        Route::get('canceled', [OrdersController::class, 'canceled'])->name('canceled');

        Route::prefix('{guard}/{id}')->group(function () {
            Route::post('profile/update', [ActionsController::class, 'updateProfile'])->name('profile.update');
            Route::post('password/change', [ActionsController::class, 'changePassword'])->name('password.change');
            Route::post('avatar/update', [ActionsController::class, 'updateAvatar'])->name('avatar.update');
            Route::post('avatar/remove', [ActionsController::class, 'removeAvatar'])->name('avatar.remove');
        });

        Route::get('settings', [GeneralController::class, 'settings'])->name('settings');
        Route::post('settings/update', [GeneralController::class, 'updateSettings'])->name('settings.update');

        Route::post('primary/toggle/{id}', [ActionsController::class, 'togglePrimary'])->name('primary.toggle');
        Route::post('{table}/activation/toggle/{id}', [ActionsController::class, 'toggleActive'])->name('activation.toggle');
        Route::post('{table}/image/remove/{id}', [ActionsController::class, 'removeImage'])->name('image.remove');

        Route::get('logout', [LoginController::class, 'logout'])->name('signOut');
        Route::post('end-session', [LoginController::class, 'endSession'])->name('endSession');
    });

    // Admin Routes
    Route::group(['prefix' => 'admin', 'middleware' => 'guard:admin'], function () {
        Route::get('/', [GeneralController::class, 'adminOverview'])->name('admin.overview');
        Route::resource('ads', ADsController::class)->except(['create', 'edit', 'show']);
        Route::resource('notifications', NotificationsController::class)->except(['show']);
        Route::resource('admins', AdminsController::class)->except(['show']);
        Route::resource('vendors', VendorsController::class)->except(['edit']);
        Route::resource('categories', CategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('subcategories', SubcategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('countries', CountriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('cities', CitiesController::class)->except(['create', 'edit', 'show']);
        Route::resource('invoices', InvoicesController::class)->except('index', 'create', 'edit');
        Route::get('opened', [InvoicesController::class, 'opened'])->name('opened');
        Route::get('closed', [InvoicesController::class, 'closed'])->name('closed');
        Route::get('collected', [InvoicesController::class, 'collected'])->name('collected');
    });

    // Vendor Routes
    Route::group(['prefix' => 'vendor', 'middleware' => 'guard:vendor'], function () {
        Route::get('/', function () { return view('vendor.main.overview'); })->name('vendor.overview');
    });

    // Manager Routes
    Route::group(['prefix' => 'manager', 'middleware' => 'guard:manager'], function () {
        Route::get('/', function () { return view('manager.main.overview'); })->name('manager.overview');
    });
});

