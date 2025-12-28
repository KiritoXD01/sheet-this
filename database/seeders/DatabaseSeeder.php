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
        // Admin
        $admin = User::factory()->create([
            'email' => 'admin@test.com',
            'role' => UserRoleEnum::ADMIN,
        ]);

        /** @var Company */
        $company = Company::factory()
            ->has(Department::factory(5))
            ->has(JobRole::factory(5))
            ->has(CompanyPolicy::factory())
            ->create([
                'owner_id' => $admin->id,
            ]);

        /** @var User */
        $employee = User::factory()->create([
            'email' => 'employee@test.com',
            'role' => UserRoleEnum::EMPLOYEE,
        ]);

        $employeeData = Employee::factory()->make([
            'user_id' => $employee->id,
            'company_id' => $company->id,
        ]);

        $employee->employee()->save($employeeData);
    }
}
