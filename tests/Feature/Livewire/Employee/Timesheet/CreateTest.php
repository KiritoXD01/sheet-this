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
        'description' => null,
    ]);
});

it('stores empty description as null when saving draft', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.description', '   ')
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->call('saveDraft')
        ->assertHasNoErrors();

    $this->assertDatabaseHas('timesheet_items', [
        'project_id' => $this->project->id,
        'description' => null,
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

it('preserves form data after saving', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('notes', 'Some notes')
        ->call('saveDraft');

    expect($component->get('notes'))->toBe('Some notes');
    expect($component->get('items'))->toHaveCount(1);
    expect($component->get('currentTimesheet'))->not->toBeNull();
});

it('can toggle is_billable for each item', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.is_billable', true);

    expect($component->get('items.0.is_billable'))->toBeTrue();

    $component->set('items.0.is_billable', false);

    expect($component->get('items.0.is_billable'))->toBeFalse();
});

it('initializes with current week dates', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class);

    $weekStart = now()->startOfWeek(Carbon\Carbon::MONDAY);
    $weekEnd = $weekStart->copy()->endOfWeek(Carbon\Carbon::SUNDAY);

    expect($component->get('weekStart')->format('Y-m-d'))->toBe($weekStart->format('Y-m-d'));
    expect($component->get('weekEnd')->format('Y-m-d'))->toBe($weekEnd->format('Y-m-d'));
});

it('can navigate to previous week', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class);

    $originalWeekStart = $component->get('weekStart')->copy();

    $component->call('previousWeek');

    expect($component->get('weekStart')->format('Y-m-d'))
        ->toBe($originalWeekStart->subWeek()->format('Y-m-d'));
});

it('can navigate to next week', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class);

    $originalWeekStart = $component->get('weekStart')->copy();

    $component->call('nextWeek');

    expect($component->get('weekStart')->format('Y-m-d'))
        ->toBe($originalWeekStart->addWeek()->format('Y-m-d'));
});

it('calculates billable hours correctly', function () {
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('items.0.is_billable', true)
        ->call('addItem')
        ->set('items.1.start_time', '09:00')
        ->set('items.1.end_time', '13:00')
        ->set('items.1.is_billable', false)
        ->assertSee('8.0h')
        ->assertSee('4.0h');
});

it('clears all items when clearAll is called', function () {
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.description', 'Test description')
        ->set('notes', 'Test notes')
        ->call('addItem')
        ->call('clearAll');

    expect($component->get('items'))->toHaveCount(1);
    expect($component->get('notes'))->toBeNull();
    expect($component->get('items.0.description'))->toBeNull();
});

it('loads existing timesheet when navigating to a week with saved data', function () {
    // First, create a timesheet for the current week
    Livewire::actingAs($this->user)
        ->test(Create::class)
        ->set('items.0.project_id', $this->project->id)
        ->set('items.0.item_date', now()->format('Y-m-d'))
        ->set('items.0.start_time', '09:00')
        ->set('items.0.end_time', '17:00')
        ->set('notes', 'Existing timesheet notes')
        ->call('saveDraft');

    // Navigate away and back
    $component = Livewire::actingAs($this->user)
        ->test(Create::class)
        ->call('previousWeek')
        ->call('nextWeek');

    expect($component->get('notes'))->toBe('Existing timesheet notes');
    expect($component->get('currentTimesheet'))->not->toBeNull();
});
