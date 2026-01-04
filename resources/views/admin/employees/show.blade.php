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
                    <span class="ml-1 text-sm font-medium text-slate-900 md:ml-2 dark:text-white">
                        {{ $employee->user->name }}
                    </span>
                </div>
            </li>
        </ol>
    </nav>
    <div class="flex flex-col md:flex-row md:items-center justify-between mb-6 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-white">{{ $employee->user->name }}</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">
                {{ $employee->jobRole->name }} • {{ $employee->department->name }}
            </p>
        </div>
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.employees.edit', $employee->id) }}"
                class="px-4 py-2 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow transition-all active:scale-95 flex items-center gap-2">
                <span class="material-icons text-sm">edit</span>
                Edit Profile
            </a>
        </div>
    </div>
    <div
        class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6 mb-8 relative overflow-hidden">
        <div class="absolute top-0 right-0 p-6 opacity-5 dark:opacity-10">
            <span class="material-icons text-9xl text-slate-900 dark:text-white">badge</span>
        </div>
        <div class="flex flex-col md:flex-row gap-8 relative z-10">
            <div class="shrink-0 flex flex-col items-center">
                <div
                    class="h-32 w-32 rounded-full bg-indigo-100 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 flex items-center justify-center text-4xl font-bold border-4 border-white dark:border-card-dark shadow-md mb-4">
                    {{ $employee->user->initials }}
                </div>
                <span
                    class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400 border border-green-200 dark:border-green-800">
                    <span class="w-1.5 h-1.5 rounded-full bg-green-500 animate-pulse"></span>
                    Active Employee
                </span>
            </div>
            <div class="grow grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 pt-2">
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider mb-1">Contact Information</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300 mb-1">
                            <span class="material-icons text-slate-400 text-sm">email</span>
                            <span>{{ $employee->user->email }}</span>
                        </div>
                    </div>
                    <div>
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider mb-1">Location</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300">
                            <span class="material-icons text-slate-400 text-sm">location_on</span>
                            <span>San Francisco, CA (Remote)</span>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div>
                        <p class="text-xs font-medium text-slate-400 uppercase tracking-wider mb-1">Employment Details</p>
                        <div class="flex items-center gap-2 text-slate-700 dark:text-slate-300 mb-1">
                            <span class="material-icons text-slate-400 text-sm">badge</span>
                            <span>ID: {{ $employee->employee_code }}</span>
                        </div>
                    </div>
                </div>
                <div
                    class="bg-slate-50 dark:bg-slate-800/50 rounded-lg p-4 border border-slate-100 dark:border-slate-800 flex flex-col justify-center">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider mb-3">Current Week Stats</p>
                    <div class="flex justify-between items-end mb-2">
                        <span class="text-3xl font-bold text-slate-900 dark:text-white">32<span
                                class="text-lg text-slate-400 font-normal">h</span> 15<span
                                class="text-lg text-slate-400 font-normal">m</span></span>
                        <span class="text-xs text-green-600 dark:text-green-400 font-medium flex items-center">
                            <span class="material-icons text-sm mr-0.5">trending_up</span> +5%
                        </span>
                    </div>
                    <div class="w-full bg-slate-200 dark:bg-slate-700 rounded-full h-1.5">
                        <div class="bg-primary h-1.5 rounded-full" style="width: 80%"></div>
                    </div>
                    <p class="text-xs text-slate-500 mt-2">80% of weekly goal (40h)</p>
                </div>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 flex flex-col h-full">
                <div
                    class="p-5 border-b border-slate-100 dark:border-slate-800 flex flex-col sm:flex-row justify-between items-center gap-4">
                    <h3 class="font-bold text-lg text-slate-900 dark:text-white flex items-center gap-2">
                        <span class="material-icons text-slate-400">calendar_month</span>
                        Timesheet Details
                    </h3>
                    <div
                        class="flex items-center bg-slate-50 dark:bg-slate-800 rounded-lg p-1 border border-slate-200 dark:border-slate-700">
                        <button
                            class="p-1.5 rounded hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm text-slate-500 dark:text-slate-400 transition-all">
                            <span class="material-icons text-sm">chevron_left</span>
                        </button>
                        <span class="px-3 text-sm font-medium text-slate-700 dark:text-slate-300">Oct 23 - Oct 29,
                            2025</span>
                        <button
                            class="p-1.5 rounded hover:bg-white dark:hover:bg-slate-700 hover:shadow-sm text-slate-500 dark:text-slate-400 transition-all">
                            <span class="material-icons text-sm">chevron_right</span>
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="text-xs text-slate-500 dark:text-slate-400 border-b border-slate-100 dark:border-slate-800 bg-slate-50/50 dark:bg-slate-800/30">
                                <th class="px-6 py-4 font-medium">Date</th>
                                <th class="px-6 py-4 font-medium">Project / Task</th>
                                <th class="px-6 py-4 font-medium text-center">Check In</th>
                                <th class="px-6 py-4 font-medium text-center">Check Out</th>
                                <th class="px-6 py-4 font-medium text-right">Total Hours</th>
                                <th class="px-6 py-4 font-medium text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-slate-100 dark:divide-slate-800">
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">Mon, Oct 23</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-slate-900 dark:text-white">Project Phoenix</div>
                                    <div class="text-xs text-slate-500">Frontend Development</div>
                                </td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">09:00 AM</td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">05:00 PM</td>
                                <td class="px-6 py-4 text-right font-medium text-slate-900 dark:text-white">8h 00m</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                        Approved
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">Tue, Oct 24</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-slate-900 dark:text-white">Project Phoenix</div>
                                    <div class="text-xs text-slate-500">API Integration</div>
                                </td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">09:15 AM</td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">05:15 PM</td>
                                <td class="px-6 py-4 text-right font-medium text-slate-900 dark:text-white">8h 00m</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                        Approved
                                    </span>
                                </td>
                            </tr>
                            <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">Wed, Oct 25</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-slate-900 dark:text-white">Internal Meeting</div>
                                    <div class="text-xs text-slate-500">Sprint Planning</div>
                                </td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">09:00 AM</td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">05:00 PM</td>
                                <td class="px-6 py-4 text-right font-medium text-slate-900 dark:text-white">8h 00m</td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-green-100 text-green-700 dark:bg-green-900/30 dark:text-green-400">
                                        Approved
                                    </span>
                                </td>
                            </tr>
                            <tr
                                class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors bg-blue-50/30 dark:bg-blue-900/10">
                                <td class="px-6 py-4">
                                    <div class="font-medium text-slate-900 dark:text-white">Thu, Oct 26</div>
                                    <span class="text-xs text-primary font-medium">Today</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-slate-900 dark:text-white">Design Review</div>
                                    <div class="text-xs text-slate-500">UI/UX Sync</div>
                                </td>
                                <td class="px-6 py-4 text-center text-slate-600 dark:text-slate-400">08:55 AM</td>
                                <td class="px-6 py-4 text-center text-slate-400 dark:text-slate-600">-</td>
                                <td class="px-6 py-4 text-right font-medium text-slate-900 dark:text-white">
                                    <span class="animate-pulse">Active</span>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-700 dark:bg-blue-900/30 dark:text-blue-400">
                                        In Progress
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr
                                class="bg-slate-50 dark:bg-slate-800/50 font-medium border-t border-slate-100 dark:border-slate-800">
                                <td class="px-6 py-4 text-slate-900 dark:text-white" colspan="4">Weekly Total</td>
                                <td class="px-6 py-4 text-right text-slate-900 dark:text-white text-lg">32h 15m</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="space-y-6">
            <div
                class="bg-linear-to-br from-slate-900 to-slate-800 dark:from-card-dark dark:to-slate-900 rounded-xl shadow-lg p-6 text-white relative overflow-hidden group">
                <div
                    class="absolute top-0 right-0 -mr-4 -mt-4 w-24 h-24 bg-white/10 rounded-full blur-2xl group-hover:bg-primary/20 transition-all duration-700">
                </div>
                <div class="flex items-center justify-between mb-4 relative z-10">
                    <h3 class="text-sm font-medium text-slate-300 uppercase tracking-wide">Current Status</h3>
                    <span class="flex h-3 w-3 relative">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-green-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-3 w-3 bg-green-500"></span>
                    </span>
                </div>
                <div class="text-center py-4 relative z-10">
                    <div
                        class="inline-flex items-center justify-center p-3 bg-white/10 rounded-full mb-3 backdrop-blur-sm border border-white/10">
                        <span class="material-icons text-3xl text-green-400">laptop_mac</span>
                    </div>
                    <h2 class="text-2xl font-bold mb-1">Clocked In</h2>
                    <p class="text-slate-300 text-sm">Working Remotely</p>
                </div>
                <div class="mt-4 pt-4 border-t border-white/10 flex justify-between items-center text-sm relative z-10">
                    <span class="text-slate-300">Since 08:55 AM</span>
                    <span class="font-mono bg-white/10 px-2 py-1 rounded text-green-300">04:32:15</span>
                </div>
            </div>
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 flex flex-col">
                <div class="p-4 border-b border-slate-100 dark:border-slate-800 flex justify-between items-center">
                    <h3 class="font-bold text-slate-900 dark:text-white">Requests</h3>
                    <a class="text-xs font-medium text-primary hover:text-primary-hover" href="#">View All</a>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-800">
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center gap-2">
                                <span
                                    class="bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-400 p-1 rounded">
                                    <span class="material-icons text-sm">flight_takeoff</span>
                                </span>
                                <span class="text-sm font-medium text-slate-900 dark:text-white">Time Off</span>
                            </div>
                            <span
                                class="text-[10px] uppercase font-bold text-amber-600 bg-amber-50 dark:bg-amber-900/20 px-2 py-0.5 rounded-full border border-amber-100 dark:border-amber-900/30">Pending</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 ml-8 mb-2">Nov 10 - Nov 12, 2025</p>
                        <div class="flex gap-2 ml-8">
                            <button
                                class="text-xs bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-2 py-1 rounded text-slate-600 dark:text-slate-300 hover:text-primary hover:border-primary transition-colors">Approve</button>
                            <button
                                class="text-xs bg-white dark:bg-slate-800 border border-slate-200 dark:border-slate-700 px-2 py-1 rounded text-slate-600 dark:text-slate-300 hover:text-red-500 hover:border-red-500 transition-colors">Deny</button>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center gap-2">
                                <span
                                    class="bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400 p-1 rounded">
                                    <span class="material-icons text-sm">receipt_long</span>
                                </span>
                                <span class="text-sm font-medium text-slate-900 dark:text-white">Expense</span>
                            </div>
                            <span
                                class="text-[10px] uppercase font-bold text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-0.5 rounded-full border border-green-100 dark:border-green-900/30">Approved</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 ml-8 mb-1">Office Supplies - $45.00</p>
                        <p class="text-[10px] text-slate-400 ml-8">Requested on Oct 20</p>
                    </div>
                    <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                        <div class="flex justify-between items-start mb-1">
                            <div class="flex items-center gap-2">
                                <span class="bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 p-1 rounded">
                                    <span class="material-icons text-sm">laptop</span>
                                </span>
                                <span class="text-sm font-medium text-slate-900 dark:text-white">Equipment</span>
                            </div>
                            <span
                                class="text-[10px] uppercase font-bold text-green-600 bg-green-50 dark:bg-green-900/20 px-2 py-0.5 rounded-full border border-green-100 dark:border-green-900/30">Approved</span>
                        </div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 ml-8 mb-1">New Monitor Request</p>
                        <p class="text-[10px] text-slate-400 ml-8">Requested on Oct 15</p>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
                <h3 class="font-bold text-slate-900 dark:text-white mb-4">Leave Balance</h3>
                <div class="space-y-5">
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-slate-600 dark:text-slate-300">Annual Leave</span>
                            <span class="font-medium text-slate-900 dark:text-white">12 / 20 days</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 rounded-full h-2">
                            <div class="bg-primary h-2 rounded-full" style="width: 60%"></div>
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span class="text-slate-600 dark:text-slate-300">Sick Leave</span>
                            <span class="font-medium text-slate-900 dark:text-white">2 / 10 days</span>
                        </div>
                        <div class="w-full bg-slate-100 dark:bg-slate-700 rounded-full h-2">
                            <div class="bg-amber-400 h-2 rounded-full" style="width: 20%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
