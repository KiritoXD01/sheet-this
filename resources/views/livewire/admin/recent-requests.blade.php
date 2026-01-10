<div
    class="lg:col-span-1 bg-white dark:bg-card-dark rounded-2xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden flex flex-col h-full">
    <div
        class="p-6 border-b border-slate-100 dark:border-slate-700 bg-slate-50/50 dark:bg-slate-800/50 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2">
            <span class="material-symbols-outlined text-orange-500">notifications_active</span>
            Approvals
        </h2>
        @if ($requests->count() > 0)
            <span
                class="bg-orange-100 dark:bg-orange-900/30 text-orange-700 dark:text-orange-400 text-xs font-bold px-2 py-0.5 rounded-full">
                {{ $requests->count() }} New
            </span>
        @endif
    </div>
    <div class="p-4 space-y-4 overflow-y-auto max-h-[500px]">
        @forelse ($requests as $request)
            <div
                class="bg-white dark:bg-slate-800/50 p-4 rounded-xl border border-slate-100 dark:border-slate-700 shadow-sm">
                <div class="flex justify-between items-start mb-2">
                    <div class="flex items-center gap-3">
                        <div
                            class="h-8 w-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs font-bold">
                            {{ $request->employee->user->initials }}
                        </div>
                        <div>
                            <h4 class="text-sm font-bold text-slate-900 dark:text-slate-100">
                                {{ $request->employee->user->name }}</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400">
                                {{ $request->employee->department?->name ?? 'No Department' }}</p>
                        </div>
                    </div>
                    <span
                        class="text-[10px] font-mono text-slate-400 dark:text-slate-500">{{ $request->created_at->diffForHumans() }}</span>
                </div>
                <div class="mb-3">
                    <div class="flex items-center gap-2 mb-1">
                        <span class="w-1.5 h-1.5 rounded-full bg-purple-500"></span>
                        <span
                            class="text-xs font-semibold text-slate-700 dark:text-slate-300">{{ $request->request_type->label() }}</span>
                    </div>
                    <p class="text-xs text-slate-500 dark:text-slate-400 pl-3.5">
                        {{ $request->start_date->format('M d') }} - {{ $request->end_date->format('M d') }}
                        ({{ $request->days }}
                        {{ $request->days == 1 ? 'Day' : 'Days' }})
                    </p>
                </div>
                <div class="flex gap-2">
                    <button
                        class="flex-1 bg-slate-100 dark:bg-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 text-slate-600 dark:text-slate-300 py-1.5 rounded-lg text-xs font-medium transition-colors cursor-pointer"
                        wire:click="reject({{ $request->id }})">
                        Deny
                    </button>
                    <button wire:click="approve({{ $request->id }})"
                        class="flex-1 bg-primary hover:bg-primary-hover text-white py-1.5 rounded-lg text-xs font-medium transition-colors shadow-sm cursor-pointer">
                        Approve
                    </button>
                </div>
            </div>
        @empty
            <div class="p-12 text-center">
                <span class="material-symbols-outlined text-slate-300 dark:text-slate-600 text-6xl">check_circle</span>
                <p class="text-slate-500 dark:text-slate-400 mt-4 text-sm">All caught up! No approvals needed.</p>
            </div>
        @endforelse
    </div>
    @if ($requests->count() > 0)
        <div
            class="p-4 border-t border-slate-100 dark:border-slate-700 bg-slate-50/30 dark:bg-slate-800/30 text-center">
            <button class="text-sm text-primary hover:text-primary-hover font-medium">View All Requests</button>
        </div>
    @endif
</div>
