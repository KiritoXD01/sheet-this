<?php

declare(strict_types=1);

use App\Enums\RequestStatusEnum;
use App\Enums\RequestTypeEnum;
use App\Enums\UserRoleEnum;
use App\Livewire\Admin\RecentRequests;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create(['role' => UserRoleEnum::ADMIN]);
    $this->company = Company::factory()->create(['owner_id' => $this->user->id]);
});

it('renders recent requests component successfully', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);
    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSuccessful();
});

it('only shows pending requests', function () {
    $employee1 = Employee::factory()->create(['company_id' => $this->company->id]);
    $employee2 = Employee::factory()->create(['company_id' => $this->company->id]);

    $pendingRequest = Request::factory()->create([
        'employee_id' => $employee1->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    $approvedRequest = Request::factory()->create([
        'employee_id' => $employee2->id,
        'status' => RequestStatusEnum::APPROVED,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee($employee1->user->name)
        ->assertDontSee($employee2->user->name);
});

it('only shows requests from authenticated users company', function () {
    $otherCompany = Company::factory()->create();

    $employee1 = Employee::factory()->create(['company_id' => $this->company->id]);
    $employee2 = Employee::factory()->create(['company_id' => $otherCompany->id]);

    $request1 = Request::factory()->create([
        'employee_id' => $employee1->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    $request2 = Request::factory()->create([
        'employee_id' => $employee2->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee($employee1->user->name)
        ->assertDontSee($employee2->user->name);
});

it('limits requests to maximum of 5', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Request::factory()->count(10)->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    $component = Livewire::actingAs($this->user)
        ->test(RecentRequests::class);

    $requests = $component->viewData('requests');
    $requestsCount = $component->viewData('requestsCount');

    expect($requests)->toHaveCount(5);
    expect($requestsCount)->toBe(5);
});

it('displays employee initials correctly', function () {
    $user = User::factory()->create(['name' => 'John Doe']);
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => $user->id,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('JD');
});

it('displays employee name correctly', function () {
    $user = User::factory()->create(['name' => 'Jane Smith']);
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => $user->id,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('Jane Smith');
});

it('displays department name correctly', function () {
    $department = Department::factory()->create([
        'company_id' => $this->company->id,
        'name' => 'Engineering',
    ]);

    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => $department->id,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('Engineering');
});

it('handles null department gracefully', function () {
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => null,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('No Department');
});

it('displays request type using label method', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'request_type' => RequestTypeEnum::VACATIONS,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('Vacation Request');
});

it('displays sick leave request type correctly', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'request_type' => RequestTypeEnum::SICK_LEAVE,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('Sick Leave');
});

it('displays date range with correct day calculation', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    $startDate = now()->addDays(5);
    $endDate = now()->addDays(8);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'start_date' => $startDate,
        'end_date' => $endDate,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee($startDate->format('M d'))
        ->assertSee($endDate->format('M d'))
        ->assertSee('4 Days');
});

it('displays single day request correctly', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    $date = now()->addDays(5);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'start_date' => $date,
        'end_date' => $date,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('1 Day');
});

it('orders requests by latest first', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    $oldRequest = Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'created_at' => now()->subDays(5),
    ]);

    $newRequest = Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
        'created_at' => now()->subHours(1),
    ]);

    $component = Livewire::actingAs($this->user)
        ->test(RecentRequests::class);

    $requests = $component->viewData('requests');
    expect($requests->first()->id)->toBe($newRequest->id);
});

it('displays correct request count badge', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Request::factory()->count(3)->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('3 New');
});

it('handles empty state when no pending requests exist', function () {
    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSuccessful();
});

it('prevents n+1 queries when loading requests', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Request::factory()->count(5)->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    DB::enableQueryLog();

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class);

    $queries = DB::getQueryLog();

    expect(count($queries))->toBeLessThan(10);

    DB::disableQueryLog();
});

it('displays initials correctly for single word name', function () {
    $user = User::factory()->create(['name' => 'John']);
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => $user->id,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('JO');
});

it('displays initials correctly for multi-word name', function () {
    $user = User::factory()->create(['name' => 'Mary Jane Watson']);
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => $user->id,
    ]);

    Request::factory()->create([
        'employee_id' => $employee->id,
        'status' => RequestStatusEnum::PENDING,
    ]);

    Livewire::actingAs($this->user)
        ->test(RecentRequests::class)
        ->assertSee('MJ');
});
