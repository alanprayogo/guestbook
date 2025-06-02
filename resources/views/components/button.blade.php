@props([
    'href' => null,
    'variant' => 'primary',
    'icon' => null,
    'disabled' => false,
    'size' => 'medium',
    'type' => 'button', // tambahkan prop 'type'
])

@php
    $attributes = $attributes
        ->merge([
            'class' => $buttonClasses(),
        ])
        ->when($disabled, fn($attr) => $attr->merge(['disabled' => true]));
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes }}>
        @if ($icon ?? $defaultIcons())
            {!! $icon ?? $defaultIcons() !!}
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes }}>
        @if ($icon ?? $defaultIcons())
            {!! $icon ?? $defaultIcons() !!}
        @endif
        {{ $slot }}
    </button>
@endif
