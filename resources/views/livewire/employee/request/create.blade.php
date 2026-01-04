<form id="request-form"
    class="lg:col-span-1 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
    <div class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">beach_access</span>
            Request Time Off
        </h2>
    </div>
    <div class="p-6 space-y-4">
        <div>
            <x-select label="Request Type" placeholder="Select a request type" :options="$request_types" option-label="label"
                option-value="value" wire:model="request_type" />
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">Start
                    Date</label>
                <input
                    class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                    type="date" wire:model="start_date" />
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">End
                    Date</label>
                <input
                    class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                    type="date" wire:model="end_date" />
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 dark:text-slate-200 mb-1">Notes
                (Optional)</label>
            <textarea
                class="w-full rounded-lg border-slate-200 dark:border-slate-600 bg-white dark:bg-slate-800 text-slate-900 dark:text-slate-100 focus:ring-primary focus:border-primary text-sm"
                placeholder="Brief description..." rows="3" wire:model="notes"></textarea>
        </div>
        <div class="pt-2">
            <button type="submit" form="request-form"
                class="w-full bg-slate-900 dark:bg-slate-700 text-white hover:bg-slate-800 dark:hover:bg-slate-600 py-3 rounded-lg font-medium transition-colors shadow-lg shadow-slate-900/10">
                Submit Request
            </button>
        </div>
    </div>
</form>
