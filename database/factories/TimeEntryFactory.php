<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\TimeEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TimeEntry>
 */
final class TimeEntryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startedAt = fake()->dateTimeBetween('-7 days', 'now');
        $endedAt = (clone $startedAt)->modify('+'.fake()->numberBetween(15, 240).' minutes');
        $durationSeconds = $endedAt->getTimestamp() - $startedAt->getTimestamp();

        return [
            'description' => fake()->sentence(3),
            'started_at' => $startedAt,
            'ended_at' => $endedAt,
            'duration_seconds' => $durationSeconds,
        ];
    }

    /**
     * Indicate that the time entry is currently running.
     */
    public function running(): static
    {
        return $this->state(fn (array $attributes) => [
            'ended_at' => null,
            'duration_seconds' => null,
        ]);
    }
}
