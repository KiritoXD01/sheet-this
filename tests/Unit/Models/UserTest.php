<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Models\Company;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

it('can be created with factory', function () {
    $user = User::factory()->create();

    expect($user)->toBeInstanceOf(User::class)
        ->id->toBeInt()
        ->name->not->toBeEmpty()
        ->email->not->toBeEmpty()
        ->role->toBeInstanceOf(UserRoleEnum::class);
});

it('hashes password automatically', function () {
    $user = User::factory()->create(['password' => 'secret123']);

    expect(Hash::check('secret123', $user->password))->toBeTrue();
});

it('has company relationship', function () {
    $user = User::factory()->create();
    $company = Company::factory()->create(['owner_id' => $user->id]);

    $user->refresh();

    expect($user->company)
        ->toBeInstanceOf(Company::class)
        ->id->toBe($company->id);
});

it('has employee relationship', function () {
    $user = User::factory()->create();
    $company = Company::factory()->create();
    $employee = Employee::factory()->create([
        'user_id' => $user->id,
        'company_id' => $company->id,
    ]);

    $user->refresh();

    expect($user->employee)
        ->toBeInstanceOf(Employee::class)
        ->id->toBe($employee->id);
});

it('casts role to enum', function () {
    $user = User::factory()->create(['role' => UserRoleEnum::ADMIN]);

    expect($user->role)->toBe(UserRoleEnum::ADMIN);
});

it('casts timestamps correctly', function () {
    $user = User::factory()->create([
        'email_verified_at' => now(),
        'terms_agreed_at' => now(),
    ]);

    expect($user->email_verified_at)->toBeInstanceOf(Illuminate\Support\Carbon::class);
    expect($user->terms_agreed_at)->toBeInstanceOf(Illuminate\Support\Carbon::class);
});

it('can have admin role', function () {
    $user = User::factory()->create(['role' => UserRoleEnum::ADMIN]);

    expect($user->role)->toBe(UserRoleEnum::ADMIN);
});

it('can have employee role', function () {
    $user = User::factory()->create(['role' => UserRoleEnum::EMPLOYEE]);

    expect($user->role)->toBe(UserRoleEnum::EMPLOYEE);
});
