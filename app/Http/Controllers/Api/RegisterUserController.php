<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\DTO\RegisterUserDTO;
use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterUserRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

final class RegisterUserController extends Controller
{
    public function __invoke(RegisterUserRequest $request): JsonResponse
    {
        $dto = RegisterUserDTO::from($request->validated());

        $user = User::query()->create([
            'name' => $dto->fullName,
            'email' => Str::lower($dto->email),
            'password' => $dto->password,
            'terms_agreed_at' => now(),
            'role' => UserRoleEnum::ADMIN,
        ]);

        $user->sendEmailVerificationNotification();

        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
        ]);
    }
}
