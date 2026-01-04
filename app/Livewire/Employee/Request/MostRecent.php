<?php

declare(strict_types=1);

namespace App\Livewire\Employee\Request;

use App\Models\Request;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Livewire\Component;

final class MostRecent extends Component
{
    public function render(#[CurrentUser] User $user)
    {
        $requests = Request::query()
            ->where('employee_id', $user->employee->id)
            ->latest()
            ->limit(5)
            ->get();

        return view('livewire.employee.request.most-recent', ['requests' => $requests]);
    }
}
