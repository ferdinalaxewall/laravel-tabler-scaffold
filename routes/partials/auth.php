<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


Route::group(['as' => 'auth.', 'middleware' => ['guest']], function () {
    Route::get('/login', [LoginController::class, 'viewLogin'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

    Route::get('/logout', [LogoutController::class, 'processLogout'])
        ->name('logout')
        ->withoutMiddleware(['guest'])
        ->middleware(['auth']);
});
