<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Enums\RequestStatusEnum;
use App\Models\Request;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Livewire\Component;

final class RecentRequests extends Component
{
    public function render(#[CurrentUser] User $user)
    {
        $requests = $user->company->requests()
            ->where('status', RequestStatusEnum::PENDING)
            ->with(['employee.user', 'employee.department'])
            ->latest()
            ->limit(5)
            ->get();

        return view('livewire.admin.recent-requests', compact('requests'));
    }

    public function approve(int $requestId): void
    {
        /** @var Request */
        $request = Request::find($requestId);

        $request->update([
            'status' => RequestStatusEnum::APPROVED,
        ]);
    }

    public function reject(int $requestId): void
    {
        /** @var Request */
        $request = Request::find($requestId);

        $request->update([
            'status' => RequestStatusEnum::REJECTED,
        ]);
    }
}
