<?php

declare(strict_types=1);

use App\Models\User;
use Illuminate\Support\Facades\Auth;

it('logs in with valid credentials', function () {
    $user = User::factory()->create();

    $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
    ])->assertRedirect('/dashboard');

    $this->assertAuthenticatedAs($user);
});

it('sets a remember cookie when remember me is checked', function () {
    $user = User::factory()->create();

    $response = $this->post(route('login.store'), [
        'email' => $user->email,
        'password' => 'password',
        'remember' => '1',
    ]);

    $response->assertRedirect('/dashboard');
    $response->assertCookie(Auth::guard()->getRecallerName());
});

it('flashes an error for invalid credentials', function () {
    $user = User::factory()->create();

    $this->from(route('login.index'))
        ->post(route('login.store'), [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])
        ->assertRedirect(route('login.index'))
        ->assertSessionHas('message');

    $this->assertGuest();
});
