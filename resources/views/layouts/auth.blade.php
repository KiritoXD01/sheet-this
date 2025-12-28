<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <script>
        (function() {
            const theme = localStorage.getItem('theme') || 'system';

            function applyTheme(mode) {
                if (mode === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            }

            // Apply initial theme
            if (theme === 'dark') {
                applyTheme('dark');
            } else if (theme === 'light') {
                applyTheme('light');
            } else if (theme === 'system') {
                const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                applyTheme(isDark ? 'dark' : 'light');
            }

            // Create global theme manager
            window.themeManager = {
                currentTheme: theme,

                setTheme(newTheme) {
                    this.currentTheme = newTheme;
                    localStorage.setItem('theme', newTheme);

                    if (newTheme === 'system') {
                        const isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                        applyTheme(isDark ? 'dark' : 'light');
                    } else {
                        applyTheme(newTheme);
                    }

                    // Dispatch custom event for Alpine to update UI
                    window.dispatchEvent(new CustomEvent('theme-changed', {
                        detail: { theme: newTheme }
                    }));
                },

                applyTheme
            };

            // Listen for system theme changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                if (window.themeManager.currentTheme === 'system') {
                    applyTheme(e.matches ? 'dark' : 'light');
                }
            });
        })();
    </script>
    <meta name="color-scheme" content="light dark" />
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

        .dark .hero-bg {
            background: linear-gradient(180deg, oklch(0.15 0.01 240) 0%, oklch(0.18 0.01 240) 100%);
        }
    </style>
    @wireUiScripts
</head>

<body class="hero-bg text-slate-800 dark:text-slate-100 antialiased flex flex-col justify-center py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <x-logo />
        <h2 class="text-center text-3xl font-extrabold text-slate-900 dark:text-slate-100">
            @yield('title')
        </h2>
        <p class="mt-2 text-center text-sm text-slate-600 dark:text-slate-400">
            @yield('subtitle')
        </p>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div
            class="bg-white dark:bg-card-dark py-8 px-4 shadow-soft sm:rounded-2xl sm:px-10 border border-slate-100 dark:border-slate-700 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1 bg-linear-to-r from-primary/50 via-primary to-primary/50">
            </div>
            @yield('content')
        </div>
        <div class="mt-8 flex justify-center gap-6 text-sm text-slate-500 dark:text-slate-400">
            <a class="hover:text-primary transition-colors" href="#">Privacy Policy</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Terms of Service</a>
            <span>•</span>
            <a class="hover:text-primary transition-colors" href="#">Help Center</a>
        </div>
        <p class="mt-4 text-center text-xs text-slate-400 dark:text-slate-500">
            © {{ now()->format('Y') }} Sheet This. All rights reserved.
        </p>
    </div>

</body>

</html>
