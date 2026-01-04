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

    <form method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <!-- Personal Information Section -->
        <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-icons text-lg">person</span>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">Personal Information</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Update basic employee details</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Full Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name', $employee->user->name) }}"
                        required
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    @error('name')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="email" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Email Address <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email', $employee->user->email) }}"
                        required
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    @error('email')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="employee_code" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Employee Code <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="employee_code" name="employee_code"
                        value="{{ old('employee_code', $employee->employee_code) }}" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white placeholder-slate-400 dark:placeholder-slate-500 focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                    @error('employee_code')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Employment Details Section -->
        <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
            <div class="flex items-center gap-3 mb-6">
                <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                    <span class="material-icons text-lg">work</span>
                </div>
                <div>
                    <h2 class="text-xl font-bold text-slate-900 dark:text-white">Employment Details</h2>
                    <p class="text-sm text-slate-500 dark:text-slate-400">Update job and department information</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="department_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Department <span class="text-red-500">*</span>
                    </label>
                    <select id="department_id" name="department_id" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        <option value="">Select Department</option>
                    </select>
                    @error('department_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="job_role_id" class="block text-sm font-medium text-slate-700 dark:text-slate-300 mb-2">
                        Job Role <span class="text-red-500">*</span>
                    </label>
                    <select id="job_role_id" name="job_role_id" required
                        class="w-full px-4 py-2 rounded-lg border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent transition-all">
                        <option value="">Select Job Role</option>
                    </select>
                    @error('job_role_id')
                        <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Form Actions -->
        <div class="flex flex-col sm:flex-row gap-4 justify-end">
            <a href="{{ route('admin.employees.show', $employee->id) }}"
                class="px-6 py-3 rounded-lg bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium border border-slate-200 dark:border-slate-700 transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-sm">close</span>
                Cancel
            </a>
            <button type="submit"
                class="px-6 py-3 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium shadow-glow transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-sm">save</span>
                Update Employee
            </button>
        </div>
    </form>
@endsection
