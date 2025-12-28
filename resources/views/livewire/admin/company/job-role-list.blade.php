<div id="job-role-container" class="bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
    <div class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">badge</span>
            Job Roles
        </h2>
        <button type="button" wire:click="openCreateModal"
            class="cursor-pointer text-xs bg-white dark:bg-slate-700 border border-slate-200 dark:border-slate-600 hover:border-primary text-slate-600 dark:text-slate-300 px-2 py-1 rounded shadow-sm transition-colors flex items-center gap-1">
            <span class="material-icons text-xs">add</span> New
        </button>
    </div>

    @forelse ($jobRoles as $jobRole)
        @if ($loop->first)
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-slate-500 dark:text-slate-400 uppercase tracking-wider">
                                Job Role Name
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
                <div class="font-medium text-slate-900 dark:text-slate-100">{{ $jobRole->name }}</div>
            </td>
            <td class="px-6 py-4 text-right">
                <div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                    <button class="text-slate-400 hover:text-primary transition-colors" type="button"
                        wire:click="openEditModal({{ $jobRole->id }})">
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
    <p class="text-slate-500 dark:text-slate-400 mt-4 text-sm">No job roles yet. Create your first job role.</p>
</div>
@endforelse

@if ($jobRoles->hasPages())
    <div class="p-4 border-t border-slate-100 dark:border-slate-700">
        <div wire:scroll="job-role-container">
            {{ $jobRoles->links() }}
        </div>
    </div>
@endif

<x-modal-card :title="$modalTitle" name="cardModal" persistent>
    <form wire:submit="submit" id="jobRoleForm">
        <x-input type="text" wire:model="jobRoleName" placeholder="Job Role Name" />
        <x-slot name="footer" class="flex justify-between gap-x-4">
            <div class="flex gap-x-4">
                <x-button flat label="Cancel" wire:click="close" type="button" />

                <x-button primary label="Save" type="submit" form="jobRoleForm" />
            </div>
        </x-slot>
    </form>
</x-modal-card>
</div>
