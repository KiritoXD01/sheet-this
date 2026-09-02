<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\ProjectStatusEnum;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
final class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->words(3, true),
            'status' => ProjectStatusEnum::random(),
        ];
    }
}
