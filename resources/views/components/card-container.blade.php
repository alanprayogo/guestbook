<div {{ $attributes->merge(['class' => 'p-4 bg-white shadow-xs rounded-xl sm:p-7 dark:bg-neutral-900']) }}>
    @if ($title)
        <div class="mb-8 text-start">
            <h1 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                {{ $title }}
            </h1>
        </div>
    @endif

    {{ $slot }}
</div>
