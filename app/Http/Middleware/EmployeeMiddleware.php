<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Closure;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, #[CurrentUser] User $user): Response
    {
        if ($user->role !== UserRoleEnum::EMPLOYEE) {
            return redirect()->route('admin.index');
        }

        return $next($request);
    }
}
