@props(['orientation' => 'horizontal'])

<nav {{ $attributes->merge([
    'class' => 'relative z-0 flex overflow-hidden border border-gray-200 rounded-xl dark:border-neutral-700',
    'aria-label' => 'Tabs',
    'role' => 'tablist',
    'aria-orientation' => $orientation
]) }}>
    {{ $slot }}
</nav>
