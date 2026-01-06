<form wire:submit="submit" class="space-y-6" autocomplete="off">
    <x-errors only="login" />
    <x-errors only="email_verification" />
    @if (session()->has('verification_success'))
        <div class="text-green-600">
            {{ session('verification_success') }}
        </div>
    @endif
    <div>
        <x-input label="Email" placeholder="your email" wire:model="email" type="email" />
    </div>
    <div>
        <x-input label="Password" placeholder="your password" wire:model="password" type="password" />
    </div>
    <div class="flex items-center justify-between">
        <x-checkbox id="remember" label="Remember me" wire:model="remember" value="right-label" />
        <div class="text-sm">
            <a class="font-medium text-primary hover:text-primary-hover transition-colors" href="#">
                Forgot password?
            </a>
        </div>
    </div>
    <div>
        <button
            class="cursor-pointer w-full flex justify-center py-3 px-4 border border-transparent rounded-xl shadow-glow text-sm font-bold text-white bg-primary hover:bg-primary-hover focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary transition-all active:scale-[0.98]"
            type="submit">
            Sign in
        </button>
    </div>
</form>
