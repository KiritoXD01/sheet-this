<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;

it('has admin case', function () {
    expect(UserRoleEnum::ADMIN)
        ->toBeInstanceOf(UserRoleEnum::class);

    expect(UserRoleEnum::ADMIN->value)->toBe('admin');
});

it('has employee case', function () {
    expect(UserRoleEnum::EMPLOYEE)
        ->toBeInstanceOf(UserRoleEnum::class);

    expect(UserRoleEnum::EMPLOYEE->value)->toBe('employee');
});

it('can be serialized to string', function () {
    expect(UserRoleEnum::ADMIN->value)
        ->toBeString()
        ->toBe('admin');

    expect(UserRoleEnum::EMPLOYEE->value)
        ->toBeString()
        ->toBe('employee');
});

it('has exactly two cases', function () {
    expect(UserRoleEnum::cases())->toHaveCount(2);
});
