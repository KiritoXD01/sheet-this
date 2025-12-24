@use(App\Enums\IndustryEnum)

<div wire:loading.class="opacity-50" class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
    <form wire:submit="submit">
        <div class="p-6 border-b border-slate-100 bg-slate-50/50">
            <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                <span class="material-symbols-outlined text-primary">business</span>
                General Information
            </h2>
        </div>
        <div class="p-8">
            <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 pb-8 border-b border-slate-100">
                <div class="relative group">
                    <div
                        class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-300 overflow-hidden group-hover:border-primary transition-colors cursor-pointer">
                        <span
                            class="material-icons text-slate-400 group-hover:text-primary text-3xl transition-colors">add_photo_alternate</span>
                    </div>
                    <div class="absolute bottom-0 right-0 bg-white rounded-full p-1 border border-slate-200 shadow-sm">
                        <span class="material-icons text-slate-500 text-sm">edit</span>
                    </div>
                </div>
                <div class="text-center sm:text-left">
                    <h3 class="font-medium text-slate-900">Company Logo</h3>
                    <p class="text-sm text-slate-500 mt-1 max-w-xs">Upload your company logo.
                        Recommended size is 400x400px. Supports PNG, JPG.</p>
                    <div class="flex gap-3 mt-3 justify-center sm:justify-start">
                        <button type="button" class="text-sm text-primary hover:text-primary-hover font-medium">
                            Upload new
                        </button>
                        <button type="button" class="text-sm text-red-500 hover:text-red-600 font-medium">
                            Remove</button>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <x-input wire:model="name" placeholder="e.g. Acme Corp" label="Company Name" />
                <x-select label="Industry" wire:model="industry">
                    @foreach (IndustryEnum::cases() as $industry)
                        <x-select.option :label="$industry->label()" :value="$industry->value" :selected="$industry->value === $company->industry" />
                    @endforeach
                </x-select>
            </div>
        </div>
        <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
            <button type="submit"
                class="w-full cursor-pointer bg-primary hover:bg-primary-hover text-white px-6 py-2 rounded-lg text-sm font-bold shadow-glow transition-all active:scale-95 flex items-center justify-center gap-2">
                <span wire:loading.remove class="material-icons text-sm">save</span>
                <span wire:loading class="material-icons text-sm animate-spin">refresh</span>
                <span wire:loading.remove>Save General Information</span>
                <span wire:loading>Updating...</span>
            </button>
        </div>
    </form>
</div>
