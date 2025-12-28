@extends('layouts.auth')

@section('title', 'Login')
@section('subtitle', 'Please sign in to your account')

@section('content')
    <livewire:auth.login-form />
    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200 dark:border-slate-700"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white dark:bg-card-dark text-slate-500 dark:text-slate-400">
                    Don't have an account?
                </span>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-3">
            <a class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-slate-200 dark:border-slate-600 rounded-xl shadow-sm bg-white dark:bg-slate-800 text-sm font-medium text-slate-500 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 transition-colors"
                href="#">
                Contact Administrator
            </a>
        </div>
    </div>
@endsection
