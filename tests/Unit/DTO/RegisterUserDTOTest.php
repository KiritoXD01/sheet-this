<?php

declare(strict_types=1);

use App\DTO\RegisterUserDTO;

it('can be created from array', function () {
    $dto = RegisterUserDTO::from([
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
    ]);

    expect($dto)
        ->fullName->toBe('John Doe')
        ->email->toBe('john@example.com')
        ->password->toBe('password123');
});

it('maps full_name to fullName property', function () {
    $dto = RegisterUserDTO::from([
        'full_name' => 'Jane Smith',
        'email' => 'jane@example.com',
        'password' => 'secret',
    ]);

    expect($dto->fullName)->toBe('Jane Smith');
});

it('preserves all required fields', function () {
    $data = [
        'full_name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'testpass',
    ];

    $dto = RegisterUserDTO::from($data);

    expect($dto)
        ->fullName->not->toBeEmpty()
        ->email->not->toBeEmpty()
        ->password->not->toBeEmpty();
});

it('can be converted to array', function () {
    $dto = RegisterUserDTO::from([
        'full_name' => 'John Doe',
        'email' => 'john@example.com',
        'password' => 'password123',
    ]);

    $array = $dto->toArray();

    expect($array)
        ->toBeArray()
        ->toHaveKey('fullName', 'John Doe')
        ->toHaveKey('email', 'john@example.com')
        ->toHaveKey('password', 'password123');
});
