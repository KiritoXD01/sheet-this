<?php

declare(strict_types=1);

use App\Enums\TimesheetStatusEnum;
use App\Enums\UserRoleEnum;
use App\Livewire\Employee\Timesheet\Create;
use App\Models\Company;
use App\Models\Employee;
use App\Models\Project;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create(['role' => UserRoleEnum::EMPLOYEE]);
    $this->company = Company::factory()->create();
    $this->employee = Employee::factory()->create([
        'company_id' => $this->company->id,
        'user_id' => $this->user->id,
    ]);
    $this->project = Project::factory()->create(['company_id' => $this->company->id]);
});

it('renders timesheet create component successfully', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->assertSuccessful();
});

it('initializes with one empty timesheet item', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class);

    expect($component->get('items'))->toHaveCount(1);
});

it('can add a new timesheet item', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->call('addItem');

    expect($component->get('items'))->toHaveCount(2);
});

it('can remove a timesheet item', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->call('addItem')
        ->call('removeItem', 1);

    expect($component->get('items'))->toHaveCount(1);
});

it('saves timesheet as draft successfully', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('items.0.is_billable', true)
        ->call('saveDraft')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('timesheets', [
        'employee_id' => $this->employee->id,
        'status' => TimesheetStatusEnum::DRAFT->value,
    ]);

    $this->assertDatabaseHas('timesheet_items', [
        'project_id' => $this->project->id,
        'is_billable' => true,
    ]);
});

it('saves timesheet with notes', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('notes', 'Test notes')
        ->call('saveDraft')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('timesheets', [
        'employee_id' => $this->employee->id,
        'notes' => 'Test notes',
    ]);
});

it('submits timesheet successfully', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->call('submit')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('timesheets', [
        'employee_id' => $this->employee->id,
        'status' => TimesheetStatusEnum::SUBMITTED->value,
    ]);
});

it('validates required project_id', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->call('saveDraft')
        ->assertHasErrors(['items.0.project_id']);
});

it('validates end time is after start time', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.start_time', '17:00')
        ->set('items.0.end_time', '09:00')
        ->call('saveDraft')
        ->assertHasErrors(['items.0.end_time']);
});

it('resets form after saving', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('notes', 'Some notes')
        ->call('saveDraft');

    expect($component->get('notes'))->toBeNull();
    expect($component->get('items'))->toHaveCount(1);
});

it('can toggle is_billable for each item', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.is_billable', true);

    expect($component->get('items.0.is_billable'))->toBeTrue();

    $component->set('items.0.is_billable', false);

    expect($component->get('items.0.is_billable'))->toBeFalse();
});
