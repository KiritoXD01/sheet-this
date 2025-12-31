<?php

declare(strict_types=1);

use App\Models\User;

use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\postJson;

it('registers new user successfully', function () {
    $response = postJson(route('api.register'), [
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ]);

    $response->assertSuccessful()
        ->assertJson([
            'success' => true,
            'message' => 'User created successfully',
        ]);

    assertDatabaseHas('users', [
        'name' => 'John Doe',
        'email' => 'john@example.com',
    ]);
});

it('lowercases email on registration', function () {
    postJson(route('api.register'), [
        'full_name' => 'Jane Doe',
        'email' => 'Jane@EXAMPLE.COM',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ])->assertSuccessful();

    assertDatabaseHas('users', [
        'email' => 'jane@example.com',
    ]);
});

it('sets terms_agreed_at timestamp', function () {
    postJson(route('api.register'), [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ])->assertSuccessful();

    $user = User::where('email', 'test@example.com')->first();
    expect($user->terms_agreed_at)->not->toBeNull();
});

it('validates required fields', function ($field) {
    $data = [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ];

    unset($data[$field]);

    postJson(route('api.register'), $data)
        ->assertUnprocessable()
        ->assertJsonValidationErrors($field);
})->with(['full_name', 'email', 'password', 'terms_agreed']);

it('validates email format', function () {
    postJson(route('api.register'), [
        'full_name' => 'Test User',
        'email' => 'invalid-email',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ])->assertUnprocessable()
        ->assertJsonValidationErrors('email');
});

it('validates unique email', function () {
    User::factory()->create(['email' => 'existing@example.com']);

    postJson(route('api.register'), [
        'full_name' => 'Test User',
        'email' => 'existing@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => true,
    ])->assertUnprocessable()
        ->assertJsonValidationErrors('email');
});

it('validates password confirmation', function () {
    postJson(route('api.register'), [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'DifferentPassword123!',
        'terms_agreed' => true,
    ])->assertUnprocessable()
        ->assertJsonValidationErrors('password');
});

it('requires terms_agreed to be boolean', function () {
    postJson(route('api.register'), [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'Password123!',
        'password_confirmation' => 'Password123!',
        'terms_agreed' => 'yes',
    ])->assertUnprocessable()
        ->assertJsonValidationErrors('terms_agreed');
});
