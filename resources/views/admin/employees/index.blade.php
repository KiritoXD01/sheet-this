@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Employees</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Manage your team members and their account permissions.</p>
        </div>
        <div class="flex items-center gap-3">
            <a class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow transition-all active:scale-95 flex items-center gap-2"
                href="{{ route('admin.employees.create') }}">
                <span class="material-icons text-sm">add</span>
                Add Employee
            </a>
        </div>
    </div>
    @if (session('employee-created'))
        <x-alert :title="session('employee-created')" positive class="mb-8" />
    @endif

    @livewire('admin.employee.index')
@endsection
