@use(Illuminate\Support\Facades\Auth)

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="color-scheme" content="light" />
    <title>{{ config('app.name', 'Laravel') }} - Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
        rel="stylesheet" />
    <!-- Styles / Scripts -->
    @wireUiScripts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <link href="{{ asset('tailwind.css') }}" rel="stylesheet">
    @endif
</head>

<body class="bg-background-light text-slate-800 antialiased min-h-screen flex flex-col">
    <x-notifications />
    <livewire:dashboard.header />
    <main class="grow pt-28 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        @yield('content')
    </main>
    <footer class="bg-white border-t border-slate-100 py-8">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-slate-500">
                © 2025 <a href="https://sheetthis.com" target="_blank">Sheet This</a>. All rights
                reserved.
            </div>
            <div class="flex gap-6 text-sm text-slate-500">
                <a class="hover:text-primary transition-colors" href="#">Help Center</a>
                <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
                <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
            </div>
        </div>
    </footer>
</body>

</html>
