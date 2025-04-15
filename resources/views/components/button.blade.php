@props(['href' => '#', 'type' => 'primary', 'icon' => null, 'disabled' => false])

<div class="inline-flex gap-x-2">
    <a 
        {{ $attributes->merge([
            'class' => $colorClasses(),
            'href' => $href,
            'disabled' => $disabled
        ]) }}
    >
        @if($icon)
            {!! $icon !!}
        @endif
        {{ $slot }}
    </a>
</div>