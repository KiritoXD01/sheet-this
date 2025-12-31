<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\CompanyPolicy;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
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
        $user = User::factory()
            ->create([
                'email' => 'admin@test.com',
                'role' => UserRoleEnum::ADMIN,
            ]);

        // Create a company
        $company = Company::factory()->create([
            'owner_id' => $user->id,
        ]);

        // Create Company Policy
        CompanyPolicy::factory()->create([
            'company_id' => $company->id,
        ]);

        // Create Departments
        $departments = Department::factory(5)->create([
            'company_id' => $company->id,
        ]);

        // Create Job Roles
        $jobRoles = JobRole::factory(5)->create([
            'company_id' => $company->id,
        ]);

        // Create Employees
        $users = User::factory(10)->create([
            'role' => UserRoleEnum::EMPLOYEE,
        ]);

        foreach ($users as $user) {
            Employee::factory()->create([
                'user_id' => $user->id,
                'company_id' => $company->id,
                'department_id' => $departments->random()->id,
                'job_role_id' => $jobRoles->random()->id,
            ]);
        }
    }
}
