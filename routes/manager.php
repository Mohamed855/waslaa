<?php

use App\Http\Controllers\Dashboard\Vendor\OrdersController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "manager" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::group(['prefix' => 'manager', 'middleware' => 'guard:manager'], function () {
        Route::get('/', function () { return view('manager.main.overview'); })->name('manager.overview');
        Route::resource('orders', OrdersController::class);
    });
});
