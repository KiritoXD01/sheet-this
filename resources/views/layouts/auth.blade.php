<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="{{ asset('tailwind.css') }}" rel="stylesheet">
    @endif
    <style>
        .hero-bg {
            background: linear-gradient(180deg, #F0FDFA 0%, #F8FAFC 100%);
            min-height: 100vh;
        }
    </style>
</head>

<body class="hero-bg text-slate-800 antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <div class="flex justify-center items-center gap-3 mb-6">
            <div class="bg-primary rounded-xl p-2.5 flex items-center justify-center shadow-glow">
                <span class="material-icons text-white text-3xl">schedule</span>
            </div>
            <span class="font-bold text-3xl tracking-tight text-slate-900">Sheet This</span>
        </div>
        <h2 class="text-center text-3xl font-extrabold text-slate-900">
            Welcome back
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            Please sign in to your account
        </p>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div
            class="bg-white py-8 px-4 shadow-soft sm:rounded-2xl sm:px-10 border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary/50 via-primary to-primary/50">
            </div>
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
                            id="email" name="email" placeholder="name@company.com" required=""
                            type="email" />
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
        </div>
        <div class="mt-8 flex justify-center gap-6 text-sm text-slate-500">
            <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Help Center</a>
        </div>
        <p class="mt-4 text-center text-xs text-slate-400">
            © 2025 Sheet This. All rights reserved.
        </p>
    </div>

</body>

</html>
