<div>
    {{-- Header with Week Navigation --}}
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Timesheet Management</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Review, edit, and submit your weekly hours.</p>
        </div>
        <div class="flex items-center gap-3">
            <div
                class="flex items-center gap-2 bg-white dark:bg-card-dark p-1 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
                <button
                    wire:click="previousWeek"
                    class="p-2 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md text-slate-500 dark:text-slate-400 transition-colors">
                    <span class="material-icons">chevron_left</span>
                </button>
                <div
                    class="px-4 py-1 flex items-center gap-2 font-medium text-slate-700 dark:text-slate-200 w-48 justify-center">
                    <span class="material-icons text-primary text-sm">date_range</span>
                    <span>{{ $weekStart->format('M d') }} - {{ $weekEnd->format('M d') }}</span>
                </div>
                <button
                    wire:click="nextWeek"
                    class="p-2 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-md text-slate-500 dark:text-slate-400 transition-colors">
                    <span class="material-icons">chevron_right</span>
                </button>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
        {{-- Main Entry Table --}}
        <div class="lg:col-span-3 space-y-6">
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col">
                <div
                    class="p-5 border-b border-slate-100 dark:border-slate-700 flex flex-wrap justify-between items-center bg-slate-50/50 dark:bg-slate-800/50 gap-4">
                    <div class="flex items-center gap-3">
                        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                            <span class="material-symbols-outlined text-slate-400">edit_calendar</span>
                            Weekly Entry
                        </h2>
                        @if($currentTimesheet)
                            @php
                                $statusColors = match($currentTimesheet->status) {
                                    \App\Enums\TimesheetStatusEnum::DRAFT => 'bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400 border-yellow-200 dark:border-yellow-800',
                                    \App\Enums\TimesheetStatusEnum::SUBMITTED => 'bg-blue-100 dark:bg-blue-900/20 text-blue-700 dark:text-blue-400 border-blue-200 dark:border-blue-800',
                                    \App\Enums\TimesheetStatusEnum::APPROVED => 'bg-green-100 dark:bg-green-900/20 text-green-700 dark:text-green-400 border-green-200 dark:border-green-800',
                                    \App\Enums\TimesheetStatusEnum::REJECTED => 'bg-red-100 dark:bg-red-900/20 text-red-700 dark:text-red-400 border-red-200 dark:border-red-800',
                                };
                            @endphp
                            <span class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider {{ $statusColors }} border">
                                {{ $currentTimesheet->status->label() }}
                            </span>
                        @else
                            <span
                                class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400 border border-slate-200 dark:border-slate-700">
                                New
                            </span>
                        @endif
                    </div>
                    <div class="flex gap-2">
                        <button
                            wire:click="addItem"
                            class="text-slate-500 dark:text-slate-400 hover:text-primary transition-colors text-sm font-medium flex items-center gap-1 px-3 py-1.5 rounded hover:bg-slate-100 dark:hover:bg-slate-800">
                            <span class="material-icons text-base">add</span> Add Row
                        </button>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm border-collapse">
                        <thead class="bg-slate-50 dark:bg-slate-800 border-b border-slate-100 dark:border-slate-700">
                            <tr>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-32">Date</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-48">Project</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 min-w-[200px]">
                                    Description</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-28">Start</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-28">End</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-20 text-center">Billable</th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-20 text-right">Total
                                </th>
                                <th class="px-4 py-3 font-semibold text-slate-500 dark:text-slate-400 w-12"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 dark:divide-slate-700">
                            @foreach ($items as $index => $item)
                                <tr wire:key="item-{{ $index }}" class="group hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                                    <td class="px-4 py-3 align-middle">
                                        <input
                                            wire:model.live="items.{{ $index }}.item_date"
                                            class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm"
                                            type="date" />
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <x-select
                                            wire:model.live="items.{{ $index }}.project_id"
                                            class="w-full"
                                            placeholder="Select project"
                                            :options="$projects"
                                            option-label="label"
                                            option-value="value" />
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <input
                                            wire:model.live="items.{{ $index }}.description"
                                            class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                            type="text" placeholder="Enter description" />
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <input
                                            wire:model.live="items.{{ $index }}.start_time"
                                            class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                            type="time" />
                                    </td>
                                    <td class="px-4 py-3 align-middle">
                                        <input
                                            wire:model.live="items.{{ $index }}.end_time"
                                            class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                            type="time" />
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <x-toggle
                                            wire:model.live="items.{{ $index }}.is_billable"
                                            sm />
                                    </td>
                                    <td class="px-4 py-3 align-middle text-right">
                                        <span class="font-mono font-bold text-slate-700 dark:text-slate-200">
                                            {{ number_format($this->calculateHours($item['start_time'] ?? '00:00', $item['end_time'] ?? '00:00'), 2) }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-3 align-middle text-center">
                                        <button
                                            wire:click="removeItem({{ $index }})"
                                            class="text-slate-400 hover:text-red-500 opacity-0 group-hover:opacity-100 transition-all p-1">
                                            <span class="material-icons text-lg">delete_outline</span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="bg-slate-50 dark:bg-slate-800 border-t border-slate-100 dark:border-slate-700">
                            <tr>
                                <td class="px-4 py-4 text-right" colspan="6">
                                    <div class="text-sm font-semibold text-slate-500 dark:text-slate-400">Total Hours</div>
                                </td>
                                <td class="px-4 py-4 text-right">
                                    <div class="font-mono font-bold text-slate-900 dark:text-slate-100 text-xl">{{ number_format($totalHours, 2) }}</div>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td class="px-4 py-4 text-right" colspan="8">
                                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-100 mb-4 flex items-center gap-2">
                                        <span class="material-symbols-outlined text-slate-400">sticky_note_2</span>
                                        Notes
                                    </h3>
                                    <textarea
                                        wire:model="notes"
                                        class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-slate-50 dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm p-4"
                                        placeholder="Add any comments or justifications for this week's hours..." rows="3"></textarea>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div
                    class="p-6 border-t border-slate-100 dark:border-slate-700 flex justify-between items-center bg-white dark:bg-slate-900">
                    <button
                        wire:click="clearAll"
                        class="text-red-500 hover:text-red-700 text-sm font-medium transition-colors">
                        Clear All
                    </button>
                    <div class="flex gap-3">
                        <button
                            wire:click="saveDraft"
                            class="px-6 py-2.5 text-sm font-medium text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800 rounded-lg transition-colors border border-transparent hover:border-slate-200 dark:hover:border-slate-600">
                            Save Draft
                        </button>
                        <button
                            wire:click="submit"
                            class="px-6 py-2.5 text-sm font-medium text-white bg-primary hover:bg-primary-hover rounded-lg shadow-glow transition-all active:scale-95 flex items-center gap-2">
                            <span class="material-icons text-sm">send</span> Submit for Approval
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="lg:col-span-1 space-y-6">
            {{-- Summary Card --}}
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
                                    class="text-xs font-semibold inline-block text-slate-600 dark:text-slate-300">{{ number_format($this->billableHours, 1) }}h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100 dark:bg-slate-700">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-primary transition-all duration-300"
                                style="width: {{ $this->billablePercentage }}%"></div>
                        </div>
                    </div>
                    <div class="relative pt-1">
                        <div class="flex mb-2 items-center justify-between">
                            <div>
                                <span class="text-xs font-semibold inline-block text-blue-500 uppercase">Non-Billable</span>
                            </div>
                            <div class="text-right">
                                <span
                                    class="text-xs font-semibold inline-block text-slate-600 dark:text-slate-300">{{ number_format($this->nonBillableHours, 1) }}h</span>
                            </div>
                        </div>
                        <div class="overflow-hidden h-2 mb-4 text-xs flex rounded bg-slate-100 dark:bg-slate-700">
                            <div class="shadow-none flex flex-col text-center whitespace-nowrap text-white justify-center bg-blue-500 transition-all duration-300"
                                style="width: {{ 100 - $this->billablePercentage }}%"></div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent History Card --}}
            <div
                class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
                <div class="p-4 border-b border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/50">
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                        <span class="material-symbols-outlined text-slate-400 dark:text-slate-500">history</span>
                        Recent History
                    </h3>
                </div>
                <div class="divide-y divide-slate-100 dark:divide-slate-700">
                    @forelse($this->recentTimesheets as $timesheet)
                        <div class="p-4 hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors cursor-pointer group">
                            <div class="flex justify-between items-start mb-1">
                                <div class="text-sm font-medium text-slate-900 dark:text-slate-100">{{ $timesheet['week_range'] }}</div>
                                <span
                                    class="material-icons text-slate-300 dark:text-slate-500 text-sm group-hover:text-primary transition-colors">chevron_right</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="text-xs text-slate-500 dark:text-slate-400">{{ $timesheet['total_hours'] }} Hours</div>
                                @php
                                    $statusBadge = match($timesheet['status']) {
                                        \App\Enums\TimesheetStatusEnum::APPROVED => 'text-green-600 dark:text-green-400 bg-green-50 dark:bg-green-900/20 border-green-100 dark:border-green-800',
                                        \App\Enums\TimesheetStatusEnum::SUBMITTED => 'text-blue-600 dark:text-blue-400 bg-blue-50 dark:bg-blue-900/20 border-blue-100 dark:border-blue-800',
                                        default => 'text-slate-600 dark:text-slate-400 bg-slate-50 dark:bg-slate-900/20 border-slate-100 dark:border-slate-800',
                                    };
                                @endphp
                                <span
                                    class="text-[10px] font-bold uppercase tracking-wider {{ $statusBadge }} px-2 py-1 rounded-full border">{{ $timesheet['status']->label() }}</span>
                            </div>
                        </div>
                    @empty
                        <div class="p-4 text-center text-sm text-slate-500 dark:text-slate-400">
                            No previous timesheets
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
