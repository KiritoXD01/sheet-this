<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\CompanyPolicy;

it('belongs to company', function () {
    $company = Company::factory()->create();
    $policy = CompanyPolicy::factory()->create(['company_id' => $company->id]);

    expect($policy->company)
        ->toBeInstanceOf(Company::class)
        ->id->toBe($company->id);
});

it('casts work_week to array', function () {
    $policy = CompanyPolicy::factory()->create([
        'work_week' => ['monday', 'tuesday', 'wednesday'],
    ]);

    expect($policy->work_week)
        ->toBeArray()
        ->toHaveCount(3);
});

it('casts overtime_enabled to boolean', function () {
    $policy = CompanyPolicy::factory()->create(['overtime_enabled' => true]);

    expect($policy->overtime_enabled)->toBeTrue()->toBeBool();
});

it('has valid timezone', function () {
    $policy = CompanyPolicy::factory()->create(['default_time_zone' => 'America/New_York']);

    expect($policy->default_time_zone)->toBe('America/New_York');
});

it('validates standard work day range', function () {
    $policy = CompanyPolicy::factory()->create(['standard_work_day' => 8]);

    expect($policy->standard_work_day)
        ->toBeInt()
        ->toBeGreaterThanOrEqual(1)
        ->toBeLessThanOrEqual(24);
});
