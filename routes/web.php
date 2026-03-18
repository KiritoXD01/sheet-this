<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard')->name('home');

Route::prefix('login')
    ->name('login.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('/', [LoginController::class, 'index'])->name('index');
            Route::post('/', [LoginController::class, 'store'])->name('store');
        });

        Route::middleware('auth')->post('/logout', [LoginController::class, 'destroy'])->name('logout');
    });

Route::prefix('register')
    ->name('register.')
    ->group(function () {
        Route::middleware('guest')->group(function () {
            Route::get('/', [RegisterController::class, 'index'])->name('index');
        });
    });

Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
})->name('forgot-password');

Route::prefix('/dashboard')
    ->middleware('auth')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', function () {
            return Inertia::render('Dashboard');
        })->name('index');

        Route::get('/projects', function () {
            return Inertia::render('Projects');
        })->name('projects');

        Route::get('/timesheet', function () {
            return Inertia::render('Timesheet');
        })->name('timesheet');
    });
