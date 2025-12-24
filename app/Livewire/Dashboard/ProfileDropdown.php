<?php

declare(strict_types=1);

namespace App\Livewire\Dashboard;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

final class ProfileDropdown extends Component
{
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
