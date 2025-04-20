@props(['status'])

@php
    $statusMap = [
        'pending' => 'bg-gray-800 text-white dark:bg-white dark:text-neutral-800',
        'sent' => 'bg-gray-500 text-white',
        'failed' => 'bg-red-500 text-white',
        'accepted' => 'bg-teal-500 text-white',
        'declined' => 'bg-red-500 text-white',
        'check-in' => 'bg-blue-600 text-white dark:bg-blue-500',
        'absent' => 'bg-yellow-500 text-white',
    ];

    $labelMap = [
        'pending' => 'Pending',
        'sent' => 'Sent',
        'failed' => 'Failed',
        'accepted' => 'Accepted',
        'declined' => 'Declined',
        'check-in' => 'Check-in',
        'absent' => 'Absent',
    ];

    $class = $statusMap[strtolower($status)] ?? 'bg-white text-gray-600';
    $label = $labelMap[strtolower($status)] ?? ucfirst($status);
@endphp

<span {{ $attributes->merge(['class' => "$class inline-flex items-center gap-x-1.5 rounded-full px-3 py-1.5 text-xs font-medium"]) }}>
    {{ $label }}
</span>
