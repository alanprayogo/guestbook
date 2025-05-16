<div
    class="shadow-2xs flex flex-col rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
    <div class="p-4 md:p-5">
        <div class="flex items-center gap-x-2">
            <p class="text-xs uppercase text-gray-500 dark:text-neutral-500">
                {{ $title }}
            </p>
        </div>
        <div class="mt-1 flex items-center gap-x-2">
            <h3 class="text-xl font-medium text-gray-800 sm:text-2xl dark:text-neutral-200">
                {{ $value }}
            </h3>
        </div>
    </div>
    <a href="{{ $href }}"
        class="focus:outline-hidden inline-flex items-center justify-between rounded-b-xl border-t border-gray-200 px-4 py-3 text-sm text-gray-600 hover:bg-gray-50 focus:bg-gray-50 md:px-5 dark:border-neutral-600 dark:text-neutral-400 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
        Show Detail
        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6" />
        </svg>
    </a>
</div>
