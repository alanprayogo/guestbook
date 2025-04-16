@props([
    'tab' => '',
    'active' => false,
])

@php
    $tabId = 'tab-' . $tab;
    $panelId = 'panel-' . $tab;
@endphp

<button type="button"
    {{ $attributes->merge([
        'id' => $tabId,
        'data-hs-tab' => "#$panelId",
        'aria-controls' => $panelId,
        'aria-selected' => $active ? 'true' : 'false',
        'role' => 'tab',
        'class' =>
            'relative flex-1 min-w-0 px-4 py-4 overflow-hidden text-sm font-medium text-center text-gray-500 bg-white border-b-2 border-gray-200 focus:outline-hidden border-s first:border-s-0 hover:bg-gray-50 hover:text-gray-700 focus:z-10 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:border-b-neutral-700 dark:border-l-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:hs-tab-active:border-b-blue-600 dark:hs-tab-active:text-white',
    ]) }}>
    {{ $slot }}
</button>
