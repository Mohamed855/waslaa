<?php

use App\Http\Controllers\Dashboard\Vendor\OrdersController;
use App\Http\Controllers\Dashboard\Vendor\ProductsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "vendor" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::group(['prefix' => 'vendor', 'middleware' => 'guard:vendor'], function () {
        Route::get('/', function () { return view('vendor.main.overview'); })->name('vendor.overview');
        Route::resource('products', ProductsController::class)->except([]);
        Route::resource('orders', OrdersController::class);
    });
});
