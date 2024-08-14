<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\App\MainController;
use App\Http\Controllers\API\User\CartController;
use App\Http\Controllers\API\App\VendorController;
use App\Http\Controllers\API\GoogleAuthController;
use App\Http\Controllers\API\User\RatesController;
use App\Http\Controllers\API\App\CountryController;
use App\Http\Controllers\API\App\ProductController;
use App\Http\Controllers\API\User\OrdersController;
use App\Http\Controllers\API\App\CategoryController;
use App\Http\Controllers\API\User\ProfileController;
use App\Http\Controllers\API\User\AddressesController;
use App\Http\Controllers\API\User\FavoritesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('signup', [AuthController::class, 'signup']);
    Route::post('login', [AuthController::class, 'login']);
    Route::prefix('password')->group(function () {
        Route::post('reset', [AuthController::class, 'reset']);
        Route::post('update', [AuthController::class, 'updatePassword']);
    });
    Route::prefix('google')->group(function () {
        Route::get('/', [GoogleAuthController::class, 'redirect']);
        Route::get('callback', [GoogleAuthController::class, 'callback']);
    });
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth.guard:api');
});

Route::prefix('app')->middleware('auth.check:api')->group(function () {
    Route::post('search', [MainController::class, 'search']); // vendors || categories || subcategories || products
    Route::post('filter', [MainController::class, 'filter']); // offers || rates || price

    Route::get('main', [MainController::class, 'index']);
    Route::get('main/ads', [MainController::class, 'getAds']);
    Route::get('main/categories', [MainController::class, 'getCategories']);

    Route::get('category/sub-categories/{catId}', [CategoryController::class, 'getSubCategories']);
    Route::get('category/vendors/{catId}/{subCatId?}', [CategoryController::class, 'getVendors']);

    Route::get('vendor/sub-categories/{vendorId}', [VendorController::class, 'index']);
    Route::get('vendor/{id}', [VendorController::class, 'selectedVendor']);

    Route::get('sub-category/{subcategoryId}/products', [ProductController::class, 'index']);
    Route::get('product/{id}', [ProductController::class, 'selectedProduct']);
    Route::get('offers', [ProductController::class, 'getOffers']);

    Route::get('countries', [CountryController::class, 'getCountries']);
});

Route::prefix('my')->middleware('auth.guard:api')->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'profile']);
        Route::post('update', [ProfileController::class, 'updateProfile']);
        Route::post('password/change', [ProfileController::class, 'changePassword']);
        Route::post('set-delivery-phone/{userPhone}', [ProfileController::class, 'setDeliveryPhone']); // primary || secondary
        Route::prefix('image')->group(function () {
            Route::post('update', [ProfileController::class, 'updateProfileImage']);
            Route::delete('remove', [ProfileController::class, 'removeProfileImage']);
        });
        Route::delete('delete', [ProfileController::class, 'deleteAccount']);
    });

    Route::prefix('addresses')->group(function () {
        Route::get('/', [AddressesController::class, 'addresses']);
        Route::post('add', [AddressesController::class, 'addAddress']);
        Route::post('set-main/{id}', [AddressesController::class, 'setMainAddress']);
        Route::delete('delete/{id}', [AddressesController::class, 'deleteAddress']);
    });

    Route::prefix('cart')->group(function () {
        Route::get('/', [CartController::class, 'myCart']);
        Route::get('checkout', [CartController::class, 'checkoutPage']);
        Route::post('add', [CartController::class, 'addToCart']);
        Route::delete('remove/{id}', [CartController::class, 'removeFromCart']);
    });

    Route::prefix('orders')->group(function () {
        Route::get('/', [OrdersController::class, 'orders']);
        Route::get('{id}', [OrdersController::class, 'orderDetails']);
        Route::post('confirm', [OrdersController::class, 'confirmOrder']);
        Route::post('reorder/{id}', [OrdersController::class, 'reorder']);
        Route::post('cancel/{id}', [OrdersController::class, 'cancelOrder']);
        Route::delete('delete/{id}', [OrdersController::class, 'deleteOrder']);
    });

    Route::prefix('favorites/{type}')->group(function () { // vendor || product
        Route::get('/', [FavoritesController::class, 'favorites']);
        Route::post('toggle/{id}', [FavoritesController::class, 'toggleFavorite']);
    });

    Route::prefix('rates/{type}')->group(function () { // vendor || product
        Route::post('{id}', [RatesController::class, 'rate']);
        Route::delete('delete/{id}', [RatesController::class, 'deleteRate']);
    });
});
