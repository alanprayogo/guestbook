<div class="{{ $class }}">
    <label for="{{ $id }}" class="sr-only">{{ $label }}</label>
    <div class="relative">
        <input type="text" id="{{ $id }}" name="{{ $name }}"
            class="block w-full rounded-lg border-gray-200 px-3 py-2 ps-11 text-sm focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
            placeholder="{{ $placeholder }}">
        <div class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-4">
            <svg class="size-4 shrink-0 text-gray-400 dark:text-neutral-500" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8" />
                <path d="m21 21-4.3-4.3" />
            </svg>
        </div>
    </div>
</div>
