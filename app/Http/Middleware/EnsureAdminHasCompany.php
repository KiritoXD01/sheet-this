<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Company;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

final class EnsureAdminHasCompany
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_id = Auth::id();

        $companyExists = Company::query()->where('owner_id', $user_id)->exists();

        if (! $companyExists) {
            return redirect()->route('admin.onboarding');
        }

        return $next($request);
    }
}
