<?php

declare(strict_types=1);

use App\Models\Company;
use App\Models\Employee;
use App\Models\Request;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('retrieves all requests from company employees', function () {
    $company = Company::factory()->create();
    $employee1 = Employee::factory()->create(['company_id' => $company->id]);
    $employee2 = Employee::factory()->create(['company_id' => $company->id]);

    $request1 = Request::factory()->create(['employee_id' => $employee1->id]);
    $request2 = Request::factory()->create(['employee_id' => $employee2->id]);
    $request3 = Request::factory()->create(['employee_id' => $employee1->id]);

    $requests = $company->requests;

    expect($requests)->toHaveCount(3)
        ->and($requests->pluck('id')->toArray())->toContain($request1->id, $request2->id, $request3->id);
});

it('does not include requests from employees of other companies', function () {
    $company1 = Company::factory()->create();
    $company2 = Company::factory()->create();

    $employee1 = Employee::factory()->create(['company_id' => $company1->id]);
    $employee2 = Employee::factory()->create(['company_id' => $company2->id]);

    $request1 = Request::factory()->create(['employee_id' => $employee1->id]);
    $request2 = Request::factory()->create(['employee_id' => $employee2->id]);

    $requests = $company1->requests;

    expect($requests)->toHaveCount(1)
        ->and($requests->first()->id)->toBe($request1->id)
        ->and($requests->pluck('id')->toArray())->not->toContain($request2->id);
});

it('returns empty collection when company has no employees', function () {
    $company = Company::factory()->create();

    $requests = $company->requests;

    expect($requests)->toBeEmpty();
});

it('returns empty collection when employees have no requests', function () {
    $company = Company::factory()->create();
    Employee::factory()->create(['company_id' => $company->id]);
    Employee::factory()->create(['company_id' => $company->id]);

    $requests = $company->requests;

    expect($requests)->toBeEmpty();
});

it('can eager load requests', function () {
    $company = Company::factory()->create();
    $employee = Employee::factory()->create(['company_id' => $company->id]);
    Request::factory()->create(['employee_id' => $employee->id]);

    $loadedCompany = Company::with('requests')->find($company->id);

    expect($loadedCompany->relationLoaded('requests'))->toBeTrue()
        ->and($loadedCompany->requests)->toHaveCount(1);
});

it('can filter requests through relationship', function () {
    $company = Company::factory()->create();
    $employee = Employee::factory()->create(['company_id' => $company->id]);

    $pendingRequest = Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => App\Enums\RequestStatusEnum::PENDING,
    ]);

    $approvedRequest = Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => App\Enums\RequestStatusEnum::APPROVED,
    ]);

    $pendingRequests = $company->requests()->where('status', App\Enums\RequestStatusEnum::PENDING)->get();

    expect($pendingRequests)->toHaveCount(1)
        ->and($pendingRequests->first()->id)->toBe($pendingRequest->id);
});
