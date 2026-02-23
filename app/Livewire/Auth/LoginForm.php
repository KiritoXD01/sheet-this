<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class LoginForm extends Component
{
    #[Validate(['required', 'string', 'email'])]
    public string|array $email = '';

    #[Validate(['required', 'string'])]
    public string|array $password = '';

    public bool $remember = false;

    public function submit(): void
    {
        /** @var array{email: string, password: string} $validated */
        $validated = $this->validate();

        $success = Auth::attempt(
            credentials: [
                'email' => $validated['email'],
                'password' => $validated['password'],
            ],
            remember: $this->remember
        );

        if (! $success) {
            $this->addError('login', 'Invalid credentials');

            return;
        }

        /** @var User */
        $user = Auth::user();

        $route = match ($user->role) {
            UserRoleEnum::EMPLOYEE => 'dashboard.index',
            default => $user->company ? 'admin.index' : 'admin.onboarding',
        };

        redirect()->intended(route($route));
    }

    public function render(): View
    {
        return view('livewire.auth.login-form');
    }
}
