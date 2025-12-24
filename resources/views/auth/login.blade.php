@extends('layouts.auth')

@section('title', 'Login')
@section('subtitle', 'Please sign in to your account')

@section('content')
    <form action="#" class="space-y-6" method="POST">
        <div>
            <label class="block text-sm font-medium text-slate-700" for="email">
                Email or Username
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-icons text-slate-400 text-xl">mail</span>
                </div>
                <input autocomplete="email"
                    class="block w-full pl-10 pr-3 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:ring-primary focus:border-primary sm:text-sm transition-colors"
                    id="email" name="email" placeholder="name@company.com" required="" type="email" />
            </div>
        </div>
        <div>
            <label class="block text-sm font-medium text-slate-700" for="password">
                Password
            </label>
            <div class="mt-1 relative rounded-md shadow-sm">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="material-icons text-slate-400 text-xl">lock</span>
                </div>
                <input autocomplete="current-password"
                    class="block w-full pl-10 pr-3 py-3 rounded-xl border-slate-200 bg-slate-50 text-slate-900 placeholder-slate-400 focus:ring-primary focus:border-primary sm:text-sm transition-colors"
                    id="password" name="password" placeholder="••••••••" required="" type="password" />
            </div>
        </div>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <input class="h-4 w-4 text-primary focus:ring-primary border-slate-300 rounded bg-slate-100"
                    id="remember-me" name="remember-me" type="checkbox" />
                <label class="ml-2 block text-sm text-slate-600" for="remember-me">
                    Remember me
                </label>
            </div>
            <div class="text-sm">
                <a class="font-medium text-primary hover:text-primary-hover transition-colors" href="#">
                    Forgot password?
                </a>
            </div>
        </div>
        <div>
            <button
                class="w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-glow text-sm font-bold text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all active:scale-[0.98]"
                type="submit">
                Sign in
            </button>
        </div>
    </form>
    <div class="mt-6">
        <div class="relative">
            <div class="absolute inset-0 flex items-center">
                <div class="w-full border-t border-slate-200"></div>
            </div>
            <div class="relative flex justify-center text-sm">
                <span class="px-2 bg-white text-slate-500">
                    Don't have an account?
                </span>
            </div>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-3">
            <a class="w-full inline-flex justify-center items-center py-2.5 px-4 border border-slate-200 rounded-xl shadow-sm bg-white text-sm font-medium text-slate-500 hover:bg-slate-50 transition-colors"
                href="#">
                Contact Administrator
            </a>
        </div>
    </div>
@endsection
