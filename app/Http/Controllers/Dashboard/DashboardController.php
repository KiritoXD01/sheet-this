<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;

final class DashboardController extends Controller
{
    public function __invoke(#[CurrentUser] User $user)
    {
        return view(
            view: 'dashboard.index',
            data: [
                'name' => $user->name,
            ]);
    }
}
