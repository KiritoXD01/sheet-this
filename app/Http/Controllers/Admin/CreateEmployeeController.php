<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\DTO\PosthogCaptureEventDTO;
use App\Enums\PosthogEventEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PosthogService;
use Illuminate\Container\Attributes\CurrentUser;

final class CreateEmployeeController extends Controller
{
    public function __invoke(#[CurrentUser] User $user)
    {
        PosthogService::capture(PosthogCaptureEventDTO::from([
            'distinctId' => $user->email,
            'event' => PosthogEventEnum::OPENED_ADMIN_CREATE_EMPLOYEE,
        ]));

        return view('admin.employees.create');
    }
}
