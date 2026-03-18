<?php

declare(strict_types=1);

use App\Enums\ProjectStatusEnum;

it('returns case names', function () {
    expect(ProjectStatusEnum::names())->toBe(['ACTIVE', 'INACTIVE']);
});

it('returns case values', function () {
    expect(ProjectStatusEnum::values())->toBe(['active', 'inactive']);
});

it('returns cases as array', function () {
    expect(ProjectStatusEnum::array())->toBe([
        'active' => 'ACTIVE',
        'inactive' => 'INACTIVE',
    ]);
});

it('returns a random case', function () {
    $random = ProjectStatusEnum::random();
    expect($random)->toBeInstanceOf(ProjectStatusEnum::class);
});
