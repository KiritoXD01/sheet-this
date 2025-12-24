<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\IndustryEnum;
use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Company>
 */
final class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'industry' => IndustryEnum::random(),
            'logo' => fake()->imageUrl(),
            'owner_id' => User::factory(),
        ];
    }
}
