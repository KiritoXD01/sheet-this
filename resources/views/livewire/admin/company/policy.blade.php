@use(App\Enums\WorkWeekDaysEnum)

<form wire:submit="save" id="policy-form" class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">policy</span>
            Company Policies
        </h2>
    </div>
    <div class="p-6 space-y-6">
        <div>
            <x-select wire:model="timezone" :options="$timezones" placeholder="Select Timezone" label="Default Timezone" />
        </div>
        <div>
            <x-input wire:model="standardWorkDay" type="number" label="Standard Work Day" suffix="hours" />
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700 mb-2">Work Week</label>
            <div class="flex gap-1">
                @foreach (WorkWeekDaysEnum::cases() as $day)
                    <x-work-week-item :day="$day->value" :label="$day->initial()" :active="in_array($day->value, $workWeek)" />
                @endforeach
            </div>
            <x-errors only="workWeek" class="mt-4" />
        </div>
        <div>
            <x-toggle wire:model="allowOvertime" id="allow-overtime" left-label="Allow Overtime" />
        </div>
    </div>
    <div class="p-6 border-t border-slate-100">
        <button type="submit" form="policy-form"
            class="w-full cursor-pointer bg-primary hover:bg-primary-hover text-white px-6 py-2 rounded-lg text-sm font-bold shadow-glow transition-all active:scale-95 flex items-center justify-center gap-2">
            <span wire:loading.remove class="material-icons text-sm">save</span>
            <span wire:loading class="material-icons text-sm animate-spin">refresh</span>
            <span wire:loading.remove>Save General Information</span>
            <span wire:loading>Updating...</span>
        </button>
    </div>
</form>
