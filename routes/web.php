<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Users\AdministratorController;

Route::get('/', fn () => to_route('admin.dashboard'));
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group([
        'prefix' => 'users',
        'as' => 'users.'
    ], function () {
        Route::group([
            'prefix' => 'administrator',
            'as' => 'administrator.'
        ], function () {
            Route::get('/', [AdministratorController::class, 'index'])->name('index');
            Route::get('/list', [AdministratorController::class, 'list'])->name('list');
            Route::get('/create', [AdministratorController::class, 'create'])->name('create');
            Route::post('/', [AdministratorController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [AdministratorController::class, 'edit'])->name('edit');
            Route::put('/update/{id}', [AdministratorController::class, 'update'])->name('update');
            Route::get('/delete/{id}', [AdministratorController::class, 'delete'])->name('delete');
        });
    });
});
