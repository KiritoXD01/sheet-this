<?php

declare(strict_types=1);

use App\Http\Controllers\Api\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterUserController::class)->name('api.register');
