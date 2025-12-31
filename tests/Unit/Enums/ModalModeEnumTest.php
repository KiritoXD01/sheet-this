<?php

declare(strict_types=1);

use App\Enums\ModalModeEnum;

it('has create mode', function () {
    expect(ModalModeEnum::CREATE)
        ->toBeInstanceOf(ModalModeEnum::class);

    expect(ModalModeEnum::CREATE->value)->toBe('create');
});

it('has edit mode', function () {
    expect(ModalModeEnum::EDIT)
        ->toBeInstanceOf(ModalModeEnum::class);

    expect(ModalModeEnum::EDIT->value)->toBe('edit');
});

it('has exactly two modes', function () {
    expect(ModalModeEnum::cases())->toHaveCount(2);
});
