@props(['href' => '#', 'variant' => 'primary', 'icon' => null, 'disabled' => false, 'size' => 'medium'])

@if ($href)
    <a href="{{ $href }}" class="{{ $buttonClasses() }}"
        @if ($disabled) aria-disabled="true" @endif>
        @if ($icon ?? $defaultIcons())
            {!! $icon ?? $defaultIcons() !!}
        @endif
        {{ $slot }}
    </a>
@else
    <button type="button" class="{{ $buttonClasses() }}" @if ($disabled) disabled @endif>
        @if ($icon ?? $defaultIcons())
            {!! $icon ?? $defaultIcons() !!}
        @endif
        {{ $slot }}
    </button>
@endif
