<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

final class OnboardingController extends Controller
{
    public function __invoke()
    {
        // If user already has company, redirect to admin dashboard
        if (Auth::user()->company) {
            return redirect()->route('admin.index');
        }

        return view('admin.onboarding.index');
    }
}
