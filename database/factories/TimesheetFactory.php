<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\TimesheetStatusEnum;
use App\Models\Employee;
use App\Models\Timesheet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Timesheet>
 */
final class TimesheetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => Employee::factory(),
            'status' => TimesheetStatusEnum::random(),
            'notes' => fake()->optional()->text(),
        ];
    }
}
