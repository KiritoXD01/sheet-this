<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\JobRole;

it('belongs to company', function () {
    $company = Company::factory()->create();
    $jobRole = JobRole::factory()->create(['company_id' => $company->id]);

    expect($jobRole->company)
        ->toBeInstanceOf(Company::class)
        ->id->toBe($company->id);
});

it('can be created with name and company', function () {
    $company = Company::factory()->create();
    $jobRole = JobRole::create([
        'name' => 'Senior Developer',
        'company_id' => $company->id,
    ]);

    expect($jobRole)
        ->name->toBe('Senior Developer')
        ->company_id->toBe($company->id);
});
