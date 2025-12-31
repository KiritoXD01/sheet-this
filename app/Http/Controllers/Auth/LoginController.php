<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

final class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        return view('auth.login');
    }
}
