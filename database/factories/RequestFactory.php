<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use App\Models\Employee;
use App\Models\Request;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Request>
 */
final class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('now', '+1 month');
        $endDate = fake()->dateTimeBetween($startDate, '+2 months');

        return [
            'employee_id' => Employee::factory(),
            'request_type' => RequestTypeEnum::random()->value,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'status' => RequestStatusEnum::random()->value,
            'notes' => fake()->optional()->paragraph(),
        ];
    }
}
