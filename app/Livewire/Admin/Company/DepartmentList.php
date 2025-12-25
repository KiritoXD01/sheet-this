<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Enums\ModalModeEnum;
use App\Models\Company;
use App\Models\Department;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use WireUi\Traits\WireUiActions;

final class DepartmentList extends Component
{
    use WireUiActions;

    public Collection $departments;

    public ModalModeEnum $mode = ModalModeEnum::CREATE;

    public string $modalTitle = 'Create Department';

    public ?Department $department = null;

    public string $departmentName = '';

    public function mount(): void
    {
        /** @var Company */
        $company = Auth::user()->company;

        $this->departments = Department::query()
            ->where('company_id', $company->id)
            ->take(5)
            ->get();
    }

    public function openCreateModal(): void
    {
        $this->mode = ModalModeEnum::CREATE;
        $this->modalTitle = 'Create Department';
        $this->js('$openModal("cardModal")');
    }

    public function openEditModal(int $id): void
    {
        $this->department = $this->departments->where('id', $id)->first();
        $this->mode = ModalModeEnum::EDIT;
        $this->modalTitle = 'Edit Department';
        $this->departmentName = $this->department->name;
        $this->js('$openModal("cardModal")');
    }

    public function submit(): void
    {
        $this->validate([
            'departmentName' => [
                'required',
                'string',
                'max:255',
                Rule::unique('departments', 'name')
                    ->when($this->mode === ModalModeEnum::EDIT, fn ($rule) => $rule->ignore($this->department->id))
                    ->where('company_id', Auth::user()->company->id),
            ],
        ]);

        if ($this->mode === ModalModeEnum::CREATE) {
            /** @var Company */
            $company = Auth::user()->company;

            Department::create([
                'name' => $this->departmentName,
                'company_id' => $company->id,
            ]);

        } else {
            $this->department->update([
                'name' => $this->departmentName,
            ]);
        }

        $this->notification()->send([
            'icon' => 'success',
            'title' => $this->mode === ModalModeEnum::CREATE ? 'Department Created' : 'Department Updated',
            'description' => $this->mode === ModalModeEnum::CREATE
                ? 'Department has been created successfully.'
                : 'Department has been updated successfully.',
        ]);

        $this->close();
    }

    public function close(): void
    {
        $this->departmentName = '';
        $this->department = null;
        $this->mode = ModalModeEnum::CREATE;
        $this->js('$closeModal("cardModal")');
    }

    public function render()
    {
        return view('livewire.admin.company.department-list');
    }
}
