<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Enums\ModalModeEnum;
use App\Models\Company;
use App\Models\JobRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

final class JobRoleList extends Component
{
    use WireUiActions;
    use WithPagination;

    public ModalModeEnum $mode = ModalModeEnum::CREATE;

    public string $modalTitle = 'Create Job Role';

    public ?JobRole $jobRole = null;

    public string $jobRoleName = '';

    protected $paginationTheme = 'tailwind';

    public function openCreateModal(): void
    {
        $this->mode = ModalModeEnum::CREATE;
        $this->modalTitle = 'Create Job Role';
        $this->js('$openModal("cardModal")');
    }

    public function openEditModal(int $id): void
    {
        $this->jobRole = JobRole::findOrFail($id);
        $this->mode = ModalModeEnum::EDIT;
        $this->modalTitle = 'Edit Job Role';
        $this->jobRoleName = $this->jobRole->name;
        $this->js('$openModal("cardModal")');
    }

    public function submit(): void
    {
        $this->validate([
            'jobRoleName' => [
                'required',
                'string',
                'max:255',
                Rule::unique('job_roles', 'name')
                    ->when($this->mode === ModalModeEnum::EDIT, fn ($rule) => $rule->ignore($this->jobRole->id))
                    ->where('company_id', Auth::user()->company->id),
            ],
        ]);

        if ($this->mode === ModalModeEnum::CREATE) {
            /** @var Company */
            $company = Auth::user()->company;

            JobRole::create([
                'name' => $this->jobRoleName,
                'company_id' => $company->id,
            ]);

        } else {
            $this->jobRole->update([
                'name' => $this->jobRoleName,
            ]);
        }

        $this->notification()->send([
            'icon' => 'success',
            'title' => $this->mode === ModalModeEnum::CREATE ? 'Job Role Created' : 'Job Role Updated',
            'description' => $this->mode === ModalModeEnum::CREATE
                ? 'Job role has been created successfully.'
                : 'Job role has been updated successfully.',
        ]);

        $this->close();
    }

    public function close(): void
    {
        $this->jobRoleName = '';
        $this->jobRole = null;
        $this->mode = ModalModeEnum::CREATE;
        $this->js('$closeModal("cardModal")');
    }

    public function render()
    {
        /** @var Company */
        $company = Auth::user()->company;

        $jobRoles = JobRole::query()
            ->where('company_id', $company->id)
            ->paginate(5);

        return view('livewire.admin.company.job-role-list', [
            'jobRoles' => $jobRoles,
        ]);
    }
}
