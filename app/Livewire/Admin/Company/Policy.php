<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Models\Company;
use DateTimeZone;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class Policy extends Component
{
    use WireUiActions;

    public array $timezones = [];

    #[Validate(['required', 'timezone'])]
    public ?string $timezone = null;

    #[Validate(['required', 'integer', 'min:1', 'max:24'])]
    public int $standardWorkDay = 8;

    #[Validate(['required', 'array', 'min:1'])]
    public array $workWeek = [];

    #[Validate(['required', 'boolean'])]
    public bool $allowOvertime = false;

    public function mount(): void
    {
        $this->timezones = DateTimeZone::listIdentifiers(DateTimeZone::ALL);

        /** @var Company */
        $company = Auth::user()->company;

        $this->timezone = $company->policy->default_time_zone ?? null;
        $this->standardWorkDay = $company->policy->standard_work_day ?? 8;
        $this->workWeek = $company->policy->work_week ?? [];
        $this->allowOvertime = $company->policy->overtime_enabled ?? false;
    }

    public function toggleWorkDay(string $day): void
    {
        if (in_array($day, $this->workWeek)) {
            $this->workWeek = array_diff($this->workWeek, [$day]);
        } else {
            $this->workWeek[] = $day;
        }
    }

    public function save(): void
    {
        $this->validate();

        /** @var Company */
        $company = Auth::user()->company;

        $company->policy()->updateOrInsert(
            ['company_id' => $company->id],
            [
                'default_time_zone' => $this->timezone,
                'standard_work_day' => $this->standardWorkDay,
                'work_week' => json_encode($this->workWeek),
                'overtime_enabled' => $this->allowOvertime,
            ]
        );

        $this->notification()->send([
            'icon' => 'success',
            'title' => 'Company Policy Updated',
            'description' => 'Your company policy has been updated successfully.',
        ]);
    }

    public function render()
    {
        return view('livewire.admin.company.policy');
    }
}
