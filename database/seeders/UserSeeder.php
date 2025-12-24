<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Seeder;

final class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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

        Department::factory(10)->create([
            'company_id' => $company->id,
        ]);

        // Employee
        User::factory()->create([
            'email' => 'employee@test.com',
            'role' => UserRoleEnum::EMPLOYEE,
        ]);
    }
}
