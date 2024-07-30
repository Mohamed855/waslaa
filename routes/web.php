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
use App\Http\Controllers\Admin\Dashboard\AddressesController;
use App\Http\Controllers\Admin\Dashboard\ComplainsController;
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
    Route::get('privacy-policy', function () {
        return view('global.privacy-policy');
    });
    Route::get('terms-of-service', function () {
        return view('global.terms-of-service');
    });

    // Must be not Auth Routes
    Route::group(['middleware' => 'not.auth'], function () {
        Route::get('login', [LoginController::class, 'login'])->name('signIn');
        Route::post('check-credentials', [LoginController::class, 'checkCredentials'])->name('checkCredentials');
        // Reset Password
        Route::prefix('password')->group(function () {
            Route::get('request', [ForgetPasswordController::class, 'requestPassword'])->name('requestPassword');
            Route::post('email', [ForgetPasswordController::class, 'sendEmailPassword'])->name('sendEmailPassword');
            Route::get('reset-sent-successfully', [ForgetPasswordController::class, 'emailSentSuccessfully'])->name('resetEmailSentSuccessfully');
            Route::get('reset', [ResetPasswordController::class, 'resetPassword'])->name('password.reset');
            Route::post('update', [ResetPasswordController::class, 'updatePassword'])->name('password.update');
        });
    });

    // Any Auth User Routes
    Route::group(['middleware' => 'must.auth'], function () {
        Route::get('admin/overview', [GeneralController::class, 'adminOverview'])->name('adminOverview');
        Route::get('vendor/overview', [GeneralController::class, 'vendorOverview'])->name('vendorOverview');
        Route::get('manager/overview', [GeneralController::class, 'managerOverview'])->name('managerOverview');

        Route::get('profile', [GeneralController::class, 'profile'])->name('profile');
        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('settings', [GeneralController::class, 'settings'])->name('settings');
        Route::post('update-settings', [GeneralController::class, 'updateSettings'])->name('updateSettings');

        Route::post('primary/toggle/{id}', [ActionsController::class, 'togglePrimary'])->name('togglePrimary');
        Route::post('{table}/activation/toggle/{id}', [ActionsController::class, 'toggleActive'])->name('toggleActive');
        Route::post('{table}/image/remove/{id}', [ActionsController::class, 'removeImage'])->name('removeImage');
        Route::delete('delete/selected', [ActionsController::class, 'deleteSelection'])->name('deleteSelection');

        Route::prefix('{guard}/{id}')->group(function () {
            Route::post('update-profile', [ActionsController::class, 'updateProfile'])->name('updateProfile');
            Route::post('change-password', [ActionsController::class, 'changePassword'])->name('changePassword');
            Route::post('update-avatar', [ActionsController::class, 'updateAvatar'])->name('updateAvatar');
            Route::post('remove-avatar', [ActionsController::class, 'removeAvatar'])->name('removeAvatar');
        });

        Route::resource('categories', CategoriesController::class)->except(['create', 'edit', 'show']);
        Route::post('vendor-select-category', [CategoriesController::class, 'selectVendorCategory'])->name('selectVendorCategory');
        Route::delete('vendor-remove-category/{id}/{vendorId}', [CategoriesController::class, 'removeVendorCategory'])->name('removeVendorCategory');

        Route::resource('components', ComponentsController::class)->except(['create', 'edit', 'show']);
        Route::post('product-select-component', [ComponentsController::class, 'selectProductComponent'])->name('selectProductComponent');
        Route::delete('product-remove-component/{id}/{productId}', [ComponentsController::class, 'removeProductComponent'])->name('removeProductComponent');

        Route::resource('types', TypesController::class)->except(['create', 'edit', 'show']);
        Route::post('product-select-type', [TypesController::class, 'selectProductType'])->name('selectProductType');
        Route::delete('product-remove-type/{id}/{productId}', [TypesController::class, 'removeProductType'])->name('removeProductType');

        Route::resource('orders', OrdersController::class)->except('index', 'create', 'edit');
        Route::get('ordered', [OrdersController::class, 'ordered'])->name('ordered');
        Route::get('accepted', [OrdersController::class, 'accepted'])->name('accepted');
        Route::get('canceled', [OrdersController::class, 'canceled'])->name('canceled');
        Route::post('update-order-status/{status}/{id}', [OrdersController::class, 'updateOrderStatus'])->name('updateOrderStatus');

        Route::resource('invoices', InvoicesController::class)->except(['index', 'create', 'edit']);
        Route::get('invoices/{id}/orders', [OrdersController::class, 'invoiceOrders'])->name('invoiceOrders');
        Route::get('opened', [InvoicesController::class, 'opened'])->name('opened');
        Route::get('closed', [InvoicesController::class, 'closed'])->name('closed');
        Route::get('collected', [InvoicesController::class, 'collected'])->name('collected');
        Route::post('update-invoice-status/{status}/{id}', [InvoicesController::class, 'updateInvoiceStatus'])->name('updateInvoiceStatus');

        Route::resource('products', ProductsController::class)->except(['edit']);
        Route::prefix('products/{id}')->group(function () {
            Route::get('components', [ComponentsController::class, 'productComponents'])->name('productComponents');
            Route::get('types', [TypesController::class, 'productTypes'])->name('productTypes');
        });

        Route::resource('users', UsersController::class)->except(['create', 'store', 'edit', 'update']);
        Route::prefix('user/{username}')->group(function () {
            Route::get('/', [UsersController::class, 'show'])->name('showUser');
            Route::get('orders', [OrdersController::class, 'userOrders'])->name('userOrders');
            Route::get('complains', [ComplainsController::class, 'userComplains'])->name('userComplains');
        });

        Route::resource('managers', ManagersController::class)->except(['create', 'edit', 'show']);
        Route::resource('notifications', NotificationsController::class)->except(['create', 'edit', 'show']);
        Route::resource('complains', ComplainsController::class)->except(['create', 'edit', 'show']);
        Route::resource('subcategories', SubcategoriesController::class)->except(['create', 'edit', 'show']);
    });

    // Admin Routes
    Route::middleware('guard:admin')->group(function () {
        Route::resource('vendors', VendorsController::class)->except(['edit']);
        Route::prefix('vendor/{username}')->group(function () {
            Route::get('/', [VendorsController::class, 'show'])->name('showVendor');
            Route::get('users', [UsersController::class, 'vendorUsers'])->name('vendorUsers');
            Route::get('managers', [ManagersController::class, 'vendorManagers'])->name('vendorManagers');
            Route::get('invoices', [InvoicesController::class, 'vendorInvoices'])->name('vendorInvoices');
            Route::get('orders', [OrdersController::class, 'vendorOrders'])->name('vendorOrders');
            Route::get('categories', [CategoriesController::class, 'vendorCategories'])->name('vendorCategories');
            Route::get('subcategories', [SubcategoriesController::class, 'vendorSubcategories'])->name('vendorSubcategories');
            Route::get('products', [ProductsController::class, 'vendorProducts'])->name('vendorProducts');
            Route::get('components', [ComponentsController::class, 'vendorComponents'])->name('vendorComponents');
            Route::get('types', [TypesController::class, 'vendorTypes'])->name('vendorTypes');
            Route::get('branches', [AddressesController::class, 'vendorBranches'])->name('vendorBranches');
            Route::get('complains', [ComplainsController::class, 'vendorComplains'])->name('vendorComplains');
        });

        Route::resource('ads', ADsController::class)->except(['create', 'edit', 'show']);
        Route::resource('admins', AdminsController::class)->except(['create', 'edit', 'show']);
        Route::resource('countries', CountriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('cities', CitiesController::class)->except(['create', 'edit', 'show']);
        Route::resource('addresses', AddressesController::class)->except(['index', 'create', 'edit', 'show']);
    });

    // Vendor Routes
    Route::middleware('guard:vendor')->group(function () {
        Route::post('product/{id}/update-offer', [ProductsController::class, 'updateOffer'])->name('updateOffer');
        Route::post('product/{id}/remove-offer', [ProductsController::class, 'removeOffer'])->name('removeOffer');
        Route::post('product/{id}/update-prices', [ProductsController::class, 'updatePrices'])->name('updatePrices');
        Route::get('api/subcategories/{catId}', [ProductsController::class, 'getCurrVendorSubCategories']);
    });
});

