<div
    class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col">
    <div
        class="p-5 border-b border-slate-100 dark:border-slate-700 flex flex-wrap justify-between items-center bg-slate-50/50 dark:bg-slate-800/50 gap-4">
        <div class="flex items-center gap-3">
            <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
                <span class="material-symbols-outlined text-slate-400">edit_calendar</span>
                Weekly Entry
            </h2>
            <span
                class="px-2.5 py-0.5 rounded-full text-xs font-bold uppercase tracking-wider bg-yellow-100 dark:bg-yellow-900/20 text-yellow-700 dark:text-yellow-400 border border-yellow-200 dark:border-yellow-800">
                Draft
            </span>
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
                    <tr class="group hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">
                        <td class="px-4 py-3 align-middle">
                            <input
                                wire:model="items.{{ $index }}.item_date"
                                class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 focus:ring-primary focus:border-primary shadow-sm"
                                type="date" />
                        </td>
                        <td class="px-4 py-3 align-middle">
                            <x-select
                                wire:model="items.{{ $index }}.project_id"
                                class="w-full"
                                placeholder="Select project"
                                :options="$projects"
                                option-label="label"
                                option-value="value" />
                        </td>
                        <td class="px-4 py-3 align-middle">
                            <input
                                wire:model="items.{{ $index }}.description"
                                class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-3 focus:ring-primary focus:border-primary shadow-sm"
                                type="text" placeholder="Enter description" />
                        </td>
                        <td class="px-4 py-3 align-middle">
                            <input
                                wire:model="items.{{ $index }}.start_time"
                                class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                type="time" />
                        </td>
                        <td class="px-4 py-3 align-middle">
                            <input
                                wire:model="items.{{ $index }}.end_time"
                                class="w-full rounded border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-700 dark:text-slate-200 text-xs py-2 px-2 focus:ring-primary focus:border-primary shadow-sm"
                                type="time" />
                        </td>
                        <td class="px-4 py-3 align-middle text-center">
                            <x-toggle
                                wire:model="items.{{ $index }}.is_billable"
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
            wire:click="reset(['notes', 'items']); $nextTick(() => addItem())"
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
