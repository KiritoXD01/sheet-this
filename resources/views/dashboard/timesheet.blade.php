@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Timesheet Management</h1>
            <p class="text-slate-500 mt-1">Review, edit, and submit your weekly hours.</p>
        </div>
        <div class="flex items-center gap-3">
            <div class="flex items-center gap-2 bg-white p-1 rounded-lg border border-slate-100 shadow-sm">
                <button class="p-2 hover:bg-slate-50 rounded-md text-slate-500 transition-colors">
                    <span class="material-icons">chevron_left</span>
                </button>
                <div class="px-4 py-1 flex items-center gap-2 font-medium text-slate-700 w-48 justify-center">
                    <span class="material-icons text-primary text-sm">date_range</span>
                    <span>Oct 23 - Oct 29, 2025</span>
                </div>
                <button class="p-2 hover:bg-slate-50 rounded-md text-slate-500 transition-colors">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
            <button
                class="hidden md:flex bg-white text-slate-600 px-4 py-2.5 rounded-lg border border-slate-100 hover:text-primary transition-colors font-medium text-sm items-center gap-2 shadow-sm">
                <span class="material-icons text-sm">print</span> Print
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        <div class="lg:col-span-3 space-y-6">
            <div class="bg-white rounded-xl shadow-soft border border-slate-100 overflow-hidden flex flex-col">
                <div class="p-5 border-b border-slate-100 flex flex-wrap justify-between items-center bg-slate-50/50 gap-4">
                    <div class="flex items-center gap-3">
                        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                            <span class="material-symbols-outlined text-slate-400">edit_calendar</span>
                            Weekly Entry
                        </h2>
                        <span
                            class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-yellow-100 text-yellow-700 border border-yellow-200">
                            Draft
                        </span>
                    </div>
                    <div class="flex gap-2">
                        <button
                            class="text-slate-500 hover:text-primary transition-colors text-sm font-medium flex items-center gap-1 px-3 py-1.5 rounded hover:bg-slate-100">
                            <span class="material-icons text-base">content_copy</span> Copy Previous Week
                        </button>
                        <button
                            class="text-slate-500 hover:text-primary transition-colors text-sm font-medium flex items-center gap-1 px-3 py-1.5 rounded hover:bg-slate-100">
                            <span class="material-icons text-base">add</span> Add Row
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead class="bg-slate-50 border-b border-slate-100">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-32">Date</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-48">Project</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 min-w-[200px]">
                                    Description</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-28">Start</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-28">End</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-20 text-right">Total
                                </th>
                                <th class="px-4 py-3 font-semibold text-slate-500 w-12"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr class="group hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 align-middle">
                                    <div class="font-medium text-slate-900">Mon, Oct 23</div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <select
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm">
                                        <option>Website Redesign</option>
                                        <option>Internal Meeting</option>
                                        <option>Client Support</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                        type="text" value="Homepage layout implementation and responsive testing" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="09:00" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="17:00" />
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="font-mono font-bold text-slate-700">8.00</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <button
                                        class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 align-middle">
                                    <div class="font-medium text-slate-900">Tue, Oct 24</div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <select
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm">
                                        <option>Website Redesign</option>
                                        <option selected="">Internal Meeting</option>
                                        <option>Client Support</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                        type="text" value="Sprint planning and team sync" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="09:00" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="13:00" />
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="font-mono font-bold text-slate-700">4.00</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <button
                                        class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 align-middle">
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <select
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm">
                                        <option selected="">Website Redesign</option>
                                        <option>Internal Meeting</option>
                                        <option>Client Support</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                        type="text" value="Component library development" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="13:30" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="18:00" />
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="font-mono font-bold text-slate-700">4.50</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <button
                                        class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 align-middle">
                                    <div class="font-medium text-slate-900">Wed, Oct 25</div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <select
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm">
                                        <option>Website Redesign</option>
                                        <option>Internal Meeting</option>
                                        <option selected="">Client Support</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                        type="text" value="Fixing urgent bug reports" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="09:00" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="17:00" />
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="font-mono font-bold text-slate-700">8.00</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <button
                                        class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </td>
                            </tr>
                            <tr class="group hover:bg-slate-50 transition-colors">
                                <td class="px-4 py-3 align-middle">
                                    <div class="font-medium text-slate-900">Thu, Oct 26</div>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <select
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm">
                                        <option selected="">Website Redesign</option>
                                        <option>Internal Meeting</option>
                                        <option>Client Support</option>
                                    </select>
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                        type="text" value="Testing phase 1" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="09:00" />
                                </td>
                                <td class="px-4 py-3 align-middle">
                                    <input
                                        class="w-full rounded border-slate-200 bg-white text-slate-700 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                        type="time" value="17:00" />
                                </td>
                                <td class="px-4 py-3 align-middle text-right">
                                    <span class="font-mono font-bold text-slate-700">8.00</span>
                                </td>
                                <td class="px-4 py-3 align-middle text-center">
                                    <button
                                        class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                        <span class="material-icons text-lg">delete_outline</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                        <tfoot class="bg-slate-50 border-t border-slate-100">
                            <tr>
                                <td class="px-4 py-4 text-right" colspan="5">
                                    <div class="text-sm font-semibold text-slate-500">Total Hours</div>
                                    <div class="text-xs text-slate-400 font-normal">Regular: 32.50 | Overtime: 0.00</div>
                                </td>
                                <td class="px-4 py-4 text-right">
                                    <div class="font-mono font-bold text-slate-900 text-xl">32.50</div>
                                </td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="p-6 border-t border-slate-100 flex justify-between items-center bg-white">
                    <button class="text-red-500 hover:text-red-700 text-sm font-medium transition-colors">
                        Clear All
                    </button>
                    <div class="flex gap-3">
                        <button
                            class="px-6 py-2.5 text-sm font-medium text-slate-600 hover:bg-slate-50 rounded-lg transition-colors border border-transparent hover:border-slate-200">
                            Save Draft
                        </button>
                        <button
                            class="px-6 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary-hover rounded-lg shadow-glow transition-all active:scale-95 flex items-center gap-2">
                            <span class="material-icons text-sm">send</span> Submit for Approval
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
                <h3 class="text-sm font-bold text-slate-900 mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-slate-400">sticky_note_2</span>
                    Weekly Notes
                </h3>
                <textarea
                    class="w-full rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary text-sm p-4"
                    placeholder="Add any comments or justifications for this week's hours..." rows="3"></textarea>
            </div>
        </div>
        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white rounded-xl shadow-soft border border-slate-100 p-6">
                <h3
                    class="text-sm font-bold text-slate-900 uppercase tracking-wider mb-6 flex items-center justify-between">
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
                                <span class="text-xs font-semibold inline-block text-slate-600">28.0h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary"
                                style="width: 86%"></div>
                        </div>
                    </div>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span
                                    class="text-xs font-semibold inline-block text-blue-500 uppercase">Non-Billable</span>
                            </div>
                            <div class="text-right">
                                <span class="text-xs font-semibold inline-block text-slate-600">4.5h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500"
                                style="width: 14%"></div>
                        </div>
                    </div>
                </div>
                <div class="mt-6 pt-6 border-t border-slate-100 grid grid-cols-2 gap-4">
                    <div class="bg-slate-50 p-3 rounded-lg text-center">
                        <div class="text-xs text-slate-500 mb-1">Utilization</div>
                        <div class="text-lg font-bold text-slate-900">86%</div>
                    </div>
                    <div class="bg-slate-50 p-3 rounded-lg text-center">
                        <div class="text-xs text-slate-500 mb-1">Total Pay</div>
                        <div class="text-lg font-bold text-slate-900">$1.4k</div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-4 border-b border-slate-100 bg-slate-50/30">
                    <h3 class="text-sm font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-slate-400">history</span>
                        Recent History
                    </h3>
                </div>
                <div class="divide-y divide-slate-100">
                    <div class="p-4 hover:bg-slate-50 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900">Oct 16 - Oct 22</div>
                            <span
                                class="material-icons text-slate-300 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500">40.00 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 bg-green-50 px-2 py-1 rounded-full border border-green-100">Approved</span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-slate-50 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900">Oct 09 - Oct 15</div>
                            <span
                                class="material-icons text-slate-300 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500">38.50 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 bg-green-50 px-2 py-1 rounded-full border border-green-100">Approved</span>
                        </div>
                    </div>
                    <div class="p-4 hover:bg-slate-50 transition-colors cursor-pointer group">
                        <div class="flex justify-between items-start mb-1">
                            <div class="text-sm font-medium text-slate-900">Oct 02 - Oct 08</div>
                            <span
                                class="material-icons text-slate-300 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="text-xs text-slate-500">40.00 Hours</div>
                            <span
                                class="text-[10px] font-bold uppercase tracking-wider text-green-600 bg-green-50 px-2 py-1 rounded-full border border-green-100">Paid</span>
                        </div>
                    </div>
                </div>
                <div class="p-3 text-center border-t border-slate-100 bg-slate-50/30">
                    <button class="text-xs font-bold text-primary hover:text-primary-hover uppercase tracking-wide">View
                        All History</button>
                </div>
            </div>
        </div>
    </div>
@endsection
