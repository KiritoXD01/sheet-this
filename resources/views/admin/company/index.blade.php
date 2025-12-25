@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Company Profile</h1>
            <p class="text-slate-500 mt-1">Manage your organization's details, departments, and policies.
            </p>
        </div>
    </div>
    <div class="space-y-8">
        <livewire:admin.company.general-information />
        <livewire:admin.company.department-list />
        <livewire:admin.company.policy />
    </div>
@endsection
