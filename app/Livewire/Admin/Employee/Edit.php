<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Employee;

use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class Edit extends Component
{
    use WireUiActions;

    public Employee $employee;

    #[Validate(['required', 'string', 'max:100'])]
    public string $name = '';

    #[Validate(['required', 'email'])]
    public string $email = '';

    #[Validate(['required', 'exists:departments,id'])]
    public ?int $department_id = null;

    #[Validate(['required', 'exists:job_roles,id'])]
    public ?int $job_role_id = null;

    #[Validate(['required', 'string', 'max:100'])]
    public string $employee_code = '';

    public array $jobRoles = [];

    public array $departments = [];

    public function mount(Employee $employee): void
    {
        $this->employee = $employee->load('user', 'department', 'jobRole');

        $this->name = $this->employee->user->name;
        $this->email = $this->employee->user->email;
        $this->employee_code = $this->employee->employee_code;
        $this->department_id = $this->employee->department_id;
        $this->job_role_id = $this->employee->job_role_id;

        $this->jobRoles = JobRole::query()
            ->where('company_id', $this->employee->company_id)
            ->select('id', 'name')
            ->get()
            ->toArray();

        $this->departments = Department::query()
            ->where('company_id', $this->employee->company_id)
            ->select('id', 'name')
            ->get()
            ->toArray();
    }

    public function submit(): void
    {
        $this->validate();

        $this->employee->user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->employee->update([
            'job_role_id' => $this->job_role_id,
            'department_id' => $this->department_id,
            'employee_code' => $this->employee_code,
        ]);

        Session::flash('employee-updated', "Employee {$this->name} has been updated successfully");

        $this->redirect(route('admin.employees.show', $this->employee->id));
    }

    public function render()
    {
        return view('livewire.admin.employee.edit');
    }
}
