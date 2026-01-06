<?php

use App\Models\User;
use function Pest\Laravel\get;
use Illuminate\Support\Facades\URL;

it('verifies email successfully with valid hash', function () {
    $user = User::factory()->create(['email_verified_at' => null]);

    $url = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'user' => $user->id,
            'hash' => sha1($user->email),
        ]
    );

    get($url)
        ->assertRedirect('/login')
        ->assertSessionHas('verification_success', 'Email verified successfully.');

    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
});

it('fails verification with invalid hash', function () {
    $user = User::factory()->create(['email_verified_at' => null]);

    $url = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'user' => $user->id,
            'hash' => 'invalid-hash',
        ]
    );

    get($url)
        ->assertRedirect('/login')
        ->assertSessionHas('verification_error', 'Invalid verification link.');

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

it('redirects already verified user with info message', function () {
    $user = User::factory()->create();

    $url = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        [
            'user' => $user->id,
            'hash' => sha1($user->email),
        ]
    );

    get($url)
        ->assertRedirect('/login')
        ->assertSessionHas('verification_info', 'Email already verified.');
});
