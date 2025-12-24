<?php

declare(strict_types=1);

namespace App\Livewire\Auth;

use Livewire\Attributes\Validate;
use Livewire\Component;

final class LoginForm extends Component
{
    #[Validate(['required', 'email'])]
    public string $email;

    #[Validate(['required'])]
    public string $password;

    public function submit(): void
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.auth.login-form');
    }
}
