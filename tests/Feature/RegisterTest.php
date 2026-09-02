<?php

declare(strict_types=1);

use App\Models\User;
use Inertia\Testing\AssertableInertia as Assert;

it('renders the register page for guests', function () {
    $this->get(route('register.index'))
        ->assertOk()
        ->assertInertia(fn (Assert $page) => $page->component('Auth/Register'));
});

it('redirects authenticated users away from the register page', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->get(route('register.index'))
        ->assertRedirect('/dashboard');
});

it('registers a new user and logs them in', function () {
    $response = $this->post(route('register.store'), [
        'name' => 'Ada Lovelace',
        'email' => 'ada@example.com',
        'password' => 'super-secret-password',
        'password_confirmation' => 'super-secret-password',
        'terms' => '1',
    ]);

    $response->assertRedirect(route('dashboard.index'));

    $user = User::where('email', 'ada@example.com')->first();

    expect($user)->not->toBeNull();
    expect($user->name)->toBe('Ada Lovelace');
    $this->assertAuthenticatedAs($user);
});

it('rejects a duplicate email', function () {
    User::factory()->create(['email' => 'taken@example.com']);

    $this->from(route('register.index'))
        ->post(route('register.store'), [
            'name' => 'Someone',
            'email' => 'taken@example.com',
            'password' => 'super-secret-password',
            'password_confirmation' => 'super-secret-password',
            'terms' => '1',
        ])
        ->assertRedirect(route('register.index'))
        ->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('rejects a mismatched password confirmation', function () {
    $this->post(route('register.store'), [
        'name' => 'Someone',
        'email' => 'someone@example.com',
        'password' => 'super-secret-password',
        'password_confirmation' => 'different-password',
        'terms' => '1',
    ])->assertSessionHasErrors('password');

    $this->assertGuest();
});

it('requires accepting the terms', function () {
    $this->post(route('register.store'), [
        'name' => 'Someone',
        'email' => 'someone@example.com',
        'password' => 'super-secret-password',
        'password_confirmation' => 'super-secret-password',
    ])->assertSessionHasErrors('terms');

    $this->assertGuest();
    expect(User::where('email', 'someone@example.com')->exists())->toBeFalse();
});
