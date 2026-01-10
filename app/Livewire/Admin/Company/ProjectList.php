<?php

declare(strict_types=1);

namespace App\Livewire\Admin\Company;

use App\Enums\ModalModeEnum;
use App\Enums\ProjectStatusEnum;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use WireUi\Traits\WireUiActions;

final class ProjectList extends Component
{
    use WireUiActions;
    use WithPagination;

    public ModalModeEnum $mode = ModalModeEnum::CREATE;

    public string $modalTitle = 'Create Project';

    public ?Project $project = null;

    public string $projectName = '';

    public string $clientName = '';

    public string $description = '';

    public ProjectStatusEnum $status = ProjectStatusEnum::ACTIVE;

    public string $dueDate = '';

    protected $paginationTheme = 'tailwind';

    public function openCreateModal(): void
    {
        $this->mode = ModalModeEnum::CREATE;
        $this->modalTitle = 'Create Project';
        $this->resetForm();
        $this->js('$openModal("cardModal")');
    }

    public function openEditModal(int $id): void
    {
        $this->project = Project::findOrFail($id);
        $this->mode = ModalModeEnum::EDIT;
        $this->modalTitle = 'Edit Project';
        $this->projectName = $this->project->name;
        $this->clientName = $this->project->client_name;
        $this->description = $this->project->description ?? '';
        $this->status = $this->project->status;
        $this->dueDate = $this->project->due_date->format('Y-m-d');
        $this->js('$openModal("cardModal")');
    }

    public function submit(): void
    {
        /** @var User */
        $user = Auth::user();

        $this->validate([
            'projectName' => [
                'required',
                'string',
                'max:255',
                Rule::unique('projects', 'name')
                    ->when($this->mode === ModalModeEnum::EDIT, fn ($rule) => $rule->ignore($this->project->id))
                    ->where('company_id', $user->company->id),
            ],
            'clientName' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'status' => ['required', Rule::enum(ProjectStatusEnum::class)],
            'dueDate' => ['required', 'date'],
        ]);

        $data = [
            'name' => $this->projectName,
            'client_name' => $this->clientName,
            'description' => $this->description,
            'status' => $this->status,
            'due_date' => $this->dueDate,
        ];

        if ($this->mode === ModalModeEnum::CREATE) {
            $data['company_id'] = $user->company->id;
            Project::create($data);
        } else {
            $this->project->update($data);
        }

        $this->notification()->send([
            'icon' => 'success',
            'title' => $this->mode === ModalModeEnum::CREATE ? 'Project Created' : 'Project Updated',
            'description' => $this->mode === ModalModeEnum::CREATE
                ? 'Project has been created successfully.'
                : 'Project has been updated successfully.',
        ]);

        $this->close();
    }

    public function close(): void
    {
        $this->resetForm();
        $this->js('$closeModal("cardModal")');
    }

    public function render()
    {
        /** @var User */
        $user = Auth::user();

        $projects = Project::query()
            ->where('company_id', $user->company->id)
            ->paginate(5);

        return view('livewire.admin.company.project-list', [
            'projects' => $projects,
        ]);
    }

    private function resetForm(): void
    {
        $this->project = null;
        $this->projectName = '';
        $this->clientName = '';
        $this->description = '';
        $this->status = ProjectStatusEnum::ACTIVE;
        $this->dueDate = '';
        $this->mode = ModalModeEnum::CREATE;
    }
}
