@extends('layouts.dashboard')


@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Dashboard</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Welcome back! {{ $name }} Here's what's happening
                today.</p>
        </div>
        <div
            class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-white dark:bg-card-dark px-4 py-2 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
            <span class="material-icons text-primary text-base">calendar_today</span>
            <span>{{ now()->format('l, F j, Y') }}</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700 relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-primary/5 dark:bg-primary/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110">
            </div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Current Status</div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                        <span class="font-bold text-slate-900 dark:text-slate-100">Clocked Out</span>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-2 rounded-lg">
                    <span class="material-icons text-slate-400">timer</span>
                </div>
            </div>
            <div class="text-2xl font-mono text-slate-400 dark:text-slate-500 mb-4">00:00:00</div>
            <button
                class="w-full bg-primary hover:bg-primary-hover text-white py-2.5 rounded-lg text-sm font-semibold shadow-glow dark:shadow-glow-dark transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-sm">login</span> Clock In
            </button>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Weekly Hours</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">32.5 <span
                            class="text-sm font-normal text-slate-400 dark:text-slate-500">/ 40</span></div>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900/20 p-2 rounded-lg">
                    <span class="material-icons text-blue-500">schedule</span>
                </div>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 h-2 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-full rounded-full" style="width: 81%"></div>
            </div>
            <div class="mt-2 text-xs text-blue-600 dark:text-blue-400 font-medium">On track for the week</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Days Worked</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">4</div>
                </div>
                <div class="bg-emerald-50 dark:bg-emerald-900/20 p-2 rounded-lg">
                    <span class="material-icons text-emerald-500">calendar_view_week</span>
                </div>
            </div>
            <div class="flex gap-1 mt-3">
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-200 dark:bg-slate-700 rounded-full"></div>
            </div>
            <div class="mt-2 text-xs text-emerald-600 dark:text-emerald-400 font-medium">4 day streak!</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Location Status</div>
                    <div class="text-lg font-bold text-slate-900 dark:text-slate-100 mt-1">Verified</div>
                </div>
                <div class="bg-orange-50 dark:bg-orange-900/20 p-2 rounded-lg animate-pulse">
                    <span class="material-icons text-orange-500">my_location</span>
                </div>
            </div>
            <div
                class="flex items-center gap-2 mt-2 bg-slate-50 dark:bg-slate-800 p-2 rounded border border-slate-100 dark:border-slate-700">
                <span class="material-icons text-slate-400 text-sm">place</span>
                <span class="text-xs text-slate-600 dark:text-slate-300 truncate">Home Office (Verified IP)</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div
            class="lg:col-span-1 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">beach_access</span>
                    Request Time Off
                </h2>
            </div>
            <div class="p-6 space-y-4">
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">Leave
                        Type</label>
                    <select
                        class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary">
                        <option>Vacation</option>
                        <option>Sick Leave</option>
                        <option>Personal Day</option>
                        <option>Bereavement</option>
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">Start
                            Date</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                            type="date" />
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">End
                            Date</label>
                        <input
                            class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                            type="date" />
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">Reason
                        (Optional)</label>
                    <textarea
                        class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                        placeholder="Brief description..." rows="3"></textarea>
                </div>
                <div class="pt-2">
                    <button
                        class="w-full bg-slate-900 dark:bg-slate-700 text-white hover:bg-slate-800 dark:hover:bg-slate-600 py-3 rounded-lg font-medium transition-colors shadow-lg shadow-slate-900/10">
                        Submit Request
                    </button>
                </div>
            </div>
        </div>
        <div
            class="lg:col-span-2 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 flex flex-col">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex justify-between items-center bg-slate-50/50 dark:bg-slate-800/50">
                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400">history</span>
                    Recent Requests
                </h2>
                <button class="text-sm text-primary hover:text-primary-hover font-medium">View All</button>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                    <thead
                        class="bg-slate-50 dark:bg-slate-800 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
                        <tr>
                            <th class="px-6 py-4">Type</th>
                            <th class="px-6 py-4">Dates</th>
                            <th class="px-6 py-4">Days</th>
                            <th class="px-6 py-4">Status</th>
                            <th class="px-6 py-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                    <span class="font-medium text-slate-900 dark:text-slate-100">Vacation</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Nov 12 - Nov 15, 2025</td>
                            <td class="px-6 py-4">4 Days</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Approved
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                    <span class="material-icons text-lg">more_horiz</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-pink-500"></div>
                                    <span class="font-medium text-slate-900 dark:text-slate-100">Sick Leave</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Oct 02, 2025</td>
                            <td class="px-6 py-4">1 Day</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-green-500"></span> Approved
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                    <span class="material-icons text-lg">more_horiz</span>
                                </button>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                    <span class="font-medium text-slate-900 dark:text-slate-100">Personal</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">Dec 24, 2025</td>
                            <td class="px-6 py-4">1 Day</td>
                            <td class="px-6 py-4">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400">
                                    <span class="w-1.5 h-1.5 rounded-full bg-yellow-500 animate-pulse"></span>
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300">
                                    <span class="material-icons text-lg">more_horiz</span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div
                class="grow flex items-center justify-center p-8 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30">
                <p class="text-xs text-slate-400">Showing last 3 months of activity</p>
            </div>
        </div>
    </div>
@endsection
