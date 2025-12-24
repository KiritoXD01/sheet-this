<div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
    <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
        <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
            <span class="material-symbols-outlined text-primary">groups</span>
            Departments
        </h2>
        <button type="button"
            class="cursor-pointer text-xs bg-white border border-slate-200 hover:border-primary text-slate-600 px-2 py-1 rounded shadow-sm transition-colors flex items-center gap-1">
            <span class="material-icons text-xs">add</span> New
        </button>
    </div>
    <div class="divide-y divide-slate-100">
        @foreach ($departments as $department)
            <div class="p-4 flex items-center justify-between group hover:bg-slate-50 transition-colors">
                <div>
                    <div class="font-medium text-slate-900">{{ $department->name }}</div>
                    <div class="text-xs text-slate-500">12 Employees</div>
                </div>
                <div
                    class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity cursor-pointer">
                    <button class="text-slate-400 hover:text-primary">
                        <span class="material-icons text-lg">edit</span>
                    </button>
                </div>
            </div>
        @endforeach
    </div>
    <div class="p-4 bg-slate-50 border-t border-slate-100 text-center">
        <button class="text-sm text-primary hover:text-primary-hover font-medium">View all departments</button>
    </div>
</div>
