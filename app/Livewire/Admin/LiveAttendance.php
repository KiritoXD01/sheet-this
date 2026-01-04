<?php

declare(strict_types=1);

namespace App\Livewire\Admin;

use App\Models\Department;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

final class LiveAttendance extends Component
{
    use WithPagination;

    public string $search = '';

    public ?int $departmentFilter = null;

    protected $queryString = [
        'search' => ['except' => ''],
        'departmentFilter' => ['except' => null, 'as' => 'department'],
    ];

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedDepartmentFilter(): void
    {
        $this->resetPage();
    }

    public function clearFilters(): void
    {
        $this->reset(['search', 'departmentFilter']);
        $this->resetPage();
    }

    public function getEmployeesProperty(): LengthAwarePaginator
    {
        return $this->buildEmployeeQuery()
            ->paginate(perPage: 5);
    }

    public function render(#[CurrentUser] User $user): View
    {
        $departments = Department::query()
            ->where('company_id', $user->company->id)
            ->select('id', 'name')
            ->orderBy('name')
            ->get();

        $employees = $this->getEmployeesProperty();

        return view('livewire.admin.live-attendance', [
            'employees' => $employees,
            'departments' => $departments,
        ]);
    }

    private function buildEmployeeQuery(): Builder
    {
        /** @var User */
        $user = Auth::user();

        return Employee::query()
            ->with(['user', 'department', 'jobRole'])
            ->where('company_id', $user->company->id)
            ->when($this->search, function (Builder $query) {
                $query->where(function (Builder $q) {
                    $q->whereHas('user', function (Builder $userQuery) {
                        $userQuery->whereAny(['name', 'email'], 'like', "%{$this->search}%");
                    })
                        ->orWhereHas('jobRole', function (Builder $jobRoleQuery) {
                            $jobRoleQuery->where('name', 'like', "%{$this->search}%");
                        })
                        ->orWhereHas('department', function (Builder $deptQuery) {
                            $deptQuery->where('name', 'like', "%{$this->search}%");
                        })
                        ->orWhere('employee_code', 'like', "%{$this->search}%");
                });
            })
            ->when($this->departmentFilter, function (Builder $query) {
                $query->where('department_id', $this->departmentFilter);
            })
            ->latest('created_at');
    }
}
