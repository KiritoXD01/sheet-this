<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Dashboard');
});

Route::get('/projects', function () {
    return Inertia::render('Projects');
});

Route::get('/timesheet', function () {
    return Inertia::render('Timesheet');
});

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/register', function () {
    return Inertia::render('Auth/Register');
});

Route::get('/forgot-password', function () {
    return Inertia::render('Auth/ForgotPassword');
});
