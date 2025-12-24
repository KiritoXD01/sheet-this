<x-dropdown>
    <x-slot name="trigger">
        <div class="hidden md:flex items-center gap-3 pl-4 border-l border-slate-200">
            <div class="text-right">
                <div class="text-sm font-bold text-slate-900">{{ $name }}</div>
                <div class="text-xs text-slate-500">{{ $role }}</div>
            </div>
        </div>
    </x-slot>

    <x-dropdown.item label="Logout" wire:click="logout" />
</x-dropdown>
