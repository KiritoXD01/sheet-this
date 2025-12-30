<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterUserRequest;

final class RegisterUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(RegisterUserRequest $request)
    {
        //
    }
}
