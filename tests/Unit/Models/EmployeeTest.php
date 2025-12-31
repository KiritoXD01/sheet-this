<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;

it('belongs to user', function () {
    $user = User::factory()->create();
    $employee = Employee::factory()->create(['user_id' => $user->id]);

    expect($employee->user)
        ->toBeInstanceOf(User::class)
        ->id->toBe($user->id);
});

it('belongs to company', function () {
    $company = Company::factory()->create();
    $employee = Employee::factory()->create(['company_id' => $company->id]);

    expect($employee->company)
        ->toBeInstanceOf(Company::class)
        ->id->toBe($company->id);
});

it('can have department relationship', function () {
    $company = Company::factory()->create();
    $department = Department::factory()->create(['company_id' => $company->id]);
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
        'department_id' => $department->id,
    ]);

    expect($employee->department)
        ->toBeInstanceOf(Department::class)
        ->id->toBe($department->id);
});

it('can have job role relationship', function () {
    $company = Company::factory()->create();
    $jobRole = JobRole::factory()->create(['company_id' => $company->id]);
    $employee = Employee::factory()->create([
        'company_id' => $company->id,
        'job_role_id' => $jobRole->id,
    ]);

    expect($employee->jobRole)
        ->toBeInstanceOf(JobRole::class)
        ->id->toBe($jobRole->id);
});
