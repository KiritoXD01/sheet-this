<div>
    <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 p-4 mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <span class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input
                    wire:model.live.debounce.300ms="search"
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary transition-shadow placeholder-slate-400 dark:placeholder-slate-500"
                    placeholder="Search employees by name, email, or role..."
                    type="text" />

                <div wire:loading wire:target="search" class="absolute right-3 top-1/2 -translate-y-1/2">
                    <span class="material-icons animate-spin text-primary text-sm">refresh</span>
                </div>
            </div>

            <div class="flex gap-4 overflow-x-auto pb-1 md:pb-0">
                <select
                    wire:model.live="departmentFilter"
                    class="rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary py-2.5 pr-8 pl-3 min-w-[160px]">
                    <option value="">All Departments</option>
                    @foreach ($departments as $department)
                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                    @endforeach
                </select>

                @if ($search || $departmentFilter)
                    <button
                        wire:click="clearFilters"
                        class="p-2.5 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:text-primary hover:border-primary transition-colors bg-white dark:bg-card-dark"
                        title="Clear filters">
                        <span class="material-icons">clear</span>
                    </button>
                @endif
            </div>
        </div>
    </div>

    <div wire:loading.class="opacity-50" wire:target="search,departmentFilter">
        @if ($employees->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($employees as $employee)
                    <x-employee-list-item :employee="$employee" wire:key="employee-{{ $employee->id }}" />
                @endforeach
            </div>
        @else
            <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 p-12 text-center">
                <span class="material-icons text-slate-300 dark:text-slate-600 text-6xl">person_search</span>
                <p class="text-slate-500 dark:text-slate-400 mt-4 text-base">
                    @if ($search || $departmentFilter)
                        No employees found matching your filters.
                    @else
                        No employees yet. Create your first employee.
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
        <div class="mt-8 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 pt-6">
            <div class="text-sm text-slate-500 dark:text-slate-400">
                Showing <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->firstItem() }}</span> to
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->lastItem() }}</span>
                of <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->total() }}</span> results
            </div>
            <div>
                {{ $employees->links() }}
            </div>
        </div>
    @endif
</div>
