<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\WorkWeekDaysEnum;
use App\Models\Company;
use App\Models\CompanyPolicy;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CompanyPolicy>
 */
final class CompanyPolicyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::factory(),
            'default_time_zone' => fake()->timezone(),
            'standard_work_day' => fake()->numberBetween(8, 12),
            'work_week' => WorkWeekDaysEnum::cases(),
            'overtime_enabled' => fake()->boolean(),
        ];
    }
}
