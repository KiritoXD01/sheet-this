@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Company Profile</h1>
            <p class="text-slate-500 mt-1">Manage your organization's details, departments, and policies.
            </p>
        </div>
        <div class="flex gap-3">
            <button
                class="px-4 py-2 rounded-lg border border-slate-200 text-slate-600 hover:bg-slate-50 text-sm font-medium transition-colors">
                Cancel
            </button>
            <button
                class="bg-primary hover:bg-primary-hover text-white px-6 py-2 rounded-lg text-sm font-bold shadow-glow transition-all active:scale-95 flex items-center gap-2">
                <span class="material-icons text-sm">save</span> Save Changes
            </button>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">business</span>
                        General Information
                    </h2>
                </div>
                <div class="p-8">
                    <div
                        class="flex flex-col sm:flex-row items-center sm:items-start gap-6 mb-8 pb-8 border-b border-slate-100">
                        <div class="relative group">
                            <div
                                class="w-24 h-24 rounded-full bg-slate-100 flex items-center justify-center border-2 border-dashed border-slate-300 overflow-hidden group-hover:border-primary transition-colors cursor-pointer">
                                <span
                                    class="material-icons text-slate-400 group-hover:text-primary text-3xl transition-colors">add_photo_alternate</span>
                            </div>
                            <div
                                class="absolute bottom-0 right-0 bg-white rounded-full p-1 border border-slate-200 shadow-sm">
                                <span class="material-icons text-slate-500 text-sm">edit</span>
                            </div>
                        </div>
                        <div class="text-center sm:text-left">
                            <h3 class="font-medium text-slate-900">Company Logo</h3>
                            <p class="text-sm text-slate-500 mt-1 max-w-xs">Upload your company logo.
                                Recommended size is 400x400px. Supports PNG, JPG.</p>
                            <div class="flex gap-3 mt-3 justify-center sm:justify-start">
                                <button class="text-sm text-primary hover:text-primary-hover font-medium">Upload
                                    new</button>
                                <button class="text-sm text-red-500 hover:text-red-600 font-medium">Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Company
                                Name</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="e.g. Acme Corp" type="text" value="TechFlow Solutions" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Industry</label>
                            <select
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary">
                                <option>Technology</option>
                                <option>Finance</option>
                                <option>Healthcare</option>
                                <option>Retail</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Tax ID /
                                EIN</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="XX-XXXXXXX" type="text" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Website</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-slate-400 text-sm">https://</span>
                                </div>
                                <input
                                    class="w-full pl-16 rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                    placeholder="example.com" type="text" value="techflow.io" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Contact
                                Email</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="admin@example.com" type="email" value="contact@techflow.io" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">pin_drop</span>
                        Locations &amp; Address
                    </h2>
                </div>
                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="col-span-1 md:col-span-2">
                            <label class="block text-sm font-medium text-slate-700 mb-1">Street
                                Address</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="123 Main St" type="text" value="450 Cambridge Street" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">City</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="City" type="text" value="Palo Alto" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">State /
                                Province</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="State" type="text" value="California" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Zip / Postal
                                Code</label>
                            <input
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary"
                                placeholder="Zip" type="text" value="94306" />
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-slate-700 mb-1">Country</label>
                            <select
                                class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary">
                                <option selected="">United States</option>
                                <option>Canada</option>
                                <option>United Kingdom</option>
                                <option>Australia</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-1 space-y-8">
            <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">groups</span>
                        Departments
                    </h2>
                    <button
                        class="text-xs bg-white border border-slate-200 hover:border-primary text-slate-600 px-2 py-1 rounded shadow-sm transition-colors flex items-center gap-1">
                        <span class="material-icons text-xs">add</span> New
                    </button>
                </div>
                <div class="divide-y divide-slate-100">
                    <div
                        class="p-4 flex items-center justify-between group hover:bg-slate-50 transition-colors cursor-pointer">
                        <div>
                            <div class="font-medium text-slate-900">Engineering</div>
                            <div class="text-xs text-slate-500">12 Employees</div>
                        </div>
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-slate-400 hover:text-primary"><span
                                    class="material-icons text-lg">edit</span></button>
                        </div>
                    </div>
                    <div
                        class="p-4 flex items-center justify-between group hover:bg-slate-50 transition-colors cursor-pointer">
                        <div>
                            <div class="font-medium text-slate-900">Product Design</div>
                            <div class="text-xs text-slate-500">4 Employees</div>
                        </div>
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-slate-400 hover:text-primary"><span
                                    class="material-icons text-lg">edit</span></button>
                        </div>
                    </div>
                    <div
                        class="p-4 flex items-center justify-between group hover:bg-slate-50 transition-colors cursor-pointer">
                        <div>
                            <div class="font-medium text-slate-900">Marketing</div>
                            <div class="text-xs text-slate-500">8 Employees</div>
                        </div>
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-slate-400 hover:text-primary"><span
                                    class="material-icons text-lg">edit</span></button>
                        </div>
                    </div>
                    <div
                        class="p-4 flex items-center justify-between group hover:bg-slate-50 transition-colors cursor-pointer">
                        <div>
                            <div class="font-medium text-slate-900">Sales</div>
                            <div class="text-xs text-slate-500">15 Employees</div>
                        </div>
                        <div class="flex items-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="text-slate-400 hover:text-primary"><span
                                    class="material-icons text-lg">edit</span></button>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-slate-50 border-t border-slate-100 text-center">
                    <button class="text-sm text-primary hover:text-primary-hover font-medium">View all departments</button>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-soft border border-slate-100 overflow-hidden">
                <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                    <h2 class="text-lg font-bold text-slate-900 flex items-center gap-2">
                        <span class="material-symbols-outlined text-primary">policy</span>
                        Company Policies
                    </h2>
                </div>
                <div class="p-6 space-y-6">
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Default
                            Timezone</label>
                        <select
                            class="w-full rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary text-sm">
                            <option>(GMT-08:00) Pacific Time</option>
                            <option>(GMT-05:00) Eastern Time</option>
                            <option>(GMT+00:00) London</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Standard Work
                            Day</label>
                        <div class="flex items-center gap-2">
                            <input
                                class="w-20 rounded-lg border-slate-200 bg-white text-slate-900 focus:ring-primary focus:border-primary text-sm"
                                type="number" value="8" />
                            <span class="text-sm text-slate-500">hours</span>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Work Week</label>
                        <div class="flex gap-1">
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">M</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">T</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">W</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">T</button>
                            <button
                                class="w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center">F</button>
                            <button
                                class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 text-xs font-bold flex items-center justify-center hover:bg-slate-200 transition-colors">S</button>
                            <button
                                class="w-8 h-8 rounded-full bg-slate-100 text-slate-400 text-xs font-bold flex items-center justify-center hover:bg-slate-200 transition-colors">S</button>
                        </div>
                    </div>
                    <div class="flex items-center justify-between pt-2">
                        <span class="text-sm font-medium text-slate-700">Allow Overtime</span>
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input checked="" class="sr-only peer" type="checkbox" value="" />
                            <div
                                class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary">
                            </div>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
