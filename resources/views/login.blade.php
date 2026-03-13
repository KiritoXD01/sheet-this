<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - ChronosTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background-light font-display min-h-screen flex items-center justify-center">
    <div class="relative flex min-h-screen w-full flex-col overflow-x-hidden">
        <div class="layout-container flex h-full grow flex-col">
            <div class="flex flex-1 justify-center py-10 px-4">
                <div
                    class="layout-content-container flex flex-col max-w-[480px] w-full bg-white p-8 rounded-xl shadow-xl border border-brand-purple/10">
                    <div class="flex flex-col items-center gap-6 mb-8">
                        <div class="flex items-center gap-3 text-brand-purple">
                            <div class="size-10 bg-primary rounded-lg flex items-center justify-center text-white">
                                <svg class="size-6" fill="none" viewbox="0 0 48 48"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M4 4H17.3334V17.3334H30.6666V30.6666H44V44H4V4Z" fill="currentColor">
                                    </path>
                                </svg>
                            </div>
                            <h2
                                class="text-2xl font-black leading-tight tracking-tight text-brand-dark-purple">
                                ChronosTrack</h2>
                        </div>
                        <div class="text-center">
                            <h1 class="text-3xl font-black text-brand-dark-purple mb-2">Welcome Back
                            </h1>
                            <p class="text-slate-600 text-base">Log in to your account to
                                continue tracking</p>
                        </div>
                    </div>
                    <form class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <label
                                class="text-brand-dark-purple text-sm font-semibold">Email
                                Address</label>
                            <div class="relative">
                                <span
                                    class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-brand-purple/50">mail</span>
                                <input
                                    class="w-full pl-12 pr-4 py-3 rounded-xl border border-brand-purple/20 bg-background-light focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all placeholder:text-brand-purple/40"
                                    placeholder="email@example.com" type="email" />
                            </div>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label
                                class="text-brand-dark-purple text-sm font-semibold">Password</label>
                            <div class="relative flex items-center">
                                <span class="material-symbols-outlined absolute left-4 text-brand-purple/50">lock</span>
                                <input
                                    class="w-full pl-12 pr-12 py-3 rounded-xl border border-brand-purple/20 bg-background-light focus:border-primary focus:ring-1 focus:ring-primary outline-none transition-all placeholder:text-brand-purple/40"
                                    placeholder="••••••••" type="password" />
                                <button
                                    class="absolute right-4 text-brand-purple/50 hover:text-primary transition-colors"
                                    type="button">
                                    <span class="material-symbols-outlined">visibility</span>
                                </button>
                            </div>
                        </div>
                        <div class="flex items-center justify-between mt-1">
                            <label class="flex items-center gap-2 cursor-pointer group">
                                <input
                                    class="rounded border-brand-purple/30 text-primary focus:ring-primary bg-background-light"
                                    type="checkbox" />
                                <span
                                    class="text-sm text-slate-600 group-hover:text-primary transition-colors">Remember
                                    me</span>
                            </label>
                            <a class="text-sm font-semibold text-primary hover:underline" href="#">Forgot
                                password?</a>
                        </div>
                        <button
                            class="w-full py-4 bg-primary text-white rounded-xl font-bold text-lg hover:opacity-90 transition-all shadow-lg mt-4 shadow-purple-200"
                            type="submit">
                            Log In
                        </button>
                    </form>
                    <div class="relative my-8">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-brand-purple/10"></div>
                        </div>
                        <div class="relative flex justify-center text-sm uppercase">
                            <span
                                class="bg-white px-4 text-slate-500">Or
                                continue with</span>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <button
                            class="flex items-center justify-center gap-3 py-3 px-4 border border-brand-purple/20 rounded-xl hover:bg-background-light transition-colors text-brand-dark-purple font-medium">
                            <svg class="w-5 h-5" viewbox="0 0 24 24">
                                <path
                                    d="M24 12.27c0-.85-.07-1.71-.22-2.54H12v4.81h6.72c-.29 1.56-1.17 2.89-2.49 3.77v3.13h4.03c2.36-2.17 3.74-5.36 3.74-9.17z"
                                    fill="#EA4335"></path>
                                <path
                                    d="M12 24c3.24 0 5.97-1.07 7.97-2.9l-4.03-3.13c-1.11.75-2.54 1.19-3.94 1.19-3.03 0-5.6-2.04-6.52-4.78H1.36v3.23C3.34 21.57 7.42 24 12 24z"
                                    fill="#34A853"></path>
                                <path
                                    d="M5.48 14.38c-.24-.72-.37-1.49-.37-2.38s.13-1.66.37-2.38V6.39H1.36C.49 8.08 0 9.98 0 12s.49 3.92 1.36 5.61l4.12-3.23z"
                                    fill="#FBBC05"></path>
                                <path
                                    d="M12 4.75c1.76 0 3.35.61 4.59 1.79l3.44-3.44C17.96 1.19 15.24 0 12 0 7.42 0 3.34 2.43 1.36 6.39l4.12 3.23c.92-2.74 3.49-4.87 6.52-4.87z"
                                    fill="#4285F4"></path>
                            </svg>
                            Google
                        </button>
                        <button
                            class="flex items-center justify-center gap-3 py-3 px-4 border border-brand-purple/20 rounded-xl hover:bg-background-light transition-colors text-brand-dark-purple font-medium">
                            <svg class="w-5 h-5" fill="currentColor" viewbox="0 0 24 24">
                                <path
                                    d="M17.05 20.28c-.96.95-2.11 1.43-3.46 1.43-1.25 0-2.32-.38-3.2-1.15-.88-.77-1.85-1.15-2.91-1.15-1.07 0-2.06.38-2.97 1.15-.9.77-1.93 1.15-3.08 1.15-1.35 0-2.48-.48-3.39-1.43-1.57-1.63-2.36-4.57-2.36-8.84 0-2.44.62-4.42 1.86-5.96 1.18-1.46 2.65-2.19 4.41-2.19 1.05 0 2.05.31 3 .93.94.62 1.76.93 2.44.93.59 0 1.34-.28 2.26-.85.92-.56 1.93-.85 3.03-.85 1.54 0 2.87.57 3.99 1.71-2.4 1.43-3.6 3.42-3.6 5.96 0 1.84.58 3.33 1.74 4.48.58.58 1.4 1.05 2.46 1.4-.29.89-.7 1.72-1.22 2.49zM13.72 2.1c0 1.1-.4 2.11-1.21 3.01-.81.9-1.85 1.41-3.11 1.52.01-1.1.41-2.1 1.22-3.01.81-.9 1.84-1.39 3.09-1.48.01-.02.01-.03.01-.04z">
                                </path>
                            </svg>
                            Apple
                        </button>
                    </div>
                    <p class="mt-8 text-center text-sm text-slate-600">
                        Don't have an account?
                        <a class="font-bold text-primary hover:underline ml-1" href="#">Sign up now</a>
                    </p>
                </div>
            </div>
            <footer class="p-6 text-center text-slate-400 text-xs">
                <p>© 2024 ChronosTrack Inc. All rights reserved.</p>
                <div class="mt-2 flex justify-center gap-4">
                    <a class="hover:text-primary" href="#">Privacy Policy</a>
                    <a class="hover:text-primary" href="#">Terms of Service</a>
                    <a class="hover:text-primary" href="#">Help Center</a>
                </div>
            </footer>
        </div>
    </div>
</body>

</html>
