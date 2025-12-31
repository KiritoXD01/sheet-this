<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\User;

use function Pest\Laravel\actingAs;

it('allows admin with company to access protected routes', function () {
    $admin = User::factory()->create(['role' => UserRoleEnum::ADMIN]);
    Company::factory()->create(['owner_id' => $admin->id]);

    actingAs($admin)
        ->get(route('admin.index'))
        ->assertSuccessful();
});

it('redirects admin without company to onboarding', function () {
    $admin = User::factory()->create(['role' => UserRoleEnum::ADMIN]);

    actingAs($admin)
        ->get(route('admin.index'))
        ->assertRedirect(route('admin.onboarding'));
});

it('allows access to onboarding route without company', function () {
    $admin = User::factory()->create(['role' => UserRoleEnum::ADMIN]);

    actingAs($admin)
        ->get(route('admin.onboarding'))
        ->assertSuccessful();
});
