<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\CompanyPolicy;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

final class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user
        User::factory()
            ->has(
                factory: Company::factory()
                    ->has(Department::factory(5))
                    ->has(JobRole::factory(5))
                    ->has(Employee::factory(10), 'employees')
                    ->has(
                        factory: CompanyPolicy::factory(),
                        relationship: 'policy'
                    )
                    ->has(
                        factory: Project::factory(5),
                        relationship: 'projects'
                    ),
                relationship: 'company'
            )
            ->create([
                'email' => 'admin@test.com',
                'role' => UserRoleEnum::ADMIN,
            ]);
    }
}
