<?php

declare(strict_types=1);

use App\Enums\IndustryEnum;

it('has all industry cases', function ($industry, $value) {
    expect($industry->value)->toBe($value);
})->with([
    'technology' => [IndustryEnum::TECHNOLOGY, 'technology'],
    'finance' => [IndustryEnum::FINANCE, 'finance'],
    'healthcare' => [IndustryEnum::HEALTHCARE, 'healthcare'],
    'retail' => [IndustryEnum::RETAIL, 'retail'],
    'other' => [IndustryEnum::OTHER, 'other'],
]);

it('returns formatted label', function ($industry, $expectedLabel) {
    expect($industry->label())->toBe($expectedLabel);
})->with([
    'technology' => [IndustryEnum::TECHNOLOGY, 'Technology'],
    'finance' => [IndustryEnum::FINANCE, 'Finance'],
    'healthcare' => [IndustryEnum::HEALTHCARE, 'Healthcare'],
    'retail' => [IndustryEnum::RETAIL, 'Retail'],
    'other' => [IndustryEnum::OTHER, 'Other'],
]);

it('has exactly five cases', function () {
    expect(IndustryEnum::cases())->toHaveCount(5);
});
