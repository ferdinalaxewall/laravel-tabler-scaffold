<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\RegisterController;


Route::group(['as' => 'auth.', 'middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [RegisterController::class, 'viewRegister'])->name('register');
    Route::post('/register', [RegisterController::class, 'storeRegister'])->name('store.register');

    Route::get('/forgot-password', [ForgotPasswordController::class, 'viewForgotPassword'])->name('forgot-password');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'storeForgotPassword'])->name('store.forgot-password');

    Route::get('/logout', [LogoutController::class, 'processLogout'])
        ->name('logout')
        ->withoutMiddleware(['guest'])
        ->middleware(['auth']);
});
