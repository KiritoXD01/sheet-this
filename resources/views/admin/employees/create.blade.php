@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <a class="inline-flex items-center text-sm text-slate-500 hover:text-primary transition-colors mb-4 group"
                href="{{ route('admin.employees') }}">
                <span class="material-icons text-lg mr-1 group-hover:-translate-x-1 transition-transform">arrow_back</span>
                Back to Employees List
            </a>
            <h1 class="text-3xl font-bold text-slate-900">Create New Employee</h1>
            <p class="text-slate-500 mt-1">Add a new team member to your organization and set up their
                profile.</p>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-soft border border-slate-100 overflow-hidden">
        <div class="p-6 md:p-8 space-y-8">
            <section>
                <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100">
                    <span class="material-symbols-outlined text-primary">person</span>
                    Personal Information
                </h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-6">
                        <div class="flex-shrink-0">
                            <div
                                class="w-24 h-24 rounded-full bg-slate-100 border-2 border-dashed border-slate-300 flex items-center justify-center hover:bg-slate-50 transition-colors cursor-pointer">
                                <span class="material-icons text-slate-400 text-3xl">account_circle</span>
                            </div>
                            <button class="mt-2 w-full text-xs text-primary hover:text-primary-hover font-medium">
                                Upload Photo
                            </button>
                        </div>
                        <div class="flex-1 space-y-1.5">
                            <label class="block text-sm font-medium text-slate-700">Profile Picture</label>
                            <p class="text-sm text-slate-500">Upload a professional headshot. Recommended size: 400x400px.
                                Max file size: 5MB.</p>
                            <input type="file" accept="image/*" class="hidden" />
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-slate-700">First Name <span
                                    class="text-red-500">*</span></label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow placeholder-slate-400"
                                placeholder="e.g. Jane" type="text" />
                        </div>
                        <div class="space-y-1.5">
                            <label class="block text-sm font-medium text-slate-700">Last Name <span
                                    class="text-red-500">*</span></label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow placeholder-slate-400"
                                placeholder="e.g. Cooper" type="text" />
                        </div>
                        <div class="space-y-1.5 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700">Email Address <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="material-icons text-slate-400 text-lg">mail</span>
                                </div>
                                <input
                                    class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow pl-10 placeholder-slate-400"
                                    placeholder="jane.cooper@example.com" type="email" />
                            </div>
                            <p class="text-xs text-slate-500 mt-1">This email will be used for login and notifications.</p>
                        </div>
                    </div>
                </div>
            </section>
            <section>
                <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100">
                    <span class="material-symbols-outlined text-primary">work</span>
                    Employment Details
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Job Role / Title <span
                                class="text-red-500">*</span></label>
                        <select
                            class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow">
                            <option value="">Select a role</option>
                            <option value="developer">Software Developer</option>
                            <option value="designer">Product Designer</option>
                            <option value="manager">Project Manager</option>
                            <option value="hr">HR Specialist</option>
                            <option value="marketing">Marketing Lead</option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Department</label>
                        <select
                            class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow">
                            <option value="">Select department</option>
                            <option value="engineering">Engineering</option>
                            <option value="design">Design</option>
                            <option value="product">Product</option>
                            <option value="operations">Operations</option>
                        </select>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Employee ID</label>
                        <input
                            class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow placeholder-slate-400"
                            placeholder="e.g. EMP-2025-001" type="text" />
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Start Date</label>
                        <input
                            class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow"
                            type="date" />
                    </div>
                </div>
            </section>
            <section>
                <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100">
                    <span class="material-symbols-outlined text-primary">lock</span>
                    Security
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Initial Password <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <input
                                class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow pr-10"
                                type="password" />
                            <button
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                                <span class="material-icons text-lg">visibility_off</span>
                            </button>
                        </div>
                        <p class="text-xs text-slate-500 mt-1">Must be at least 8 characters long.</p>
                    </div>
                    <div class="space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700">Confirm Password <span
                                class="text-red-500">*</span></label>
                        <div class="relative">
                            <input
                                class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow pr-10"
                                type="password" />
                            <button
                                class="absolute inset-y-0 right-0 pr-3 flex items-center text-slate-400 hover:text-slate-600">
                                <span class="material-icons text-lg">visibility_off</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4 flex gap-3">
                    <span class="material-icons text-blue-500 mt-0.5">info</span>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900">Profile Activation</h4>
                        <p class="text-sm text-blue-700 mt-0.5">The employee will receive an email
                            notification with their login credentials and a link to verify their account.</p>
                    </div>
                </div>
            </section>
        </div>
        <div class="bg-slate-50 border-t border-slate-100 px-6 py-4 flex justify-end gap-3 rounded-b-xl">
            <a href="{{ route('admin.employees') }}"
                class="px-5 py-2.5 rounded-lg border border-slate-200 text-slate-600 font-medium text-sm hover:bg-white transition-colors shadow-sm">
                Cancel
            </a>
            <button
                class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow transition-all active:scale-95 flex items-center gap-2">
                <span class="material-icons text-sm">person_add</span>
                Create Employee
            </button>
        </div>
    </div>
@endsection
