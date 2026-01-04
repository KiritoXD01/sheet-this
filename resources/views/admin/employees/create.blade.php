@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <a class="inline-flex items-center text-sm text-slate-500 dark:text-slate-400 hover:text-primary transition-colors mb-4 group"
                href="{{ route('admin.employees.index') }}">
                <span class="material-icons text-lg mr-1 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Back to Employees List
            </a>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Create New Employee</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">
                Add a new team member to your organization and set up their
                profile.
            </p>
        </div>
    </div>
    <livewire:admin.employee.create />
@endsection
