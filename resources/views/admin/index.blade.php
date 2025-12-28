@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Admin Overview</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Company-wide activity and pending actions.</p>
        </div>
        <div class="flex items-center gap-3">
            <button
                class="hidden sm:flex items-center gap-2 text-sm font-medium text-slate-600 dark:text-slate-300 bg-white dark:bg-card-dark px-4 py-2 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                <span class="material-icons text-slate-400 dark:text-slate-500 text-base">file_download</span>
                <span>Export Data</span>
            </button>
            <div
                class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-white dark:bg-card-dark px-4 py-2 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
                <span class="material-icons text-primary text-base">calendar_today</span>
                <span>Monday, Oct 23</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700 relative overflow-hidden group">
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Employees</div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-2xl font-bold text-slate-900 dark:text-slate-100">124</span>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-2 rounded-lg">
                    <span class="material-icons text-slate-400">groups</span>
                </div>
            </div>
            <div class="text-xs text-slate-500 dark:text-slate-400">
                <span class="text-green-500 font-bold items-center gap-1 inline-flex"><span
                        class="material-icons text-[10px]">arrow_upward</span> 2</span> new this month
            </div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">On the Clock</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">86</div>
                </div>
                <div class="bg-primary/10 p-2 rounded-lg">
                    <span class="material-icons text-primary">timer</span>
                </div>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                <div class="bg-primary h-full rounded-full" style="width: 70%"></div>
            </div>
            <div class="mt-2 text-xs text-slate-500 dark:text-slate-400 font-medium">69% of workforce active</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending Requests</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">12</div>
                </div>
                <div class="bg-orange-50 p-2 rounded-lg">
                    <span class="material-icons text-orange-500">assignment_late</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-2">
                <span class="flex h-2 w-2 rounded-full bg-orange-500 animate-ping"></span>
                <span class="text-xs text-orange-600 dark:text-orange-400 font-medium">Requires attention</span>
            </div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Late / Absent</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">4</div>
                </div>
                <div class="bg-red-50 p-2 rounded-lg">
                    <span class="material-icons text-red-500">warning</span>
                </div>
            </div>
            <div class="flex -space-x-2 overflow-hidden mt-1">
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    JD</div>
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    TS</div>
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    AK</div>
            </div>
            <div class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">3 Unexplained absences</div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div
            class="lg:col-span-1 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col h-full">
            <div class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50 flex justify-between items-center">
                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-orange-500">notifications_active</span>
                    Approvals
                </h2>
                <span class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-bold px-2 py-0.5 rounded-full">5
                    New</span>
            </div>
            <div class="p-4 space-y-4 overflow-y-auto max-h-[500px]">
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                                MJ
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-slate-100">Michael Jordan</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Design Team</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 dark:text-slate-500">2h ago</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Vacation Request</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 pl-3.5">Nov 12 - Nov 15 (4 Days)</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="flex-1 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-600 dark:text-slate-300 py-1.5 rounded-lg text-xs font-medium transition-colors">Deny</button>
                        <button
                            class="flex-1 bg-primary hover:bg-primary-hover text-white py-1.5 rounded-lg text-xs font-medium transition-colors shadow-sm">Approve</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-8 w-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-xs font-bold">
                                AS
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-slate-100">Alice Smith</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Engineering</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 dark:text-slate-500">4h ago</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-red-500"></span>
                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Sick Leave</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 pl-3.5">Today (1 Day)</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="flex-1 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-600 dark:text-slate-300 py-1.5 rounded-lg text-xs font-medium transition-colors">Deny</button>
                        <button
                            class="flex-1 bg-primary hover:bg-primary-hover text-white py-1.5 rounded-lg text-xs font-medium transition-colors shadow-sm">Approve</button>
                    </div>
                </div>
                <div class="bg-white dark:bg-slate-800/50 p-4 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                    <div class="flex justify-between items-start mb-2">
                        <div class="flex items-center gap-3">
                            <div
                                class="h-8 w-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center text-xs font-bold">
                                RK
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-slate-900 dark:text-slate-100">Raj Kumar</h4>
                                <p class="text-xs text-slate-500 dark:text-slate-400">Marketing</p>
                            </div>
                        </div>
                        <span class="text-[10px] font-mono text-slate-400 dark:text-slate-500">Yesterday</span>
                    </div>
                    <div class="mb-3">
                        <div class="flex items-center gap-2 mb-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>
                            <span class="text-xs font-semibold text-slate-700 dark:text-slate-300">Timesheet
                                Correction</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 pl-3.5">Oct 20 - Forgot Clock Out</p>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="flex-1 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-600 dark:text-slate-300 py-1.5 rounded-lg text-xs font-medium transition-colors">Review</button>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30 text-center">
                <button class="text-sm text-primary hover:text-primary-hover font-medium">View All Requests</button>
            </div>
        </div>
        <div class="lg:col-span-2 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 flex flex-col">
            <div
                class="p-6 border-b border-slate-100 dark:border-slate-700 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-slate-50/50 dark:bg-slate-800/50">
                <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400 dark:text-slate-500">table_view</span>
                    Live Attendance
                </h2>
                <div class="flex items-center gap-2">
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <span class="material-icons text-slate-400 text-sm">search</span>
                        </span>
                        <input
                            class="pl-9 pr-4 py-1.5 text-sm border border-slate-200 dark:border-slate-600 rounded-lg bg-white dark:bg-slate-800 dark:text-slate-100 focus:ring-primary focus:border-primary placeholder-slate-400 dark:placeholder-slate-500"
                            placeholder="Search employee..." type="text" />
                    </div>
                    <button class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-primary rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-card-dark">
                        <span class="material-icons text-sm">filter_list</span>
                    </button>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
                    <thead class="bg-slate-50 dark:bg-slate-800 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
                        <tr>
                            <th class="px-6 py-4">Employee</th>
                            <th class="px-6 py-4">Department</th>
                            <th class="px-6 py-4">Time In</th>
                            <th class="px-6 py-4">Location</th>
                            <th class="px-6 py-4 text-right">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-indigo-100 flex items-center justify-center text-xs font-bold text-indigo-600">
                                        JS
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">John Smith</div>
                                        <div class="text-[10px] text-slate-500">Software Engineer</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Engineering</td>
                            <td class="px-6 py-4 font-mono text-xs">08:58 AM</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5">
                                    <span class="material-icons text-green-500 text-sm">verified</span>
                                    <span class="text-xs">Office HQ</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-emerald-100 flex items-center justify-center text-xs font-bold text-emerald-600">
                                        ED
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">Emma Davis</div>
                                        <div class="text-[10px] text-slate-500">Product Manager</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Product</td>
                            <td class="px-6 py-4 font-mono text-xs">09:05 AM</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5">
                                    <span class="material-icons text-green-500 text-sm">verified</span>
                                    <span class="text-xs">Remote (IP)</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700">
                                    Active
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-xs font-bold text-slate-600">
                                        MP
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">Mike Peterson</div>
                                        <div class="text-[10px] text-slate-500">Sales Rep</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Sales</td>
                            <td class="px-6 py-4 font-mono text-xs">--:--</td>
                            <td class="px-6 py-4">
                                <span class="text-xs text-slate-400">-</span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-slate-100 text-slate-600">
                                    Not In
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center text-xs font-bold text-orange-600">
                                        SL
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">Sarah Lee</div>
                                        <div class="text-[10px] text-slate-500">Customer Support</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Support</td>
                            <td class="px-6 py-4 font-mono text-xs">09:45 AM</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5">
                                    <span class="material-icons text-orange-400 text-sm">gpp_maybe</span>
                                    <span class="text-xs">Unverified</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-orange-100 text-orange-700">
                                    Late
                                </span>
                            </td>
                        </tr>
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div
                                        class="h-8 w-8 rounded-full bg-purple-100 flex items-center justify-center text-xs font-bold text-purple-600">
                                        DK
                                    </div>
                                    <div>
                                        <div class="font-medium text-slate-900 dark:text-slate-100">David Kim</div>
                                        <div class="text-[10px] text-slate-500">Engineering</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">Engineering</td>
                            <td class="px-6 py-4 font-mono text-xs">08:30 AM</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-1.5">
                                    <span class="material-icons text-green-500 text-sm">verified</span>
                                    <span class="text-xs">Office HQ</span>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <span
                                    class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700">
                                    Break
                                </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="grow flex items-center justify-between p-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30">
                <p class="text-xs text-slate-400 dark:text-slate-500">Showing 5 of 124 employees</p>
                <div class="flex gap-2">
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-600 rounded text-xs dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">Previous</button>
                    <button
                        class="px-3 py-1 border border-slate-200 dark:border-slate-600 rounded text-xs dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">Next</button>
                </div>
            </div>
        </div>
    </div>
@endsection
