<div>
    <x-dropdown>
        <x-slot name="trigger">
            <div class="hidden md:flex items-center gap-3 pl-4 border-l border-slate-200 dark:border-slate-700">
                <div class="text-right">
                    <div class="text-sm font-bold text-slate-900 dark:text-slate-100">{{ $name }}</div>
                    <div class="text-xs text-slate-500 dark:text-slate-400">{{ $role }}</div>
                </div>
            </div>
        </x-slot>

        {{-- Existing Logout --}}
        <x-dropdown.item label="Logout" wire:click="logout" />
    </x-dropdown>
</div>
