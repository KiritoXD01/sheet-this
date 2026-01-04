@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Admin Overview</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-1">Company-wide activity and pending actions.</p>
        </div>
        <div class="flex items-center gap-3">
            <div
                class="flex items-center gap-2 text-sm text-slate-500 dark:text-slate-400 bg-white dark:bg-card-dark px-4 py-2 rounded-lg border border-slate-100 dark:border-slate-700 shadow-sm">
                <span class="material-icons text-primary text-base">calendar_today</span>
                <span>{{ now()->format('l, M j') }}</span>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div
            class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700 relative overflow-hidden group">
            <div class="flex justify-between items-start mb-4 relative z-10">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Employees</div>
                    <div class="flex items-center gap-2 mt-1">
                        <span class="text-2xl font-bold text-slate-900 dark:text-slate-100">124</span>
                    </div>
                </div>
                <div class="bg-slate-50 dark:bg-slate-800 p-2 rounded-lg">
                    <span class="material-icons text-slate-400">groups</span>
                </div>
            </div>
            <div class="text-xs text-slate-500 dark:text-slate-400">
                <span class="text-green-500 font-bold items-center gap-1 inline-flex"><span
                        class="material-icons text-[10px]">arrow_upward</span> 2</span> new this month
            </div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">On the Clock</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">86</div>
                </div>
                <div class="bg-primary/10 p-2 rounded-lg">
                    <span class="material-icons text-primary">timer</span>
                </div>
            </div>
            <div class="w-full bg-slate-100 dark:bg-slate-700 h-2 rounded-full overflow-hidden">
                <div class="bg-primary h-full rounded-full" style="width: 70%"></div>
            </div>
            <div class="mt-2 text-xs text-slate-500 dark:text-slate-400 font-medium">69% of workforce active</div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending Requests</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">12</div>
                </div>
                <div class="bg-orange-50 p-2 rounded-lg">
                    <span class="material-icons text-orange-500">assignment_late</span>
                </div>
            </div>
            <div class="flex items-center gap-2 mt-2">
                <span class="flex h-2 w-2 rounded-full bg-orange-500 animate-ping"></span>
                <span class="text-xs text-orange-600 dark:text-orange-400 font-medium">Requires attention</span>
            </div>
        </div>
        <div class="bg-white dark:bg-card-dark rounded-xl p-6 shadow-soft border border-slate-100 dark:border-slate-700">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <div class="text-sm font-medium text-slate-500 dark:text-slate-400">Late / Absent</div>
                    <div class="text-2xl font-bold text-slate-900 dark:text-slate-100 mt-1">4</div>
                </div>
                <div class="bg-red-50 p-2 rounded-lg">
                    <span class="material-icons text-red-500">warning</span>
                </div>
            </div>
            <div class="flex -space-x-2 overflow-hidden mt-1">
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    JD</div>
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    TS</div>
                <div
                    class="inline-block h-6 w-6 rounded-full ring-2 ring-white dark:ring-card-dark bg-slate-200 items-center justify-center text-[8px] font-bold">
                    AK</div>
            </div>
            <div class="mt-2 text-xs text-red-600 dark:text-red-400 font-medium">3 Unexplained absences</div>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <livewire:admin.recent-requests />
        <livewire:admin.live-attendance />
    </div>
@endsection
