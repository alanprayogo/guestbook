@props([
    'tab' => '',
    'active' => false,
])

@php
    $panelId = 'panel-' . $tab;
    $tabId = 'tab-' . $tab;
@endphp

<div id="{{ $panelId }}" role="tabpanel" aria-labelledby="{{ $tabId }}" class="{{ $active ? '' : 'hidden' }}">
    {{ $slot }}
</div>
