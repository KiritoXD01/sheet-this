<div
    class="lg:col-span-2 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 flex flex-col">
    <div
        class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-slate-50/50 dark:bg-slate-800/50">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-slate-400 dark:text-slate-500">table_view</span>
            Live Attendance
        </h2>
        <div class="flex items-center gap-2">
            <div class="relative">
                <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                    <span class="material-icons text-slate-400 text-sm">search</span>
                </span>
                <input
                    wire:model.live.debounce.300ms="search"
                    class="pl-9 pr-4 py-1.5 text-sm border border-slate-200 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 dark:text-slate-100 focus:ring-primary focus:border-primary placeholder-slate-400 dark:placeholder-slate-500"
                    placeholder="Search employee..." type="text" />
                <div wire:loading wire:target="search" class="absolute right-3 top-1/2 -translate-y-1/2">
                    <span class="material-icons animate-spin text-primary text-xs">refresh</span>
                </div>
            </div>
            <select
                wire:model.live="departmentFilter"
                class="text-sm border border-slate-200 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 dark:text-slate-100 focus:ring-primary focus:border-primary py-1.5 pr-8 pl-3">
                <option value="">All Departments</option>
                @foreach ($departments as $department)
                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
            </select>
            @if ($search || $departmentFilter)
                <button
                    wire:click="clearFilters"
                    class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-primary rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-card-dark"
                    title="Clear filters">
                    <span class="material-icons text-sm">clear</span>
                </button>
            @endif
        </div>
    </div>
    <div class="overflow-x-auto" wire:loading.class="opacity-50" wire:target="search,departmentFilter">
        @if ($employees->count() > 0)
            <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                <thead
                    class="bg-slate-50 dark:bg-slate-800 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
                    <tr>
                        <th class="px-6 py-4">Employee</th>
                        <th class="px-6 py-4">Department</th>
                        <th class="px-6 py-4">Time In</th>
                        <th class="px-6 py-4">Location</th>
                        <th class="px-6 py-4 text-right">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                    @foreach ($employees as $employee)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors" wire:key="employee-{{ $employee->id }}">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-indigo-100 dark:bg-indigo-900 flex items-center justify-center text-xs font-bold text-indigo-600 dark:text-indigo-300">
                                        {{ $employee->user->initials }}
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">{{ $employee->user->name }}</div>
                                        <div class="text-[10px] text-slate-500 dark:text-slate-400">{{ $employee->jobRole?->name ?? 'No Role' }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">{{ $employee->department?->name ?? '-' }}</td>
                            <td class="px-6 py-4 font-mono text-xs">--:--</td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-400 dark:text-slate-500">-</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300">
                                    Not In
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="p-12 text-center">
                <span class="material-icons text-slate-300 dark:text-slate-600 text-6xl">person_search</span>
                <p class="text-slate-500 dark:text-slate-400 mt-4 text-base">
                    @if ($search || $departmentFilter)
                        No employees found matching your filters.
                    @else
                        No employees yet.
                    @endif
                </p>
                @if ($search || $departmentFilter)
                    <button
                        wire:click="clearFilters"
                        class="mt-4 px-4 py-2 text-sm text-primary hover:bg-primary/10 rounded-lg transition-colors">
                        Clear filters
                    </button>
                @endif
            </div>
        @endif
    </div>
    @if ($employees->hasPages())
        <div
            class="grow flex items-center justify-between p-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30">
            <p class="text-xs text-slate-400 dark:text-slate-500">
                Showing <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->firstItem() }}</span> to
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->lastItem() }}</span>
                of <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->total() }}</span> employees
            </p>
            <div>
                {{ $employees->links() }}
            </div>
        </div>
    @endif
</div>
