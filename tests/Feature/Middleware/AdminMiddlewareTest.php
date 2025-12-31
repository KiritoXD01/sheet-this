<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

it('allows admin users to access admin routes', function () {
    $admin = User::factory()->create(['role' => UserRoleEnum::ADMIN]);

    actingAs($admin)
        ->get(route('admin.onboarding'))
        ->assertSuccessful();
});

it('redirects employee users to dashboard', function () {
    $employee = User::factory()->create(['role' => UserRoleEnum::EMPLOYEE]);

    actingAs($employee)
        ->get(route('admin.onboarding'))
        ->assertRedirect(route('dashboard.index'));
});

it('redirects unauthenticated users to login', function () {
    get(route('admin.onboarding'))
        ->assertRedirect(route('login'));
});
