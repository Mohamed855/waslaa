<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Dashboard\ADsController;
use App\Http\Controllers\Admin\Dashboard\TypesController;
use App\Http\Controllers\Admin\Dashboard\UsersController;
use App\Http\Controllers\Admin\Dashboard\AdminsController;
use App\Http\Controllers\Admin\Dashboard\CitiesController;
use App\Http\Controllers\Admin\Dashboard\OrdersController;
use App\Http\Controllers\Admin\Dashboard\ActionsController;
use App\Http\Controllers\Admin\Dashboard\GeneralController;
use App\Http\Controllers\Admin\Dashboard\VendorsController;
use App\Http\Controllers\Admin\Dashboard\InvoicesController;
use App\Http\Controllers\Admin\Dashboard\ManagersController;
use App\Http\Controllers\Admin\Dashboard\ProductsController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Admin\Dashboard\CountriesController;
use App\Http\Controllers\Admin\Dashboard\CategoriesController;
use App\Http\Controllers\Admin\Dashboard\ComponentsController;
use App\Http\Controllers\Admin\Dashboard\NotificationsController;
use App\Http\Controllers\Admin\Dashboard\SubcategoriesController;
use App\Http\Controllers\Admin\Auth\Passwords\ResetPasswordController;
use App\Http\Controllers\Admin\Auth\Passwords\ForgetPasswordController;

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
        Route::get('profile', [GeneralController::class, 'profile'])->name('profile');
        Route::resource('users', UsersController::class)->except(['create', 'store', 'edit', 'update']);
        Route::resource('managers', ManagersController::class)->except(['create', 'edit', 'show']);
        Route::resource('notifications', NotificationsController::class)->except(['show']);



        /*


        */
        Route::resource('products', ProductsController::class)->except([]);

        Route::resource('orders', OrdersController::class)->except('index', 'create', 'edit');
        Route::get('ordered', [OrdersController::class, 'ordered'])->name('ordered');
        Route::get('accepted', [OrdersController::class, 'accepted'])->name('accepted');
        Route::get('canceled', [OrdersController::class, 'canceled'])->name('canceled');

        Route::resource('invoices', InvoicesController::class)->except('index', 'create', 'edit');
        Route::get('opened', [InvoicesController::class, 'opened'])->name('opened');
        Route::get('closed', [InvoicesController::class, 'closed'])->name('closed');
        Route::get('collected', [InvoicesController::class, 'collected'])->name('collected');

        Route::get('settings', [GeneralController::class, 'settings'])->name('settings');
        Route::post('settings/update', [GeneralController::class, 'updateSettings'])->name('settings.update');

        Route::prefix('{guard}/{id}')->group(function () {
            Route::post('profile/update', [ActionsController::class, 'updateProfile'])->name('profile.update');
            Route::post('password/change', [ActionsController::class, 'changePassword'])->name('password.change');
            Route::post('avatar/update', [ActionsController::class, 'updateAvatar'])->name('avatar.update');
            Route::post('avatar/remove', [ActionsController::class, 'removeAvatar'])->name('avatar.remove');
        });

        Route::post('primary/toggle/{id}', [ActionsController::class, 'togglePrimary'])->name('primary.toggle');
        Route::post('{table}/activation/toggle/{id}', [ActionsController::class, 'toggleActive'])->name('activation.toggle');
        Route::post('{table}/image/remove/{id}', [ActionsController::class, 'removeImage'])->name('image.remove');

        Route::get('logout', [LoginController::class, 'logout'])->name('signOut');
        Route::post('end-session', [LoginController::class, 'endSession'])->name('endSession');
    });

    // Admin Routes
    Route::middleware('guard:admin')->group(function () {
        Route::get('admin/overview', [GeneralController::class, 'adminOverview'])->name('admin.overview');
        Route::resource('ads', ADsController::class)->except(['create', 'edit', 'show']);
        Route::resource('admins', AdminsController::class)->except(['show']);
        Route::resource('vendors', VendorsController::class)->except(['edit']);
        Route::resource('categories', CategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('subcategories', SubcategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('countries', CountriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('cities', CitiesController::class)->except(['create', 'edit', 'show']);
    });

    // Vendor Routes
    Route::middleware('guard:vendor')->group(function () {
        Route::get('vendor/overview', [GeneralController::class, 'vendorOverview'])->name('vendor.overview');
        Route::resource('components', ComponentsController::class)->except(['create', 'edit', 'show']);
        Route::resource('types', TypesController::class)->except(['create', 'edit', 'show']);
    });

    // Manager Routes
    Route::group(['prefix' => 'manager', 'middleware' => 'guard:manager'], function () {
        Route::get('/', function () { return view('manager.main.overview'); })->name('manager.overview');
    });
});

