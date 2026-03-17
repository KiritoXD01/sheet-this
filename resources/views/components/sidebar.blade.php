@props(['active' => 'dashboard'])

@php
    $navItems = [
        'dashboard' => [
            'label' => 'Dashboard',
            'route' => '#',
            'icon'  => '<path d="M3 3h7v7H3z"/><path d="M14 3h7v7h-7z"/><path d="M14 14h7v7h-7z"/><path d="M3 14h7v7H3z"/>',
        ],
        'projects' => [
            'label' => 'Projects',
            'route' => '#',
            'icon'  => '<path d="M20 20a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2h-7.9a2 2 0 0 1-1.69-.9L9.6 3.9A2 2 0 0 0 7.93 3H4a2 2 0 0 0-2 2v13a2 2 0 0 0 2 2Z"/>',
        ],
        'timesheet' => [
            'label' => 'Timesheet',
            'route' => '#',
            'icon'  => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        ],
        'reports' => [
            'label' => 'Reports',
            'route' => '#',
            'icon'  => '<polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/>',
        ],
    ];
@endphp

<aside class="flex h-screen w-60 shrink-0 flex-col border-r border-gray-200 bg-sidebar-bg px-4 py-6">

    {{-- Logo --}}
    <div class="mb-6 flex items-center gap-2.5 pb-6 border-b border-gray-200">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
             stroke-linejoin="round" class="text-gray-500 shrink-0">
            <path d="M10 2h4"/>
            <path d="M12 14v-4"/>
            <path d="M4 13a8 8 0 0 1 8-7 8 8 0 1 1-5.3 14L4 17"/>
            <path d="M9 17H4v5"/>
        </svg>
        <span class="font-mono text-lg font-bold tracking-tight text-gray-900">SheetThis</span>
    </div>

    {{-- Nav Items --}}
    <nav class="flex flex-1 flex-col gap-1">
        @foreach ($navItems as $key => $item)
            @php $isActive = $active === $key; @endphp
            <a href="{{ $item['route'] }}"
               @class([
                   'flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm transition-colors',
                   'bg-primary font-semibold text-white'    => $isActive,
                   'font-medium text-gray-900 hover:bg-gray-100' => ! $isActive,
               ])>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round"
                     @class(['text-white' => $isActive, 'text-gray-500' => ! $isActive])>
                    {!! $item['icon'] !!}
                </svg>
                {{ $item['label'] }}
            </a>
        @endforeach

        {{-- Spacer --}}
        <div class="flex-1"></div>

        {{-- User Section --}}
        <div class="flex items-center gap-3 rounded-lg px-3 py-2.5">
            <span class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-primary text-sm font-bold text-white font-mono">
                B
            </span>
            <span class="font-inter text-sm font-medium text-gray-900">bellota</span>
        </div>
    </nav>

</aside>
