@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Company Profile</h1>
            <p class="text-slate-500 mt-1">Manage your organization's details, departments, and policies.
            </p>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <livewire:admin.company.general-information />
        </div>
        <div class="lg:col-span-1 space-y-8">
            <livewire:admin.company.department-list />

            <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">policy</span>
                        Company Policies
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Default
                            Timezone</label>
                        <select
                            class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary text-sm">
                            <option>(GMT-08:00) Pacific Time</option>
                            <option>(GMT-05:00) Eastern Time</option>
                            <option>(GMT+00:00) London</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Standard Work
                            Day</label>
                        <div class="flex items-center gap-2">
                            <input
                                class="w-20 rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary text-sm"
                                type="number" value="8" />
                            <span class="text-sm text-slate-500">hours</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Work Week</label>
                        <div class="flex gap-1">
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">M</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">T</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">W</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">T</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">F</button>
                            <button
                                class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 text-xs font-bold flex items-center justify-center hover:bg-slate-200 transition-colors">S</button>
                            <button
                                class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 text-xs font-bold flex items-center justify-center hover:bg-slate-200 transition-colors">S</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-2">
                        <span class="text-sm font-medium text-slate-700">Allow Overtime</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input checked="" class="sr-only peer" type="checkbox" value="" />
                            <div
                                class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
