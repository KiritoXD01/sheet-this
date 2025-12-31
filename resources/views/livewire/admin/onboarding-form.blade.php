@use(App\Enums\IndustryEnum)

<form wire:submit="submit" class="p-6 md:p-8 space-y-6">
    <!-- Company Name -->
    <div class="space-y-1.5">
        <x-input label="Company Name" placeholder="e.g. Acme Corporation" wire:model="name" />
    </div>

    <!-- Industry -->
    <div class="space-y-1.5">
        <x-select label="Industry" wire:model="industry">
            @foreach (IndustryEnum::cases() as $industry)
                <x-select.option :label="$industry->label()" :value="$industry->value" />
            @endforeach
        </x-select>
    </div>

    <!-- Submit Button -->
    <button type="submit" wire:loading.attr="disabled"
        class="w-full px-5 py-3 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow dark:shadow-glow-dark transition-all active:scale-95 flex items-center justify-center gap-2 disabled:opacity-50">
        <span wire:loading.remove class="material-icons text-lg">check_circle</span>
        <span wire:loading class="material-icons text-lg animate-spin">refresh</span>
        <span wire:loading.remove>Complete Setup</span>
        <span wire:loading>Setting up your company...</span>
    </button>
</form>
