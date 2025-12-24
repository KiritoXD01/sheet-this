<nav class="w-full fixed top-0 z-50 bg-white/90 backdrop-blur-sm border-b border-slate-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <div class="flex items-center gap-2">
                <div class="bg-primary rounded-lg p-1.5 flex items-center justify-center">
                    <span class="material-icons text-white text-xl">schedule</span>
                </div>
                <span class="font-bold text-xl tracking-tight text-slate-900">Sheet This</span>
            </div>
            <div class="hidden md:flex items-center space-x-8">
                @foreach ($navLinks as $link)
                    @if ($link['active'])
                        <a class="text-sm font-medium text-primary transition-colors border-b-2 border-primary py-1"
                            href="{{ $link['route'] }}">{{ $link['title'] }}</a>
                    @else
                        <a class="text-sm font-medium text-slate-600 hover:text-primary transition-colors py-1"
                            href="{{ $link['route'] }}">{{ $link['title'] }}</a>
                    @endif
                @endforeach
            </div>
            <div class="flex items-center gap-4">
                <button
                    class="bg-slate-100 p-2 rounded-full text-slate-500 hover:text-primary transition-colors relative">
                    <span class="material-icons">notifications</span>
                    <span class="absolute top-2 right-2 w-2 h-2 bg-red-500 rounded-full border-2 border-white"></span>
                </button>
                <livewire:dashboard.profile-dropdown />
            </div>
        </div>
    </div>
</nav>
