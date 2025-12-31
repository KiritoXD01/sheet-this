<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;

it('returns all enum names', function () {
    expect(UserRoleEnum::names())
        ->toBeArray()
        ->toHaveCount(2)
        ->toContain('ADMIN', 'EMPLOYEE');
});

it('returns all enum values', function () {
    expect(UserRoleEnum::values())
        ->toBeArray()
        ->toHaveCount(2)
        ->toContain('admin', 'employee');
});

it('returns enum as associative array', function () {
    $result = UserRoleEnum::array();

    expect($result)
        ->toBeArray()
        ->toHaveKey('admin')
        ->toHaveKey('employee');

    expect($result['admin'])->toBe('ADMIN');
    expect($result['employee'])->toBe('EMPLOYEE');
});

it('returns random enum case', function () {
    $random = UserRoleEnum::random();

    expect($random)
        ->toBeInstanceOf(UserRoleEnum::class)
        ->toBeIn([UserRoleEnum::ADMIN, UserRoleEnum::EMPLOYEE]);
});

it('random method returns different values across multiple calls', function () {
    $results = [];
    for ($i = 0; $i < 10; $i++) {
        $results[] = UserRoleEnum::random();
    }

    expect($results)->toBeArray()->toHaveCount(10);
});
