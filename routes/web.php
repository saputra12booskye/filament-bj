<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Customer\DashboardController;
Route::get('/', function () {
    return view('welcome');

});
Route::middleware(['auth:customer'])->group(function () {
    Route::get('/checkout', [CheckController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckController::class, 'store'])->name('checkout.store');

});
Route::get('/login', [CustomerAuthController::class, 'showLogin'])
    ->name('customer.login');
Route::post('/login', [CustomerAuthController::class, 'login']);

Route::get('/register', [CustomerAuthController::class, 'showRegister'])
    ->name('customer.register');

Route::post('/register', [CustomerAuthController::class, 'register']);

Route::post('/logout', [CustomerAuthController::class, 'logout'])
    ->name('customer.logout');    

    Route::middleware('auth:customer')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('customer.dashboard');

    
});
