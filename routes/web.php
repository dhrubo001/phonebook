<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Hash;

// Test route
Route::get('/password', function () {
    return Hash::make('12345678');
});

Route::group(['middleware' => ['guest']], function () {
    Route::get('/', [HomeController::class, 'getHome'])->name('home');
    Route::get('/login', [HomeController::class, 'getHome'])->name('login');
    Route::post('/login', [HomeController::class, 'postLogin'])->name('postLogin');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'getDashboard'])->name('dashboard');
    Route::get('/contacts', [DashboardController::class, 'getContacts'])->name('contacts');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');
});
