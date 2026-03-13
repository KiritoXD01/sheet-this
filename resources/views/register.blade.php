<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Create Account | ChronosTrack</title>
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background-light font-display text-slate-900 min-h-screen">
    <div class="flex min-h-screen flex-col lg:flex-row">
        <!-- Left Section: Form -->
        <div class="flex flex-1 flex-col justify-center px-6 py-12 lg:px-20 xl:px-32">
            <div class="mx-auto w-full max-w-sm lg:w-96">
                <header class="mb-10 flex items-center gap-3">
                    <div class="flex items-center justify-center rounded-lg bg-primary p-2 text-white">
                        <span class="material-symbols-outlined">timer</span>
                    </div>
                    <h2 class="text-2xl font-bold tracking-tight text-slate-900">ChronosTrack</h2>
                </header>
                <div>
                    <h1 class="text-3xl font-black leading-tight tracking-tight text-slate-900">
                        Create Account</h1>
                    <p class="mt-2 text-base text-slate-600">Start tracking your time with
                        precision.</p>
                </div>
                <div class="mt-10">
                    <form action="#" class="space-y-6" method="POST">
                        <!-- Full Name Field -->
                        <div>
                            <label class="block text-sm font-medium leading-6 text-slate-900"
                                for="full-name">Full Name</label>
                            <div class="mt-2">
                                <input autocomplete="name"
                                    class="block w-full rounded-xl border-0 py-3 px-4 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
                                    id="full-name" name="full-name" placeholder="John Doe" required=""
                                    type="text" />
                            </div>
                        </div>
                        <!-- Email Field -->
                        <div>
                            <label class="block text-sm font-medium leading-6 text-slate-900"
                                for="email">Email address</label>
                            <div class="mt-2">
                                <input autocomplete="email"
                                    class="block w-full rounded-xl border-0 py-3 px-4 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
                                    id="email" name="email" placeholder="name@example.com" required=""
                                    type="email" />
                            </div>
                        </div>
                        <!-- Password Field -->
                        <div>
                            <label class="block text-sm font-medium leading-6 text-slate-900"
                                for="password">Password</label>
                            <div class="mt-2">
                                <input autocomplete="new-password"
                                    class="block w-full rounded-xl border-0 py-3 px-4 text-slate-900 shadow-sm ring-1 ring-inset ring-slate-300 placeholder:text-slate-400 focus:ring-2 focus:ring-inset focus:ring-primary sm:text-sm sm:leading-6"
                                    id="password" name="password" placeholder="••••••••" required=""
                                    type="password" />
                            </div>
                        </div>
                        <!-- Terms and Conditions -->
                        <div class="flex items-center">
                            <input
                                class="h-4 w-4 rounded border-slate-300 text-primary focus:ring-primary"
                                id="terms" name="terms" required="" type="checkbox" />
                            <label class="ml-3 block text-sm leading-6 text-slate-700"
                                for="terms">
                                I agree to the <a class="font-semibold text-primary hover:opacity-80"
                                    href="#">Terms</a> and <a class="font-semibold text-primary hover:opacity-80"
                                    href="#">Privacy Policy</a>
                            </label>
                        </div>
                        <!-- Submit Button -->
                        <div>
                            <button
                                class="flex w-full justify-center rounded-xl bg-primary px-3 py-3 text-sm font-semibold leading-6 text-white shadow-sm hover:opacity-90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary transition-all"
                                type="submit">
                                Create Account
                            </button>
                        </div>
                    </form>
                    <p class="mt-10 text-center text-sm text-slate-500">
                        Already have an account?
                        <a class="font-semibold leading-6 text-primary hover:opacity-80" href="#">Sign in here</a>
                    </p>
                </div>
            </div>
        </div>
        <!-- Right Section: Illustration/Image -->
        <div class="relative hidden flex-1 lg:block">
            <div class="absolute inset-0 h-full w-full bg-primary/10">
                <div class="h-full w-full bg-cover bg-center mix-blend-multiply opacity-80"
                    data-alt="Modern workspace with desk and plants"
                    style='background-image: url("https://lh3.googleusercontent.com/aida-public/AB6AXuC-GkS4Yc-GWc-69nwXcjrjukKo060s_sc5blNtCelkKJJZl9n4EUzHxFx-_qGe2-1dE7hz_2ssT5YJHgv6wKbPeG5iW2eEi-6kR6daeIMeU8yFAoPAebK5xQC3jnQc7WZ1IfmKhIS1ONUSn83bOh88YENOuJO5WuXnDFwWX09d32Yx-wUw7tAeWooC8lUVKIh21oZ1eaERTlVgVzfVW1GSPba26z9cZoOTfag98QAlEqazcpaIhPyuHIEwebvIZVWksx4sqwfSqbg");'>
                </div>
            </div>
            <div class="relative flex h-full flex-col justify-end p-12 text-white">
                <div class="max-w-md bg-black/30 backdrop-blur-md p-8 rounded-xl border border-white/10">
                    <span class="material-symbols-outlined text-primary text-4xl mb-4">analytics</span>
                    <blockquote class="text-2xl font-medium leading-8">
                        "The best way to predict your future is to create it. Track your time, master your schedule, and
                        achieve your goals with ChronosTrack."
                    </blockquote>
                    <p class="mt-6 text-lg font-semibold">Sarah Jenkins</p>
                    <p class="text-slate-300">Productivity Coach</p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
