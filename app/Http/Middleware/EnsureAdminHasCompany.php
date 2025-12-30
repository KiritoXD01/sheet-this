<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class EnsureAdminHasCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, #[CurrentUser] User $user): Response
    {
        if (! $user->company) {
            return redirect()->route('admin.onboarding');
        }

        return $next($request);
    }
}
