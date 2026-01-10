@extends('layouts.dashboard')

@section('content')
    <nav aria-label="Breadcrumb" class="flex mb-6">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a class="inline-flex items-center text-sm font-medium text-slate-500 hover:text-primary dark:text-slate-400 dark:hover:text-white"
                    href="{{ route('admin.employees.index') }}">
                    <span class="material-icons text-lg mr-2">people</span>
                    Employees
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <span class="material-icons text-slate-400 text-lg">chevron_right</span>
                    <a class="ml-1 text-sm font-medium text-slate-500 hover:text-primary dark:text-slate-400 md:ml-2 dark:hover:text-white"
                        href="{{ route('admin.employees.show', $employee->id) }}">
                        {{ $employee->user->name }}
                    </a>
                </div>
            </li>
            <li>
                <div class="flex items-center">
                    <span class="material-icons text-slate-400 text-lg">chevron_right</span>
                    <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2 dark:text-white">
                        Edit
                    </span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">Edit Employee</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">
                Update {{ $employee->user->name }}'s information
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.employees.show', $employee->id) }}"
                class="px-4 py-2 rounded-lg bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium text-sm border border-slate-200 dark:border-slate-700 transition-all active:scale-95 flex items-center gap-2">
                <span class="material-icons text-sm">arrow_back</span>
                Cancel
            </a>
        </div>
    </div>

    <livewire:admin.employee.edit :employee="$employee" />
@endsection
