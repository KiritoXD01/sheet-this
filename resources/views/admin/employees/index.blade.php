@extends('layouts.dashboard')

@section('content')
    <div class="flex flex-col md:flex-row md:items-end justify-between mb-8 gap-4">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">Employees</h1>
            <p class="text-slate-500 mt-1">Manage your team members and their account permissions.</p>
        </div>
        <div class="flex items-center gap-3">
            <button
                class="px-5 py-2.5 rounded-lg bg-white border border-slate-200 text-slate-600 font-medium text-sm hover:bg-slate-50 transition-colors shadow-sm flex items-center gap-2">
                <span class="material-icons text-sm">file_download</span>
                Export
            </button>
            <a class="px-5 py-2.5 rounded-lg bg-primary hover:bg-primary-hover text-white font-medium text-sm shadow-glow transition-all active:scale-95 flex items-center gap-2"
                href="{{ route('admin.employees.create') }}">
                <span class="material-icons text-sm">add</span>
                Add Employee
            </a>
        </div>
    </div>
    <div class="bg-white rounded-xl shadow-soft border border-slate-100 p-4 mb-8">
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex-1 relative">
                <span class="material-icons absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                <input
                    class="w-full pl-10 pr-4 py-2.5 rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary transition-shadow"
                    placeholder="Search employees by name, email, or role..." type="text" />
            </div>
            <div class="flex gap-4 overflow-x-auto pb-1 md:pb-0">
                <select
                    class="rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary py-2.5 pr-8 pl-3 min-w-[160px]">
                    <option value="">All Departments</option>
                    <option value="engineering">Engineering</option>
                    <option value="design">Design</option>
                    <option value="product">Product</option>
                    <option value="marketing">Marketing</option>
                </select>
                <select
                    class="rounded-lg border-slate-200 bg-slate-50 text-slate-900 focus:ring-primary focus:border-primary py-2.5 pr-8 pl-3 min-w-[140px]">
                    <option value="">Status: All</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                    <option value="onboarding">Onboarding</option>
                </select>
                <button
                    class="p-2.5 rounded-lg border border-slate-200 text-slate-500 hover:text-primary hover:border-primary transition-colors bg-white">
                    <span class="material-icons">filter_list</span>
                </button>
            </div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <div
                        class="h-20 w-20 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-2xl font-bold border-2 border-white shadow-sm">
                        JC
                    </div>
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-2 border-white rounded-full"
                        title="Active"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Jane Cooper</h3>
                <p class="text-sm text-slate-500 mb-1">Software Developer</p>
                <p class="text-xs font-medium text-primary bg-primary/10 px-2.5 py-0.5 rounded-full mt-1">Engineering</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">jane.cooper@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2025-001</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <img alt="Wade Warren" class="h-20 w-20 rounded-full object-cover border-2 border-white shadow-sm"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAQcj6iq02A2wZ_OWElH7uKeUaCQo4Ikq82NyBNUrMMZ6WjLVZDih_kWAkrEavhbX_0xze83y29jCGEFAOd5pkkhbZg0IdL9cPiDPwRq32QHpBuDzQah3eeoXnJk_nRWb-MDBR-KL1iT882W0a1EXqAg5xQmXAfWOJ7A7o9dU0updZHt32R_VYWkpIjesmbkUfxqq8R6tyZWyJEtL0Hrk1T_zzzpijFr2a5ohk9cbIECG9Xaxe4uLa63mjm6oeJSv5_daxe5shpFyg" />
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-amber-400 border-2 border-white rounded-full"
                        title="On Leave"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Wade Warren</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Product Designer</p>
                <p class="text-xs font-medium text-purple-600 bg-purple-100 px-2.5 py-0.5 rounded-full mt-1">
                    Design</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">wade.warren@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2024-045</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <div
                        class="h-20 w-20 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-2xl font-bold border-2 border-white shadow-sm">
                        EF
                    </div>
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-2 border-white rounded-full"
                        title="Active"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Esther Howard</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Project Manager</p>
                <p class="text-xs font-medium text-orange-600 bg-orange-100 px-2.5 py-0.5 rounded-full mt-1">
                    Product</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">esther.h@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2023-112</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <img alt="Cameron Williamson"
                        class="h-20 w-20 rounded-full object-cover border-2 border-white shadow-sm"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCMdK7OTf8ivUgZWMY4-U4NwVi-kgnmBFLin46UXPCZZrU3V1kk5mFV22IGwxX5uCgjzVXcdAV_oTcRQ79YXeYMeiSIUEKth-SUNur-ImHCoUXub23ii96A4hwZUdLSAscAk3L7Q6M9uf-oxYGcHgkZW82VhxieXd3XsCBpA7kuXYScot32O3pptDa4g4m5FiEFCQEAlVOlv-yw9ZIKZifAVb0O6kDaWUqUG0b9fr45yrEsJ1YoIal9YwFKbPn9buNNKSApy1cfPW0" />
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-slate-400 border-2 border-white rounded-full"
                        title="Inactive"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Cameron W.</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">Marketing Lead</p>
                <p class="text-xs font-medium text-blue-600 bg-blue-100 px-2.5 py-0.5 rounded-full mt-1">
                    Marketing</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">cameron.w@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2022-008</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <div
                        class="h-20 w-20 rounded-full bg-cyan-100 text-cyan-600 flex items-center justify-center text-2xl font-bold border-2 border-white shadow-sm">
                        BJ
                    </div>
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-green-500 border-2 border-white rounded-full"
                        title="Active"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Brooklyn Juarez</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">HR Specialist</p>
                <p class="text-xs font-medium text-pink-600 bg-pink-100 px-2.5 py-0.5 rounded-full mt-1">
                    Operations</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">brooklyn.j@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2024-099</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
        <div
            class="group bg-white rounded-xl shadow-sm hover:shadow-glow border border-slate-100 transition-all duration-300 flex flex-col relative overflow-hidden">
            <div class="absolute top-4 right-4 z-10">
                <button class="text-slate-400 hover:text-primary p-1 rounded-full hover:bg-slate-50 transition-colors">
                    <span class="material-icons">more_vert</span>
                </button>
            </div>
            <div class="p-6 flex flex-col items-center text-center grow">
                <div class="relative mb-4">
                    <img alt="Leslie Alexander"
                        class="h-20 w-20 rounded-full object-cover border-2 border-white shadow-sm"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuCR0ROGLyX42I8pK8Gl91KgnTpGUAw_6t3bbDZs_Uw0hmAR91RrDw1-yldt0cIxx_Qrv0RJfeMS7Do9_BJKd15vfLzovJTeqjSeiCxkHg2ERdu7wGcfG1LeINWec1L9RlkqAj2Uz4LcK7P-m26crWhmvrbJD_ewAP-mOa-v8zI6tDnqDMKNo-3HL1thuvBwHMSfNS1XiFVWuQjbPaGYJoXr8FimHotpiJF4h3ElEXJUKJX_11tTBl29c3ARiA8__HRO1i2Ip1WsxgQ" />
                    <span class="absolute bottom-0 right-0 w-5 h-5 bg-blue-400 border-2 border-white rounded-full"
                        title="Onboarding"></span>
                </div>
                <h3 class="font-bold text-slate-900 text-lg">Leslie Alexander</h3>
                <p class="text-sm text-slate-500 dark:text-slate-400 mb-1">QA Engineer</p>
                <p class="text-xs font-medium text-primary bg-primary/10 px-2.5 py-0.5 rounded-full mt-1">Engineering</p>
                <div class="mt-6 w-full space-y-3">
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">email</span>
                        <span class="truncate">leslie.a@example.com</span>
                    </div>
                    <div class="flex items-center text-sm text-slate-600 gap-3">
                        <span class="material-icons text-slate-400 text-lg">badge</span>
                        <span>EMP-2025-002</span>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-100 p-4 bg-slate-50 flex gap-2">
                <button
                    class="flex-1 py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-600 text-sm font-medium hover:text-primary hover:border-primary transition-colors flex items-center justify-center gap-1">
                    <span class="material-icons text-sm">visibility</span>
                    Profile
                </button>
                <button
                    class="py-2 px-3 rounded-lg border border-slate-200 bg-white text-slate-400 hover:text-primary hover:border-primary transition-colors">
                    <span class="material-icons text-sm">edit</span>
                </button>
            </div>
        </div>
    </div>
    <div class="mt-8 flex items-center justify-between border-t border-slate-100 pt-6">
        <div class="text-sm text-slate-500">
            Showing <span class="font-medium text-slate-900">1</span> to <span class="font-medium text-slate-900">6</span>
            of <span class="font-medium text-slate-900">42</span> results
        </div>
        <div class="flex gap-2">
            <button
                class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                disabled="">
                Previous
            </button>
            <button
                class="px-4 py-2 border border-slate-200 rounded-lg text-sm text-slate-600 hover:bg-slate-50 transition-colors">
                Next
            </button>
        </div>
    </div>
@endsection
