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

final class EmployeeController extends Controller
{
    public function __invoke(#[CurrentUser] User $user)
    {
        PosthogService::capture(PosthogCaptureEventDTO::from([
            'distinctId' => $user->email,
            'event' => PosthogEventEnum::OPENED_ADMIN_EMPLOYEES,
        ]));

        $employees = Employee::query()
            ->with(['user', 'department', 'jobRole'])
            ->where('company_id', $user->company->id)
            ->paginate(perPage: 8);

        return view('admin.employees.index', compact('employees'));
    }
}
