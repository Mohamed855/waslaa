<?php

use App\Http\Controllers\Dashboard\Admin\AdminsController;
use App\Http\Controllers\Dashboard\Admin\ADsController;
use App\Http\Controllers\Dashboard\Admin\CategoriesController;
use App\Http\Controllers\Dashboard\Admin\CitiesController;
use App\Http\Controllers\Dashboard\Admin\CountriesController;
use App\Http\Controllers\Dashboard\Admin\SubcategoriesController;
use App\Http\Controllers\Dashboard\Admin\VendorsController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "admin" middleware group. Make something great!
|
*/

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function() {
    Route::group(['prefix' => 'admin', 'middleware' => 'guard:admin'], function () {
        Route::get('/', function () { return view('admin.main.overview'); })->name('admin.overview');
        Route::resource('ads', ADsController::class)->except(['create', 'edit', 'show']);
        Route::resource('admins', AdminsController::class)->except(['show']);
        Route::resource('vendors', VendorsController::class)->except(['edit']);
        Route::resource('categories', CategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('subcategories', SubcategoriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('countries', CountriesController::class)->except(['create', 'edit', 'show']);
        Route::resource('cities', CitiesController::class)->except(['create', 'edit', 'show']);
    });
});
