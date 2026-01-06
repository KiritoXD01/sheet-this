<?php

declare(strict_types=1);

use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\CreateEmployeeController;
use App\Http\Controllers\Admin\EditEmployeeController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\OnboardingController;
use App\Http\Controllers\Admin\ShowEmployeeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\TimesheetController;
use App\Http\Controllers\EmailVerificationController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login')->name('home');
Route::get('/login', LoginController::class)->middleware('guest')->name('login');
Route::get('/email/verify/{id}/{hash}', EmailVerificationController::class)->name('verification.verify');

Route::middleware(['auth', 'employee', 'signed'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('index');
        Route::get('/timesheet', TimesheetController::class)->name('timesheet');
    });

Route::middleware(['auth', 'admin', 'signed'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/onboarding', OnboardingController::class)->name('onboarding');
    });

// Protected admin routes (require company via admin.company middleware)
Route::middleware(['auth', 'admin', 'admin.company', 'signed'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::prefix('employees')
            ->name('employees.')
            ->group(function () {
                Route::get('/', EmployeeController::class)->name('index');
                Route::get('/create', CreateEmployeeController::class)->name('create');
                Route::get('/{employee}', ShowEmployeeController::class)->name('show');
                Route::get('/{employee}/edit', EditEmployeeController::class)->name('edit');
            });
        Route::get('/company', CompanyController::class)->name('company');
    });
