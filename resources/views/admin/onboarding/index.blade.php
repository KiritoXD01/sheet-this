@extends('layouts.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-primary/10 rounded-2xl mb-4">
                <span class="material-symbols-outlined text-primary text-4xl">business</span>
            </div>
            <h1 class="text-3xl font-bold text-slate-900">Welcome to Sheet This</h1>
            <p class="text-slate-500 mt-2">Let's set up your company profile to get started</p>
        </div>

        <div class="bg-white rounded-xl shadow-soft border border-slate-100 overflow-hidden">
            <livewire:admin.onboarding-form />
        </div>

        <div class="mt-6 bg-blue-50 border border-blue-100 rounded-lg p-4 flex gap-3">
            <span class="material-icons text-blue-500 mt-0.5">info</span>
            <div>
                <h4 class="text-sm font-semibold text-blue-900">Quick Setup</h4>
                <p class="text-sm text-blue-700 mt-0.5">You can add more details like logo, address, and company policies later from the company profile page.</p>
            </div>
        </div>
    </div>
@endsection
