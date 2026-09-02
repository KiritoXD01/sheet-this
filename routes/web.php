<?php

declare(strict_types=1);

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ProjectController;
use Illuminate\Http\Request;
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
    ->middleware('guest')
    ->group(function () {
        Route::get('/', [RegisterController::class, 'index'])->name('index');
        Route::post('/', [RegisterController::class, 'store'])->name('store');
    });

Route::middleware('guest')
    ->name('password.')
    ->group(function () {
        Route::get('/forgot-password', [PasswordResetLinkController::class, 'index'])->name('request');
        Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('email');
        Route::get('/reset-password/{token}', [NewPasswordController::class, 'index'])->name('reset');
        Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('update');
    });

Route::prefix('/dashboard')
    ->middleware('auth')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', function () {
            return Inertia::render('Dashboard');
        })->name('index');

        Route::get('/projects', function (Request $request) {
            return Inertia::render('Projects', [
                'projects' => $request->user()
                    ->projects()
                    ->latest()
                    ->get(['id', 'name', 'color']),
            ]);
        })->name('projects');

        Route::get('/timesheet', function () {
            return Inertia::render('Timesheet');
        })->name('timesheet');
    });

Route::prefix('/projects')
    ->middleware('auth')
    ->name('projects.')
    ->group(function () {
        Route::post('/', [ProjectController::class, 'store'])->name('store');
        Route::put('/{project}', [ProjectController::class, 'update'])->name('update');
    });

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy-policy');
