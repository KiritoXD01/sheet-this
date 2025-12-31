<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Employee;

use App\Enums\UserRoleEnum;
use App\Models\Department;
use App\Models\Employee;
use App\Models\JobRole;
use App\Models\User;
use Illuminate\Container\Attributes\CurrentUser;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Validate;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class Create extends Component
{
    use WireUiActions;

    #[Validate(['required', 'string', 'max:100'])]
    public string $name = '';

    #[Validate(['required', 'email', 'unique:users,email'])]
    public string $email = '';

    #[Validate(['required', 'exists:departments,id'])]
    public ?int $department_id = null;

    #[Validate(['required', 'exists:job_roles,id'])]
    public ?int $job_role_id = null;

    #[Validate(['required', 'string', 'max:100', 'unique:employees,employee_code'])]
    public string $employee_code = '';

    #[Validate(['required', 'confirmed'])]
    public string $password = '';

    #[Validate(['required'])]
    public string $password_confirmation = '';

    public array $jobRoles = [];

    public array $departments = [];

    public function mount(#[CurrentUser] User $user): void
    {
        $this->jobRoles = JobRole::query()
            ->where('company_id', $user->company->id)
            ->select('id', 'name')
            ->get()
            ->toArray();

        $this->departments = Department::query()
            ->where('company_id', $user->company->id)
            ->select('id', 'name')
            ->get()
            ->toArray();
    }

    public function submit(#[CurrentUser] User $currentUser): void
    {
        $this->validate();

        $user = User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'role' => UserRoleEnum::EMPLOYEE,
        ]);

        $employee = Employee::query()->create([
            'job_role_id' => $this->job_role_id,
            'department_id' => $this->department_id,
            'employee_code' => $this->employee_code,
            'user_id' => $user->id,
            'company_id' => $currentUser->company->id,
        ]);

        Session::flash('employee-created', 'Employee created successfully');

        $this->redirect(route('admin.employees'));
    }

    public function render()
    {
        return view('livewire.admin.employee.create');
    }
}
