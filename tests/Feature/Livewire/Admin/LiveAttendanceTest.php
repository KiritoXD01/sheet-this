<?php

declare(strict_types=1);

use App\Enums\UserRoleEnum;
use App\Livewire\Admin\LiveAttendance;
use App\Models\Company;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Livewire;

use function Pest\Laravel\actingAs;

beforeEach(function () {
    $this->user = User::factory()->create(['role' => UserRoleEnum::ADMIN]);
    $this->company = Company::factory()->create(['owner_id' => $this->user->id]);
});

it('renders live attendance component successfully', function () {
    $employee = Employee::factory()->create(['company_id' => $this->company->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->assertSuccessful()
        ->assertSee('Live Attendance')
        ->assertSee($employee->user->name);
});

it('only shows employees from the authenticated users company', function () {
    $otherCompany = Company::factory()->create();

    $employee1 = Employee::factory()->create(['company_id' => $this->company->id]);
    $employee2 = Employee::factory()->create(['company_id' => $otherCompany->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->assertSee($employee1->user->name)
        ->assertDontSee($employee2->user->name);
});

it('can search employees by user name', function () {
    $employee1 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => User::factory()->create(['name' => 'John Doe'])->id,
    ]);
    $employee2 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => User::factory()->create(['name' => 'Jane Smith'])->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'John')
        ->assertSee('John Doe')
        ->assertDontSee('Jane Smith');
});

it('can search employees by email', function () {
    $employee1 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => User::factory()->create(['name' => 'John Doe', 'email' => 'john@example.com'])->id,
    ]);
    $employee2 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => User::factory()->create(['name' => 'Jane Smith', 'email' => 'jane@example.com'])->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'john@example.com')
        ->assertSee('John Doe')
        ->assertDontSee('Jane Smith');
});

it('can search employees by job role', function () {
    $jobRole1 = JobRole::factory()->create(['company_id' => $this->company->id, 'name' => 'Software Engineer']);
    $jobRole2 = JobRole::factory()->create(['company_id' => $this->company->id, 'name' => 'Product Manager']);

    $employee1 = Employee::factory()->create(['company_id' => $this->company->id, 'job_role_id' => $jobRole1->id]);
    $employee2 = Employee::factory()->create(['company_id' => $this->company->id, 'job_role_id' => $jobRole2->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'Engineer')
        ->assertSee('Software Engineer')
        ->assertDontSee('Product Manager');
});

it('can search employees by department name', function () {
    $dept1 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Engineering Department']);
    $dept2 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Marketing Department']);

    $employee1 = Employee::factory()->create(['company_id' => $this->company->id, 'department_id' => $dept1->id]);
    $employee2 = Employee::factory()->create(['company_id' => $this->company->id, 'department_id' => $dept2->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'Engineering')
        ->assertSee($employee1->user->name)
        ->assertDontSee($employee2->user->name);
});

it('can search employees by employee code', function () {
    $employee1 = Employee::factory()->create(['company_id' => $this->company->id, 'employee_code' => 'EMP001']);
    $employee2 = Employee::factory()->create(['company_id' => $this->company->id, 'employee_code' => 'EMP002']);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'EMP001')
        ->assertSee('EMP001')
        ->assertDontSee('EMP002');
});

it('can filter employees by department', function () {
    $dept1 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Engineering']);
    $dept2 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Marketing']);

    $employee1 = Employee::factory()->create(['company_id' => $this->company->id, 'department_id' => $dept1->id]);
    $employee2 = Employee::factory()->create(['company_id' => $this->company->id, 'department_id' => $dept2->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('departmentFilter', $dept1->id)
        ->assertSee($employee1->user->name)
        ->assertDontSee($employee2->user->name);
});

it('can combine search and department filter', function () {
    $dept1 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Sales Department']);
    $dept2 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Tech Department']);

    $employee1 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => $dept1->id,
        'user_id' => User::factory()->create(['name' => 'John Doe', 'email' => 'john.doe@test.com'])->id,
    ]);
    $employee2 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => $dept1->id,
        'user_id' => User::factory()->create(['name' => 'Jane Smith', 'email' => 'jane.smith@test.com'])->id,
    ]);
    $employee3 = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => $dept2->id,
        'user_id' => User::factory()->create(['name' => 'John Smith', 'email' => 'john.smith@test.com'])->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'john.doe@test.com')
        ->set('departmentFilter', $dept1->id)
        ->assertSee('john.doe@test.com')
        ->assertDontSee('jane.smith@test.com')
        ->assertDontSee('john.smith@test.com');
});

