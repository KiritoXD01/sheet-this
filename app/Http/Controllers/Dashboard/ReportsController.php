<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\DTO\PosthogCaptureEventDTO;
use App\Enums\PosthogEventEnum;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\PosthogService;
use Illuminate\Container\Attributes\CurrentUser;

final class ReportsController extends Controller
{
    public function __invoke(#[CurrentUser] User $user)
    {
        PosthogService::capture(PosthogCaptureEventDTO::from([
            'distinctId' => $user->email,
            'event' => PosthogEventEnum::OPENED_EMPLOYEE_REPORTS,
        ]));

        return view('dashboard.reports');
    }
}
