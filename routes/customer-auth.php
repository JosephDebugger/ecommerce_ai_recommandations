<?php

use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
    
Route::name('customer.')->prefix('customer')->middleware('guest:customer')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [LoginController::class, 'create'])->name('login');

    Route::post('login', [LoginController::class, 'store']);

});

Route::name('customer.')->prefix('customer')->middleware('auth:customer')->group(function () {
    Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
});