it('can clear all filters', function () {
    $dept = Department::factory()->create(['company_id' => $this->company->id]);
    Employee::factory()->count(3)->create(['company_id' => $this->company->id]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'test')
        ->set('departmentFilter', $dept->id)
        ->assertSet('search', 'test')
        ->assertSet('departmentFilter', $dept->id)
        ->call('clearFilters')
        ->assertSet('search', '')
        ->assertSet('departmentFilter', null);
});

it('resets pagination when search is updated', function () {
    Employee::factory()->count(20)->create(['company_id' => $this->company->id]);

    $component = Livewire::actingAs($this->user)
        ->test(LiveAttendance::class);

    $component->call('setPage', 2);

    expect($component->get('employees')->currentPage())->toBe(2);

    $component->set('search', 'test');

    expect($component->get('employees')->currentPage())->toBe(1);
});

it('resets pagination when department filter is updated', function () {
    $dept = Department::factory()->create(['company_id' => $this->company->id]);
    Employee::factory()->count(20)->create(['company_id' => $this->company->id, 'department_id' => $dept->id]);

    $component = Livewire::actingAs($this->user)
        ->test(LiveAttendance::class);

    $component->call('setPage', 2);

    expect($component->get('employees')->currentPage())->toBe(2);

    $component->set('departmentFilter', $dept->id);

    expect($component->get('employees')->currentPage())->toBe(1);
});

it('persists filters in query string', function () {
    $dept = Department::factory()->create(['company_id' => $this->company->id]);

    $component = Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'john')
        ->set('departmentFilter', $dept->id);

    expect($component->get('search'))->toBe('john');
    expect($component->get('departmentFilter'))->toBe($dept->id);
});

it('prevents n+1 queries when loading employees', function () {
    Employee::factory()->count(10)->create(['company_id' => $this->company->id]);

    DB::enableQueryLog();

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class);

    $queries = DB::getQueryLog();

    expect(count($queries))->toBeLessThan(20);

    DB::disableQueryLog();
});

it('only loads departments from the authenticated users company', function () {
    $otherCompany = Company::factory()->create();

    $dept1 = Department::factory()->create(['company_id' => $this->company->id, 'name' => 'Engineering']);
    $dept2 = Department::factory()->create(['company_id' => $otherCompany->id, 'name' => 'Marketing']);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->assertSee('Engineering')
        ->assertDontSee('Marketing');
});

it('shows empty state when no employees match filters', function () {
    Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => User::factory()->create(['name' => 'John Doe'])->id,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->set('search', 'nonexistent')
        ->assertSee('No employees found matching your filters');
});

it('paginates employees at 8 per page', function () {
    Employee::factory()->count(10)->create(['company_id' => $this->company->id]);

    $component = Livewire::actingAs($this->user)
        ->test(LiveAttendance::class);

    expect($component->get('employees')->count())->toBe(8);
});

it('handles null department gracefully', function () {
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'department_id' => null,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->assertSee($employee->user->name)
        ->assertSee('-');
});

it('handles null job role gracefully', function () {
    $employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'job_role_id' => null,
    ]);

    Livewire::actingAs($this->user)
        ->test(LiveAttendance::class)
        ->assertSee($employee->user->name)
        ->assertSee('No Role');
});
