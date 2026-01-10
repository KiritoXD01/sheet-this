<form wire:submit="submit" class="space-y-8">
    <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                <span class="material-icons text-lg">person</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white">Personal Information</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Update basic employee details</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <x-input wire:model="name" label="Full Name" placeholder="Full Name" icon="user" />
            <x-input wire:model="email" type="email" label="Email Address" placeholder="Email Address"
                description="This email will be used for login and notifications." />
            <x-input wire:model="employee_code" label="Employee Code" placeholder="Employee Code" />
        </div>
    </div>

    <div class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-800 p-6">
        <div class="flex items-center gap-3 mb-6">
            <div class="h-10 w-10 rounded-lg bg-primary/10 text-primary flex items-center justify-center">
                <span class="material-icons text-lg">work</span>
            </div>
            <div>
                <h2 class="text-xl font-bold text-slate-900 dark:text-white">Employment Details</h2>
                <p class="text-sm text-slate-500 dark:text-slate-400">Update job and department information</p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="space-y-1.5">
                <x-select wire:model="job_role_id" label="Job Role / Title" placeholder="Select one job role"
                    :options="$jobRoles" option-label="name" option-value="id" />
            </div>
            <div class="space-y-1.5">
                <x-select wire:model="department_id" label="Department" placeholder="Select department"
                    :options="$departments" option-label="name" option-value="id" />
            </div>
        </div>
    </div>

    <div class="flex flex-col sm:flex-row gap-4 justify-end">
        <a href="{{ route('admin.employees.show', $employee->id) }}"
            class="px-6 py-3 rounded-lg bg-white dark:bg-slate-800 hover:bg-slate-50 dark:hover:bg-slate-700 text-slate-700 dark:text-slate-300 font-medium border border-slate-200 dark:border-slate-700 transition-all active:scale-95 flex items-center justify-center gap-2">
            <span class="material-icons text-sm">close</span>
            Cancel
        </a>
        <button type="submit"
            class="px-6 py-3 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium shadow-glow transition-all active:scale-95 flex items-center justify-center gap-2">
            <span class="material-icons text-sm">save</span>
            Update Employee
        </button>
    </div>
</form>
