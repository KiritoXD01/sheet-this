@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Timesheet Management</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Review, edit, and submit your weekly hours.</p>
        </div>
        <div class="flex items-center gap-3">
            <div
                class="flex items-center gap-2 bg-white dark:bg-card-dark p-1 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
                <button
                    class="p-2 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md text-slate-500 dark:text-slate-400 transition-colors">
                    <span class="material-icons">chevron_left</span>
                </button>
                <div
                    class="px-4 py-1 flex items-center gap-2 font-medium text-slate-700 dark:text-slate-200 w-48 justify-center">
                    <span class="material-icons text-primary text-sm">date_range</span>
                    <span>Oct 23 - Oct 29</span>
                </div>
                <button
                    class="p-2 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md text-slate-500 dark:text-slate-400 transition-colors">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-3 space-y-6">
            <livewire:employee.timesheet.create />
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 p-6">
                <h3
                    class="text-sm font-bold text-slate-900 dark:text-slate-100 uppercase tracking-wider mb-6 flex items-center justify-between">
                    Summary
                    <span class="material-icons text-slate-300">pie_chart</span>
                </h3>
                <div class="space-y-5">
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block text-primary uppercase">Billable</span>
                            </div>
                            <div class="text-right">
                                <span
                                    class="text-xs font-semibold inline-block text-slate-600 dark:text-slate-300">28.0h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100 dark:bg-slate-700">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary"
                                style="width: 86%"></div>
                        </div>
                    </div>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block text-blue-500 uppercase">Non-Billable</span>
                            </div>
                            <div class="text-right">
                                <span
                                    class="text-xs font-semibold inline-block text-slate-600 dark:text-slate-300">4.5h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100 dark:bg-slate-700">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"
                                style="width: 14%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
                <div class="p-4 border-b border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                        <span class="material-symbols-outlined text-slate-400 dark:text-slate-500">history</span>
                        Recent History
                    </h3>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-700">
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">Oct 16 - Oct 22</div>
                            <span
                                class="material-icons text-slate-300 dark:text-slate-500 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500 dark:text-slate-400">40.00 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full border border-green-100 dark:border-green-800">Approved</span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">Oct 09 - Oct 15</div>
                            <span
                                class="material-icons text-slate-300 dark:text-slate-500 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500 dark:text-slate-400">38.50 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full border border-green-100 dark:border-green-800">Approved</span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900 dark:text-slate-100">Oct 02 - Oct 08</div>
                            <span
                                class="material-icons text-slate-300 dark:text-slate-500 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500 dark:text-slate-400">40.00 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 px-2 py-1 rounded-full border border-green-100 dark:border-green-800">Paid</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
