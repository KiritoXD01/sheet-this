<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\CompanyPolicy;
use App\Models\Department;
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

        $company = Company::factory()->create([
            'owner_id' => $admin->id,
        ]);

        Department::factory(5)->create([
            'company_id' => $company->id,
        ]);

        CompanyPolicy::factory()->create([
            'company_id' => $company->id,
        ]);

        // Employee
        User::factory()->create([
            'email' => 'employee@test.com',
            'role' => UserRoleEnum::EMPLOYEE,
        ]);
    }
}
