<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
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
    @wireUiScripts
</head>

<body class="hero-bg text-slate-800 antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-logo />
        <h2 class="text-center text-3xl font-extrabold text-slate-900">
            @yield('title')
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600">
            @yield('subtitle')
        </p>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div
            class="bg-white py-8 px-4 shadow-soft sm:rounded-2xl sm:px-10 border border-slate-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-primary/50 via-primary to-primary/50">
            </div>
            @yield('content')
        </div>
        <div class="mt-8 flex justify-center gap-6 text-sm text-slate-500">
            <a class="hover:text-primary transition-colors" href="https://sheethis.com/privacy">Privacy Policy</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="https://sheethis.com/terms">Terms of Service</a>
        </div>
        <p class="mt-4 text-center text-xs text-slate-400">
            © {{ now()->format('Y') }} Sheet This. All rights reserved.
        </p>
    </div>

</body>

</html>
