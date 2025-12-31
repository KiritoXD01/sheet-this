@use('App\Models\Employee')

@props([
    'employee' => Employee::class,
])

<div
    class="group bg-white dark:bg-card-dark rounded-xl shadow-sm hover:shadow-glow border border-slate-100 dark:border-slate-700 transition-all duration-300 flex flex-col relative overflow-hidden">
    <div class="absolute top-4 right-4 z-10">
        <button
            class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
            <span class="material-icons">more_vert</span>
        </button>
    </div>
    <div class="p-6 flex flex-col items-center text-center grow">
        <div class="relative mb-4">
            <div
                class="h-20 w-20 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl font-bold border-2 border-white dark:border-card-dark shadow-sm">
                JC
            </div>
            <span
                class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-2 border-white dark:border-card-dark rounded-full"
                title="Active"></span>
        </div>
        <h3 class="font-bold text-slate-900 dark:text-slate-100 text-lg">{{ $employee->user->name }}</h3>
        <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">{{ $employee->jobRole->name }}</p>
        <p class="text-xs font-medium text-primary bg-primary/10 px-2.5 py-0.5 rounded-full mt-1">
            {{ $employee->department->name }}</p>
        <div class="mt-6 w-full space-y-3">
            <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 gap-3">
                <span class="material-icons text-slate-400 text-lg">email</span>
                <span class="truncate">{{ $employee->user->email }}</span>
            </div>
            <div class="flex items-center text-sm text-slate-600 dark:text-slate-300 gap-3">
                <span class="material-icons text-slate-400 text-lg">badge</span>
                <span>{{ $employee->employee_code }}</span>
            </div>
        </div>
    </div>
    <div class="border-t border-slate-100 dark:border-slate-700 p-4 bg-slate-50 dark:bg-slate-800/50 flex gap-2">
        <a href="{{ route('admin.employees.show', $employee) }}"
            class="flex-1 py-2 px-3 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-600 dark:text-slate-300 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
            <span class="material-icons text-sm">visibility</span>
            Profile
        </a>
        <button
            class="py-2 px-3 rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-700 text-slate-400 hover:text-primary hover:border-primary transition-colors">
            <span class="material-icons text-sm">edit</span>
        </button>
    </div>
</div>
