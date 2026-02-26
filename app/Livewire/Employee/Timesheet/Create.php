<?php

declare(strict_types=1);

namespace App\Livewire\Employee\Timesheet;

use App\Enums\TimesheetStatusEnum;
use App\Models\Project;
use App\Models\Timesheet;
use App\Models\TimesheetItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class Create extends Component
{
    use WireUiActions;

    public Carbon $weekStart;

    public Carbon $weekEnd;

    public ?Timesheet $currentTimesheet = null;

    #[Validate('nullable', 'string', 'max:1000')]
    public ?string $notes = null;

    public array $items = [];

    public function mount(): void
    {
        $this->setCurrentWeek();
        $this->loadExistingTimesheet();
    }

    public function setCurrentWeek(): void
    {
        $this->weekStart = now()->startOfWeek(Carbon::MONDAY);
        $this->weekEnd = $this->weekStart->copy()->endOfWeek(Carbon::SUNDAY);
    }

    public function previousWeek(): void
    {
        $this->weekStart = $this->weekStart->subWeek();
        $this->weekEnd = $this->weekEnd->subWeek();
        $this->loadExistingTimesheet();
    }

    public function nextWeek(): void
    {
        $this->weekStart = $this->weekStart->addWeek();
        $this->weekEnd = $this->weekEnd->addWeek();
        $this->loadExistingTimesheet();
    }

    public function loadExistingTimesheet(): void
    {
        /** @var User */
        $user = Auth::user();

        $this->currentTimesheet = Timesheet::query()
            ->where('employee_id', $user->employee->id)
            ->whereHas('items', function ($query) {
                $query->whereBetween('item_date', [
                    $this->weekStart->format('Y-m-d'),
                    $this->weekEnd->format('Y-m-d'),
                ]);
            })
            ->with('items')
            ->first();

        if ($this->currentTimesheet) {
            $this->notes = $this->currentTimesheet->notes;
            $this->items = $this->currentTimesheet->items->map(fn (TimesheetItem $item) => [
                'item_date' => $item->item_date->format('Y-m-d'),
                'project_id' => $item->project_id,
                'description' => $item->description,
                'start_time' => $item->start_time instanceof Carbon
                    ? $item->start_time->format('H:i')
                    : $item->start_time,
                'end_time' => $item->end_time instanceof Carbon
                    ? $item->end_time->format('H:i')
                    : $item->end_time,
                'is_billable' => $item->is_billable,
            ])->toArray();
        } else {
            $this->reset(['notes', 'items']);
            $this->addItem();
        }
    }

    #[Computed]
    public function billableHours(): float
    {
        return collect($this->items)
            ->filter(fn (array $item) => $item['is_billable'] ?? false)
            ->sum(fn (array $item) => $this->calculateHours(
                $item['start_time'] ?? '00:00',
                $item['end_time'] ?? '00:00'
            ));
    }

    #[Computed]
    public function nonBillableHours(): float
    {
        return collect($this->items)
            ->filter(fn (array $item) => ! ($item['is_billable'] ?? false))
            ->sum(fn (array $item) => $this->calculateHours(
                $item['start_time'] ?? '00:00',
                $item['end_time'] ?? '00:00'
            ));
    }

    #[Computed]
    public function billablePercentage(): int
    {
        $total = $this->billableHours + $this->nonBillableHours;

        return $total > 0 ? (int) round(($this->billableHours / $total) * 100) : 0;
    }

    #[Computed]
    public function recentTimesheets(): Collection
    {
        /** @var User */
        $user = Auth::user();

        return Timesheet::query()
            ->where('employee_id', $user->employee->id)
            ->whereIn('status', [TimesheetStatusEnum::APPROVED, TimesheetStatusEnum::SUBMITTED])
            ->orderByDesc('created_at')
            ->limit(5)
            ->with('items')
            ->get()
            ->map(function (Timesheet $timesheet) {
                $weekStart = $timesheet->items->min('item_date');
                $weekEnd = $timesheet->items->max('item_date');
                $totalHours = $timesheet->items->sum(fn (TimesheetItem $item) => $this->calculateHours(
                    $item->start_time instanceof Carbon ? $item->start_time->format('H:i') : $item->start_time,
                    $item->end_time instanceof Carbon ? $item->end_time->format('H:i') : $item->end_time
                ));

                return [
                    'id' => $timesheet->id,
                    'week_range' => Carbon::parse($weekStart)->format('M d').' - '.Carbon::parse($weekEnd)->format('M d'),
                    'total_hours' => number_format($totalHours, 2),
                    'status' => $timesheet->status,
                ];
            });
    }

    public function render()
    {
        $projects = Project::query()
            ->where('status', 'active')
            ->get()
            ->map(fn (Project $project) => [
                'value' => $project->id,
                'label' => $project->name,
            ])
            ->toArray();

        $totalHours = collect($this->items)->sum(fn (array $item) => $this->calculateHours(
            $item['start_time'] ?? '00:00',
            $item['end_time'] ?? '00:00'
        ));

        return view('livewire.employee.timesheet.create', [
            'projects' => $projects,
            'totalHours' => $totalHours,
        ]);
    }

    public function addItem(): void
    {
        $this->items[] = [
            'item_date' => $this->weekStart->format('Y-m-d'),
            'project_id' => null,
            'description' => null,
            'start_time' => '09:00',
            'end_time' => '17:00',
            'is_billable' => true,
        ];
    }

    public function removeItem(int $index): void
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
    }

    public function clearAll(): void
    {
        $this->reset(['notes', 'items']);
        $this->addItem();
    }

    public function save(string $status = TimesheetStatusEnum::DRAFT->value): void
    {
        $this->validate([
            'items' => 'required|array|min:1',
            'items.*.item_date' => 'required|date',
            'items.*.project_id' => 'required|exists:projects,id',
            'items.*.start_time' => 'required|date_format:H:i',
            'items.*.end_time' => 'required|date_format:H:i|after:items.*.start_time',
            'items.*.description' => 'nullable|string|max:500',
            'items.*.is_billable' => 'boolean',
            'notes' => 'nullable|string|max:1000',
        ]);

        /** @var User */
        $user = Auth::user();

        if ($this->currentTimesheet) {
            $this->currentTimesheet->update([
                'status' => TimesheetStatusEnum::from($status),
                'notes' => $this->notes,
            ]);
            $this->currentTimesheet->items()->delete();
            $timesheet = $this->currentTimesheet;
        } else {
            $timesheet = Timesheet::query()->create([
                'employee_id' => $user->employee->id,
                'status' => TimesheetStatusEnum::from($status),
                'notes' => $this->notes,
            ]);
        }

        foreach ($this->items as $item) {
            $description = isset($item['description']) ? mb_trim((string) $item['description']) : '';

            TimesheetItem::query()->create([
                'timesheet_id' => $timesheet->id,
                'project_id' => $item['project_id'],
                'item_date' => $item['item_date'],
                'description' => $description === '' ? null : $description,
                'start_time' => $item['start_time'],
                'end_time' => $item['end_time'],
                'is_billable' => $item['is_billable'],
            ]);
        }

        $this->notification()->send([
            'icon' => 'success',
            'title' => $status === TimesheetStatusEnum::SUBMITTED->value ? 'Timesheet Submitted' : 'Timesheet Saved',
            'description' => $status === TimesheetStatusEnum::SUBMITTED->value
                ? 'Your timesheet has been submitted for approval.'
                : 'Your timesheet has been saved as draft.',
        ]);

        $this->loadExistingTimesheet();
    }

    public function saveDraft(): void
    {
        $this->save(TimesheetStatusEnum::DRAFT->value);
    }

    public function submit(): void
    {
        $this->save(TimesheetStatusEnum::SUBMITTED->value);
    }

    private function calculateHours(string $startTime, string $endTime): float
    {
        $start = Carbon::parse($startTime);
        $end = Carbon::parse($endTime);

        return round($end->diffInMinutes($start) / 60, 2);
    }
}
