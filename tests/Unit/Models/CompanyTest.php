<?php

declare(strict_types=1);

use App\Enums\IndustryEnum;
use App\Models\Company;
use App\Models\CompanyPolicy;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;

it('belongs to owner user', function () {
    $user = User::factory()->create();
    $company = Company::factory()->create(['owner_id' => $user->id]);

    expect($company->owner)
        ->toBeInstanceOf(User::class)
        ->id->toBe($user->id);
});

it('has many departments', function () {
    $company = Company::factory()->create();
    Department::factory()->count(3)->create(['company_id' => $company->id]);

    expect($company->departments)
        ->toHaveCount(3)
        ->each->toBeInstanceOf(Department::class);
});

it('has many job roles', function () {
    $company = Company::factory()->create();
    JobRole::factory()->count(5)->create(['company_id' => $company->id]);

    expect($company->jobRoles)
        ->toHaveCount(5)
        ->each->toBeInstanceOf(JobRole::class);
});

it('has one policy', function () {
    $company = Company::factory()->create();
    $policy = CompanyPolicy::factory()->create(['company_id' => $company->id]);

    expect($company->policy)
        ->toBeInstanceOf(CompanyPolicy::class)
        ->id->toBe($policy->id);
});

it('has many employees', function () {
    $company = Company::factory()->create();
    Employee::factory()->count(10)->create(['company_id' => $company->id]);

    expect($company->employees)
        ->toHaveCount(10)
        ->each->toBeInstanceOf(Employee::class);
});

it('casts industry to enum', function () {
    $company = Company::factory()->create(['industry' => IndustryEnum::TECHNOLOGY]);

    expect($company->industry)->toBe(IndustryEnum::TECHNOLOGY);
});
