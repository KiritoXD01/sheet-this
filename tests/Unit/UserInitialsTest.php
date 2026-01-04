<?php

declare(strict_types=1);

use App\Models\User;

it('returns initials for two-word name', function () {
    $user = User::factory()->make(['name' => 'John Doe']);

    expect($user->initials)->toBe('JD');
});

it('returns first two letters for single-word name', function () {
    $user = User::factory()->make(['name' => 'John']);

    expect($user->initials)->toBe('JO');
});

it('returns first letter for single-character name', function () {
    $user = User::factory()->make(['name' => 'J']);

    expect($user->initials)->toBe('J');
});

it('returns first two initials for three or more word name', function () {
    $user = User::factory()->make(['name' => 'John Paul Doe']);

    expect($user->initials)->toBe('JP');
});

it('handles names with extra spaces', function () {
    $user = User::factory()->make(['name' => '  John   Doe  ']);

    expect($user->initials)->toBe('JD');
});

it('returns empty string for empty name', function () {
    $user = User::factory()->make(['name' => '']);

    expect($user->initials)->toBe('');
});

it('returns uppercase initials', function () {
    $user = User::factory()->make(['name' => 'john doe']);

    expect($user->initials)->toBe('JD');
});
