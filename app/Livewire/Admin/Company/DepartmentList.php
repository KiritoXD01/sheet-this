<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class DepartmentList extends Component
{
    use WireUiActions;

    public Collection $departments;

    public function mount(): void
    {
        /** @var Company */
        $company = Auth::user()->company;

        $this->departments = Department::query()
            ->where('company_id', $company->id)
            ->take(5)
            ->get();
    }

    public function render()
    {
        return view('livewire.admin.company.department-list');
    }
}
