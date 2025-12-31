@use(Illuminate\Support\Facades\Auth)

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="color-scheme" content="light dark" />
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
    <script>
        // Theme management script - handles light, dark, and system preferences
        (function() {
            const theme = localStorage.getItem('theme') || 'system';

            function applyTheme(theme) {
                const root = document.documentElement;

                if (theme === 'dark') {
                    root.classList.add('dark');
                } else if (theme === 'light') {
                    root.classList.remove('dark');
                } else if (theme === 'system') {
                    const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
                    if (prefersDark) {
                        root.classList.add('dark');
                    } else {
                        root.classList.remove('dark');
                    }
                }
            }

            // Apply theme immediately to prevent flash
            applyTheme(theme);

            // Listen for theme changes from other tabs or the toggle
            window.addEventListener('storage', (e) => {
                if (e.key === 'theme') {
                    applyTheme(e.newValue || 'system');
                }
            });

            // Listen for system preference changes
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
                const currentTheme = localStorage.getItem('theme') || 'system';
                if (currentTheme === 'system') {
                    applyTheme('system');
                }
            });

            // Listen for custom theme-changed events from Alpine components
            document.addEventListener('theme-changed', (e) => {
                applyTheme(e.detail.theme);
            });
        })();
    </script>
</head>

<body class="bg-background-light dark:bg-background-dark text-slate-800 dark:text-text-dark antialiased min-h-screen flex flex-col">
    <x-notifications />
    <livewire:dashboard.header />
    <main class="grow pt-28 pb-12 px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto w-full">
        @yield('content')
    </main>
    <footer class="bg-white dark:bg-card-dark border-t border-slate-100 dark:border-border-dark py-8">
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <div class="text-sm text-slate-500 dark:text-slate-400">
                © 2025 <a href="https://sheetthis.com" target="_blank" class="hover:text-primary dark:hover:text-primary transition-colors">Sheet This</a>. All rights
                reserved.
            </div>
            <div class="flex gap-6 text-sm text-slate-500 dark:text-slate-400">
                <a class="hover:text-primary dark:hover:text-primary transition-colors" href="https://sheetthis.com/privacy" target="_blank">
                    Privacy Policy
                </a>
                <a class="hover:text-primary dark:hover:text-primary transition-colors" href="https://sheetthis.com/terms" target="_blank">
                    Terms of Service
                </a>
            </div>
        </div>
    </footer>
</body>

</html>
