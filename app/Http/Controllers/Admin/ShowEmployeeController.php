<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\DTO\PosthogCaptureEventDTO;
use App\Enums\PosthogEventEnum;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use App\Services\PosthogService;
use Illuminate\Container\Attributes\CurrentUser;

final class ShowEmployeeController extends Controller
{
    public function __invoke(Employee $employee, #[CurrentUser] User $user)
    {
        $employee->load('company', 'user', 'department', 'jobRole');

        PosthogService::capture(PosthogCaptureEventDTO::from([
            'distinctId' => $user->email,
            'event' => PosthogEventEnum::OPENED_ADMIN_SHOW_EMPLOYEE,
        ]));

        return view('admin.employees.show', compact('employee'));
    }
}
