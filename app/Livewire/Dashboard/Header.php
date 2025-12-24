<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use Livewire\Component;

final class Header extends Component
{
    public array $navLinks;

    public function mount(): void
    {
        $this->navLinks = [
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
        ];
    }

    public function render()
    {
        return view('livewire.dashboard.header');
    }
}
