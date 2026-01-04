<form wire:submit="submit" id="employee-create-form" autocomplete="off"
    class="bg-white dark:bg-card-dark rounded-xl shadow-soft border border-slate-100 dark:border-slate-700 overflow-hidden">
    <div class="p-6 md:p-8 space-y-8">
        <section>
            <h2
                class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100 dark:border-slate-700">
                <span class="material-symbols-outlined text-primary">person</span>
                Personal Information
            </h2>
            <div class="space-y-6">
                <div class="flex items-start gap-6">
                    <div class="shrink-0">
                        <div
                            class="w-24 h-24 rounded-full bg-slate-100 dark:bg-slate-800 border-2 border-dashed border-slate-300 dark:border-slate-600 flex items-center justify-center hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors cursor-pointer">
                            <span class="material-icons text-slate-400 text-3xl">account_circle</span>
                        </div>
                        <button class="mt-2 w-full text-xs text-primary hover:text-primary-hover font-medium">
                            Upload Photo
                        </button>
                    </div>
                    <div class="flex-1 space-y-1.5">
                        <label class="block text-sm font-medium text-slate-700 dark:text-slate-300">
                            Profile Picture
                        </label>
                        <p class="text-sm text-slate-500 dark:text-slate-400">Upload a professional headshot.
                            Recommended size: 400x400px.
                            Max file size: 5MB.</p>
                        <input type="file" accept="image/*" class="hidden" />
                    </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-1.5 md:col-span-2">
                        <x-input wire:model="name" label="Full Name" placeholder="Full Name" icon="user" />
                    </div>
                    <div class="space-y-1.5 md:col-span-2">
                        <x-input wire:model="email" type="email" label="Email Address" placeholder="Email Address"
                            description="This email will be used for login and notifications." />
                    </div>
                </div>
            </div>
        </section>
        <section>
            <h2
                class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100 dark:border-slate-700">
                <span class="material-symbols-outlined text-primary">work</span>
                Employment Details
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1.5">
                    <x-select wire:model="job_role_id" label="Job Role / Title" placeholder="Select one job role"
                        :options="$jobRoles" option-label="name" option-value="id" />
                </div>
                <div class="space-y-1.5">
                    <x-select wire:model="department_id" label="Department" placeholder="Select department"
                        :options="$departments" option-label="name" option-value="id" />
                </div>
                <div class="space-y-1.5">
                    <x-input wire:model="employee_code" label="Employee ID" placeholder="Employee ID" icon="user" />
                </div>
            </div>
        </section>
        <section>
            <h2
                class="text-lg font-bold text-slate-900 dark:text-slate-100 flex items-center gap-2 mb-6 pb-2 border-b border-slate-100 dark:border-slate-700">
                <span class="material-symbols-outlined text-primary">lock</span>
                Security
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="space-y-1.5">
                    <x-input wire:model="password" type="password" label="Password" placeholder="Password"
                        description="Must be at least 8 characters long." />
                </div>
                <div class="space-y-1.5">
                    <x-input wire:model="password_confirmation" type="password" label="Confirm Password"
                        placeholder="Confirm Password" description="Must match the password." />
                </div>
            </div>
            <div
                class="mt-6 bg-blue-50 dark:bg-blue-900/20 border border-blue-100 dark:border-blue-800 rounded-lg p-4 flex gap-3">
                <span class="material-icons text-blue-500 dark:text-blue-400 mt-0.5">info</span>
                <div>
                    <h4 class="text-sm font-semibold text-blue-900 dark:text-blue-300">Profile Activation</h4>
                    <p class="text-sm text-blue-700 dark:text-blue-400 mt-0.5">The employee will receive an email
                        notification with their login credentials and a link to verify their account.</p>
                </div>
            </div>
        </section>
    </div>
    <div
        class="bg-slate-50 dark:bg-slate-800/50 border-t border-slate-100 dark:border-slate-700 px-6 py-4 flex justify-end gap-3 rounded-b-xl">
        <a href="{{ route('admin.employees.index') }}"
            class="px-5 py-2.5 rounded-lg border border-slate-200 dark:border-slate-600 text-slate-600 dark:text-slate-300 font-medium text-sm hover:bg-white dark:hover:bg-slate-700 transition-colors shadow-sm">
            Cancel
        </a>
        <button type="submit"
            class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow transition-all active:scale-95 flex items-center gap-2">
            <span class="material-icons text-sm">person_add</span>
            Create Employee
        </button>
    </div>
</form>
