@use(App\Enums\ProjectStatusEnum)

<div id="project-container"
    class="bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
    <div
        class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">folder</span>
            Projects
        </h2>
        <button type="button" wire:click="openCreateModal"
            class="cursor-pointer text-xs bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 hover:border-primary text-slate-600 dark:text-slate-300 px-2 py-1 rounded shadow-sm transition-colors flex items-center gap-1">
            <span class="material-icons text-xs">add</span> New
        </button>
    </div>

    @forelse ($projects as $project)
        @if ($loop->first)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Project Name
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Client
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Status
                            </th>
                            <th
                                class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Due Date
                            </th>
                            <th
                                class="px-6 py-3 text-right text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
        @endif

        <tr class="group hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
            <td class="px-6 py-4">
                <div class="font-medium text-slate-900 dark:text-slate-100">{{ $project->name }}</div>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-slate-600 dark:text-slate-300">{{ $project->client_name }}</div>
            </td>
            <td class="px-6 py-4">
                <span
                    class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                    @if ($project->status->value === 'active') bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400
                    @elseif($project->status->value === 'completed')
                    @elseif($project->status->value === 'on_hold')
                    @else @endif">
                    {{ $project->status->label() }}
                </span>
            </td>
            <td class="px-6 py-4">
                <div class="text-sm text-slate-600 dark:text-slate-300">{{ $project->due_date->format('M d, Y') }}</div>
            </td>
            <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="text-slate-400 hover:text-primary transition-colors" type="button"
                        wire:click="openEditModal({{ $project->id }})">
                        <span class="material-icons text-lg">edit</span>
                    </button>
                </div>
            </td>
        </tr>

        @if ($loop->last)
            </tbody>
            </table>
</div>
@endif
@empty
<div class="p-12 text-center">
    <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-6xl">folder_open</span>
    <p class="text-slate-500 dark:text-slate-400 mt-4 text-sm">No projects yet. Create your first project.</p>
</div>
@endforelse

@if ($projects->hasPages())
    <div class="p-4 border-t border-slate-100 dark:border-slate-700">
        <div wire:scroll="project-container">
            {{ $projects->links() }}
        </div>
    </div>
@endif

<x-modal-card :title="$modalTitle" name="cardModal" persistent>
    <form wire:submit="submit" id="projectForm">
        <div class="grid grid-cols-1 gap-4">
            <x-input type="text" wire:model="projectName" placeholder="Project Name" label="Project Name" />
            <x-input type="text" wire:model="clientName" placeholder="Client Name" label="Client Name" />
            <x-textarea wire:model="description" placeholder="Description (optional)" rows="3"
                label="Description" />
            <x-select label="Status" wire:model="status">
                @foreach (ProjectStatusEnum::cases() as $status)
                    <x-select.option :label="$status->label()" :value="$status->value" />
                @endforeach
            </x-select>
            <x-input type="date" wire:model="dueDate" placeholder="Due Date" label="Due Date" />
        </div>
        <x-slot name="footer" class="flex justify-between gap-x-4">
            <div class="flex gap-x-4">
                <x-button flat label="Cancel" wire:click="close" type="button" />

                <x-button primary label="Save" type="submit" form="projectForm" />
            </div>
        </x-slot>
    </form>
</x-modal-card>
</div>
