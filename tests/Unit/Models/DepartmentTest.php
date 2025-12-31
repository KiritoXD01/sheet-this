<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Department;

it('belongs to company', function () {
    $company = Company::factory()->create();
    $department = Department::factory()->create(['company_id' => $company->id]);

    expect($department->company)
        ->toBeInstanceOf(Company::class)
        ->id->toBe($company->id);
});

it('can be created with name and company', function () {
    $company = Company::factory()->create();
    $department = Department::create([
        'name' => 'Engineering',
        'company_id' => $company->id,
    ]);

    expect($department)
        ->name->toBe('Engineering')
        ->company_id->toBe($company->id);
});
