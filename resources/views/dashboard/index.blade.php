@extends('layouts.dashboard')


@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Dashboard</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Welcome back! {{ $name }} Here's what's happening
                today.</p>
        </div>
        <div
            class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-white dark:bg-card-dark px-4 py-2 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
            <span class="material-icons text-primary text-base">calendar_today</span>
            <span>{{ now()->format('l, F j, Y') }}</span>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700 relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-primary/5 dark:bg-primary/10 rounded-bl-full -mr-4 -mt-4 transition-transform group-hover:scale-110">
            </div>
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Current Status</div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-600"></span>
                        <span class="font-bold text-slate-900 dark:text-slate-100">Clocked Out</span>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-2 rounded-lg">
                    <span class="material-icons text-slate-400">timer</span>
                </div>
            </div>
            <div class="text-2xl font-mono text-slate-400 dark:text-slate-500 mb-4">00:00:00</div>
            <button
                class="w-full bg-primary hover:bg-primary-hover text-white py-2.5 rounded-lg text-sm font-semibold shadow-glow dark:shadow-glow-dark transition-all active:scale-95 flex items-center justify-center gap-2">
                <span class="material-icons text-sm">login</span> Clock In
            </button>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Weekly Hours</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">32.5 <span
                            class="text-sm font-normal text-slate-400 dark:text-slate-500">/ 40</span></div>
                </div>
                <div class="bg-blue-50 dark:bg-blue-900/20 p-2 rounded-lg">
                    <span class="material-icons text-blue-500">schedule</span>
                </div>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-800 h-2 rounded-full overflow-hidden">
                <div class="bg-blue-500 h-full rounded-full" style="width: 81%"></div>
            </div>
            <div class="mt-2 text-xs text-blue-600 dark:text-blue-400 font-medium">On track for the week</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Days Worked</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">4</div>
                </div>
                <div class="bg-emerald-50 dark:bg-emerald-900/20 p-2 rounded-lg">
                    <span class="material-icons text-emerald-500">calendar_view_week</span>
                </div>
            </div>
            <div class="flex gap-1 mt-3">
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-emerald-500 rounded-full"></div>
                <div class="h-1.5 flex-1 bg-slate-200 dark:bg-slate-700 rounded-full"></div>
            </div>
            <div class="mt-2 text-xs text-emerald-600 dark:text-emerald-400 font-medium">4 day streak!</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Location Status</div>
                    <div class="text-lg font-bold text-slate-900 dark:text-slate-100 mt-1">Verified</div>
                </div>
                <div class="bg-orange-50 dark:bg-orange-900/20 p-2 rounded-lg animate-pulse">
                    <span class="material-icons text-orange-500">my_location</span>
                </div>
            </div>
            <div
                class="flex items-center gap-2 mt-2 bg-slate-50 dark:bg-slate-800 p-2 rounded border border-slate-100 dark:border-slate-700">
                <span class="material-icons text-slate-400 text-sm">place</span>
                <span class="text-xs text-slate-600 dark:text-slate-300 truncate">Home Office (Verified IP)</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <livewire:employee.request.create />
        <livewire:employee.request.most-recent />
    </div>
@endsection
