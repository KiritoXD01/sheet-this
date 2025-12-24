<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Enums\UserRoleEnum;
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
        User::factory()->create([
            'email' => 'admin@test.com',
            'role' => UserRoleEnum::ADMIN,
        ]);

        // Employee
        User::factory()->create([
            'email' => 'employee@test.com',
            'role' => UserRoleEnum::EMPLOYEE,
        ]);
    }
}
