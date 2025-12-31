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
    <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 p-4 mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <span class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary transition-shadow placeholder-slate-400 dark:placeholder-slate-500"
                    placeholder="Search employees by name, email, or role..." type="text" />
            </div>
            <div class="flex gap-4 overflow-x-auto pb-1 md:pb-0">
                <select
                    class="rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary py-2.5 pr-8 pl-3 min-w-[160px]">
                    <option value="">All Departments</option>
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="product">Product</option>
                    <option value="marketing">Marketing</option>
                </select>
                <select
                    class="rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary py-2.5 pr-8 pl-3 min-w-[140px]">
                    <option value="">Status: All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="onboarding">Onboarding</option>
                </select>
                <button
                    class="p-2.5 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-500 dark:text-slate-400 hover:text-primary hover:border-primary transition-colors bg-white dark:bg-card-dark">
                    <span class="material-icons">filter_list</span>
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach ($employees as $employee)
            <x-employee-list-item :employee="$employee" />
        @endforeach
    </div>
    @if ($employees->hasPages())
        <div class="mt-8 flex items-center justify-between border-t border-slate-100 dark:border-slate-700 pt-6">
            <div class="text-sm text-slate-500 dark:text-slate-400">
                Showing <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->firstItem() }}</span> to
                <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->lastItem() }}</span>
                of <span class="font-medium text-slate-900 dark:text-slate-100">{{ $employees->total() }}</span> results
            </div>
            <div class="flex gap-2">
                <a class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    href="{{ $employees->previousPageUrl() }}">
                    Previous
                </a>
                <a class="px-4 py-2 border border-slate-200 dark:border-slate-600 rounded-lg text-sm text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors"
                    href="{{ $employees->nextPageUrl() }}">
                    Next
                </a>
            </div>
        </div>
    @endif
@endsection
