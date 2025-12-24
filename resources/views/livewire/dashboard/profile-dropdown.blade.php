@use(Illuminate\Support\Facades\Auth)

<x-dropdown>
    <x-slot name="trigger">
        <div class="hidden md:flex items-center gap-3 pl-4 border-l border-slate-200">
            <div class="text-right">
                <div class="text-sm font-bold text-slate-900">{{ Auth::user()->name }}</div>
                <div class="text-xs text-slate-500">Software Engineer</div>
            </div>
        </div>
    </x-slot>

    <x-dropdown.item label="Logout" wire:click="logout" wire:confirm="Are you sure you want to logout?" />
</x-dropdown>
