<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

final class LoginForm extends Component
{
    #[Validate(['required', 'email'])]
    public string $email;

    #[Validate(['required'])]
    public string $password;

    public bool $remember = false;

    public function submit(): void
    {
        $this->validate();

        $success = Auth::attempt(
            credentials: [
                'email' => $this->email,
                'password' => $this->password,
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

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
