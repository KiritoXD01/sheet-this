<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Employee>
 */
final class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'company_id' => Company::factory(),
            'department_id' => Department::factory(),
            'job_role_id' => JobRole::factory(),
            'employee_code' => fake()->uuid(),
            'profile_picture' => fake()->image(),
        ];
    }
}
