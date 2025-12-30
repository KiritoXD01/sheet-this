<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Closure;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, #[CurrentUser] User $user): Response
    {
        if ($user->role !== UserRoleEnum::ADMIN) {
            return redirect()->route('dashboard.index');
        }

        return $next($request);
    }
}
