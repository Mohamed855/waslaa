<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->group(function () {
    Route::get('/', function () { return view('admin.auth.sign-in'); })->name('admin.signIn');
    Route::get('/signup', function () { return view('admin.auth.sign-up'); })->name('admin.signUp');
    Route::get('/reset', function () { return view('admin.auth.reset'); })->name('admin.reset');
    // Route::get('/lock', function () { return view('admin.auth.lock-screen'); })->name('admin.lock');
    Route::get('/sign-out', function () { return view('admin.auth.sign-out'); })->name('admin.signOut');

    Route::prefix('panel')->group(function () {
        Route::get('/', function () { return view('admin.pages.starter'); })->name('panel.starter');
    });
});
