<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;

final class EmailVerificationController extends Controller
{
    public function __invoke(User $user): RedirectResponse
    {
        if (! hash_equals(
            sha1($user->getEmailForVerification()),
            (string) request()->route('hash')
        )) {
            return redirect('/login')->with('verification_error', 'Invalid verification link.');
        }

        if ($user->hasVerifiedEmail()) {
            return redirect('/login')->with('verification_info', 'Email already verified.');
        }

        $user->markEmailAsVerified();

        return redirect('/login')->with('verification_success', 'Email verified successfully.');
    }
}
