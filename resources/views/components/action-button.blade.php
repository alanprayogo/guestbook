@props(['variant' => 'edit', 'disabled' => false, 'size' => 'md', 'href' => null, 'asLink' => false])

@if ($href || $asLink)
    <a href="{{ $href ?? '#' }}"
        {{ $attributes->merge([
            'class' => $buttonClasses(),
            'disabled' => $disabled,
        ]) }}>
        <svg class="{{ $iconSize() }} shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            {!! $iconSvg() !!}
        </svg>
    </a>
@else
    <button type="button"
        {{ $attributes->merge([
            'class' => $buttonClasses(),
            'disabled' => $disabled,
        ]) }}>
        <svg class="{{ $iconSize() }} shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            {!! $iconSvg() !!}
        </svg>
    </button>
@endif
