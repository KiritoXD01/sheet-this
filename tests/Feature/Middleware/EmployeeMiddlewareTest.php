<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('allows employee users to access dashboard routes', function () {
    $user = User::factory()->create(['role' => UserRoleEnum::EMPLOYEE]);
    $company = Company::factory()->create();
    Employee::factory()->create(['user_id' => $user->id, 'company_id' => $company->id]);

    actingAs($user)
        ->get(route('dashboard.index'))
        ->assertSuccessful();
});

it('redirects admin users to admin index', function () {
    $admin = User::factory()->create(['role' => UserRoleEnum::ADMIN]);
    Company::factory()->create(['owner_id' => $admin->id]);

    actingAs($admin)
        ->get(route('dashboard.index'))
        ->assertRedirect(route('admin.index'));
});

it('redirects unauthenticated users to login', function () {
    get(route('dashboard.index'))
        ->assertRedirect(route('login'));
});
