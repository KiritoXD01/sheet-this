<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Livewire\Component;

final class Header extends Component
{
    public function render(#[CurrentUser] User $user)
    {
        return view('livewire.dashboard.header', [
            'navLinks' => match ($user->role) {
                UserRoleEnum::EMPLOYEE => [
                    [
                        'title' => 'Dashboard',
                        'route' => route('dashboard.index'),
                        'active' => request()->routeIs('dashboard.index'),
                    ],
                    [
                        'title' => 'Timesheet',
                        'route' => route('dashboard.timesheet'),
                        'active' => request()->routeIs('dashboard.timesheet'),
                    ],
                    [
                        'title' => 'Reports',
                        'route' => route('dashboard.reports'),
                        'active' => request()->routeIs('dashboard.reports'),
                    ],
                ],
                UserRoleEnum::ADMIN => [
                    [
                        'title' => 'Overview',
                        'route' => route('admin.index'),
                        'active' => request()->routeIs('admin.index'),
                    ],
                    [
                        'title' => 'Employees',
                        'route' => route('admin.employees.index'),
                        'active' => request()->routeIs('admin.employees'),
                    ],
                    [
                        'title' => 'Company',
                        'route' => route('admin.company'),
                        'active' => request()->routeIs('admin.company'),
                    ],
                ]
            },
        ]);
    }

    public function home(#[CurrentUser] User $user): void
    {
        $route = match ($user->role) {
            UserRoleEnum::EMPLOYEE => route('dashboard.index'),
            UserRoleEnum::ADMIN => route('admin.index'),
        };
        $this->redirect($route);
    }
}
