<div
    class="lg:col-span-2 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 flex flex-col">
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
            <button
                class="p-1.5 text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-primary rounded-lg border border-slate-200 dark:border-slate-600 bg-white dark:bg-card-dark">
                <span class="material-icons text-sm">filter_list</span>
            </button>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="w-full text-left text-sm text-slate-600 dark:text-slate-300">
            <thead
                class="bg-slate-50 dark:bg-slate-800 text-xs uppercase font-semibold text-slate-500 dark:text-slate-400">
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
    <div
        class="grow flex items-center justify-between p-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30">
        <p class="text-xs text-slate-400 dark:text-slate-500">Showing 5 of 124 employees</p>
        <div class="flex gap-2">
            <button
                class="px-3 py-1 border border-slate-200 dark:border-slate-600 rounded text-xs dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">Previous</button>
            <button
                class="px-3 py-1 border border-slate-200 dark:border-slate-600 rounded text-xs dark:text-slate-400 hover:bg-white dark:hover:bg-slate-800 transition-colors">Next</button>
        </div>
    </div>
</div>
