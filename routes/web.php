<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::redirect('/', '/dashboard')->name('home');

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
})->name('login');

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
})->name('register');

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
