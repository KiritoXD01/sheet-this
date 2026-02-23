<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Livewire\Auth\LoginForm;
use App\Models\User;
use Livewire\Livewire;

it('fails validation when email is an array instead of a string', function () {
    Livewire::test(LoginForm::class)
        ->set('email', ['invalid'])
        ->set('password', 'password')
        ->call('submit')
        ->assertHasErrors(['email' => 'string']);
});

it('fails validation when password is an array instead of a string', function () {
    Livewire::test(LoginForm::class)
        ->set('email', 'employee@example.com')
        ->set('password', ['invalid'])
        ->call('submit')
        ->assertHasErrors(['password' => 'string']);
});

it('authenticates a valid employee and redirects to dashboard', function () {
    $user = User::factory()->create([
        'role' => UserRoleEnum::EMPLOYEE,
        'email' => 'employee@example.com',
    ]);

    Livewire::test(LoginForm::class)
        ->set('email', $user->email)
        ->set('password', 'password')
        ->call('submit')
        ->assertRedirect(route('dashboard.index'));

    expect(auth()->check())->toBeTrue();
    expect(auth()->id())->toBe($user->id);
});
