<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use App\Enums\UserRoleEnum;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class ProfileDropdown extends Component
{
    public string $name;

    public string $role;

    public function mount(): void
    {
        /** @var User */
        $user = Auth::user();
        $this->name = $user->name;
        $this->role = $user->role === UserRoleEnum::EMPLOYEE ? 'Employee' : 'Admin';
    }

    public function logout(): void
    {
        Auth::logout();

        redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.dashboard.profile-dropdown');
    }
}
