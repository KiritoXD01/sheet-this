<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Inertia\Response;

final class LoginController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Auth/Login');
    }

    public function store(LoginRequest $request)
    {
        $data = $request->validated();

        $isValidAuth = Auth::attempt($data);

        if (! $isValidAuth) {
            return back()->with('message', 'The provided credentials do not match our records.');
        }

        $request->session()->regenerate();

        return redirect()->intended('/dashboard');
    }

    public function destroy()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/login');
    }
}
