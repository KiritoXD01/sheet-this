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
        $user = User::factory()
            ->has(
                factory: Company::factory()
                    ->has(Department::factory(5))
                    ->has(JobRole::factory(5))
                    ->has(
                        factory: CompanyPolicy::factory(),
                        relationship: 'policy'
                    ),
                relationship: 'company'
            )
            ->create([
                'email' => 'admin@test.com',
                'role' => UserRoleEnum::ADMIN,
            ]);

        Employee::factory()
            ->for(factory: $user, relationship: 'user')
            ->create([
                'company_id' => $user->company->id,
            ]);
    }
}
