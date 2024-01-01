<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\AppController;
use App\Http\Controllers\API\User\AddressesController;
use App\Http\Controllers\API\User\CartController;
use App\Http\Controllers\API\User\FavoritesController;
use App\Http\Controllers\API\User\OrdersController;
use App\Http\Controllers\API\User\ProfileController;
use App\Http\Controllers\API\User\RatesController;
use Illuminate\Support\Facades\Route;

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
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth.guard:api');
});

Route::prefix('app')->group(function () {
    Route::get('/', [AppController::class, 'mainPage']);
    Route::get('category/{catId}/{subCatId?}', [AppController::class, 'categoryPage']);
    Route::get('vendor/{id}', [AppController::class, 'vendorPage']);
    Route::get('product/{id}', [AppController::class, 'productPage']);
    Route::get('offers', [AppController::class, 'offersPage']);
    Route::get('countries', [AppController::class, 'countries']);
    Route::post('search', [AppController::class, 'search']); // vendors || categories || subcategories || products
    Route::post('filter', [AppController::class, 'filter']); // offers || rates || price
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
