@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Company Profile</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Manage your organization's details, departments, and policies.
            </p>
        </div>
    </div>
    <div class="space-y-8">
        <livewire:admin.company.general-information />
        <livewire:admin.company.department-list />
        <livewire:admin.company.job-role-list />
        <livewire:admin.company.project-list />
        <livewire:admin.company.policy />
    </div>
@endsection
