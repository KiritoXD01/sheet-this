<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class Header extends Component
{
    public array $navLinks;

    public function mount(): void
    {
        /** @var User */
        $user = Auth::user();

        $links = match ($user->role) {
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
                    'route' => route('admin.employees'),
                    'active' => request()->routeIs('admin.employees'),
                ],
                [
                    'title' => 'Company',
                    'route' => route('admin.company'),
                    'active' => request()->routeIs('admin.company'),
                ],
            ]
        };

        $this->navLinks = $links;
    }

    public function render()
    {
        return view('livewire.dashboard.header');
    }
}
