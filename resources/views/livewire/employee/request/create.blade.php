<form id="request-form" autocomplete="off" wire:submit="save"
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
                <x-input type="date" wire:model="start_date" label="Start date" />
            </div>
            <div>
                <x-input type="date" wire:model="end_date" label="End date" />
            </div>
        </div>
        <div>
            <x-textarea label="Notes (Optional)" wire:model="notes" rows="3" />
        </div>
        <div class="pt-2">
            <button type="submit" form="request-form"
                class="w-full bg-slate-900 dark:bg-slate-700 text-white hover:bg-slate-800 dark:hover:bg-slate-600 py-3 rounded-lg font-medium transition-colors shadow-lg shadow-slate-900/10 cursor-pointer">
                Submit Request
            </button>
        </div>
    </div>
</form>
