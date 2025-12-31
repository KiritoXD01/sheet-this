<?php

declare(strict_types=1);

use App\Enums\WorkWeekDaysEnum;

it('has all weekday cases', function () {
    $days = WorkWeekDaysEnum::values();

    expect($days)
        ->toHaveCount(7)
        ->toContain('monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday');
});

it('returns correct initial for each day', function ($day, $expectedInitial) {
    expect($day->initial())->toBe($expectedInitial);
})->with([
    'monday' => [WorkWeekDaysEnum::MONDAY, 'M'],
    'tuesday' => [WorkWeekDaysEnum::TUESDAY, 'T'],
    'wednesday' => [WorkWeekDaysEnum::WEDNESDAY, 'W'],
    'thursday' => [WorkWeekDaysEnum::THURSDAY, 'T'],
    'friday' => [WorkWeekDaysEnum::FRIDAY, 'F'],
    'saturday' => [WorkWeekDaysEnum::SATURDAY, 'S'],
    'sunday' => [WorkWeekDaysEnum::SUNDAY, 'S'],
]);

it('initial is uppercase', function () {
    foreach (WorkWeekDaysEnum::cases() as $day) {
        expect($day->initial())
            ->toBeString()
            ->toMatch('/^[A-Z]$/');
    }
});
