<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Project;
use App\Models\Timesheet;
use App\Models\TimesheetItem;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TimesheetItem>
 */
final class TimesheetItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'timesheet_id' => Timesheet::factory(),
            'project_id' => Project::factory(),
            'item_date' => fake()->dateTimeBetween(
                startDate: '-1 month',
                endDate: '+1 month',
            ),
            'description' => fake()->sentence(3),
            'start_time' => fake()->time(),
            'end_time' => fake()->time(),
            'is_billable' => fake()->boolean(),
        ];
    }
}
