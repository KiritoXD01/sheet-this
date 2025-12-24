<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

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

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            redirect()->intended(route('dashboard.index'));
        }

        $this->addError('login', 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
