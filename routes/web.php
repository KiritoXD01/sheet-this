<?php

declare(strict_types=1);

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');
Route::get('/login', LoginController::class)->name('login');

Route::middleware('auth')
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('index');
    });
