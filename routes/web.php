<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\OnboardingController;
use App\Http\Controllers\Dashboard\ReportsController;
use App\Http\Controllers\Admin\ShowEmployeeController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\TimesheetController;
use App\Http\Controllers\Admin\CreateEmployeeController;

Route::redirect('/', '/login')->name('home');
Route::get('/login', LoginController::class)->middleware('guest')->name('login');

Route::middleware(['auth', 'employee'])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('index');
        Route::get('/timesheet', TimesheetController::class)->name('timesheet');
        Route::get('/reports', ReportsController::class)->name('reports');
    });

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/onboarding', OnboardingController::class)->name('onboarding');
    });

// Protected admin routes (require company via admin.company middleware)
Route::middleware(['auth', 'admin', 'admin.company'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', IndexController::class)->name('index');
        Route::get('/employees', EmployeeController::class)->name('employees');
        Route::get('/employees/create', CreateEmployeeController::class)->name('employees.create');
        Route::get('/employees/{employee}', ShowEmployeeController::class)->name('employees.show');
        Route::get('/company', CompanyController::class)->name('company');
    });
