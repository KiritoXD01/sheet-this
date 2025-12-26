@props([
    'active' => false,
    'day',
    'label',
])

@php
    $class = $active
        ? 'w-8 h-8 rounded-full bg-primary text-white text-xs font-bold flex items-center justify-center cursor-pointer'
        : 'w-8 h-8 rounded-full bg-slate-100 text-slate-400 text-xs font-bold flex items-center justify-center hover:bg-slate-200 transition-colors cursor-pointer';
@endphp

<button type="button" class="{{ $class }}"
    wire:click="toggleWorkDay('{{ $day }}')">{{ $label }}</button>
