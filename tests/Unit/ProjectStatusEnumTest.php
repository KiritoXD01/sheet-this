<?php

declare(strict_types=1);

use App\Enums\ProjectStatusEnum;

it('has active case', function () {
    expect(ProjectStatusEnum::ACTIVE->value)->toBe('active');
});

it('has inactive case', function () {
    expect(ProjectStatusEnum::INACTIVE->value)->toBe('inactive');
});

it('has two cases', function () {
    expect(ProjectStatusEnum::cases())->toHaveCount(2);
});
