<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => to_route('admin.dashboard'));
Route::group([
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth']
], function () {
    Route::get('/', fn () => redirect()->route('admin.dashboard'));
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
