@extends('layouts.app')

@section('page-title', 'Guess Management')

@section('content')
    <nav class="relative z-0 flex overflow-hidden border border-gray-200 rounded-xl dark:border-neutral-700" aria-label="Tabs"
        role="tablist" aria-orientation="horizontal">
        <button type="button"
            class="relative flex-1 min-w-0 px-4 py-4 overflow-hidden text-sm font-medium text-center text-gray-500 bg-white border-b-2 border-gray-200 focus:outline-hidden active border-s first:border-s-0 hover:bg-gray-50 hover:text-gray-700 focus:z-10 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:border-b-neutral-700 dark:border-l-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:hs-tab-active:border-b-blue-600 dark:hs-tab-active:text-white"
            id="bar-with-underline-item-1" aria-selected="true" data-hs-tab="#bar-with-underline-1"
            aria-controls="bar-with-underline-1" role="tab">
            Guest Book
        </button>
        <button type="button"
            class="relative flex-1 min-w-0 px-4 py-4 overflow-hidden text-sm font-medium text-center text-gray-500 bg-white border-b-2 border-gray-200 focus:outline-hidden border-s first:border-s-0 hover:bg-gray-50 hover:text-gray-700 focus:z-10 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:border-b-neutral-700 dark:border-l-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:hs-tab-active:border-b-blue-600 dark:hs-tab-active:text-white"
            id="bar-with-underline-item-2" aria-selected="false" data-hs-tab="#bar-with-underline-2"
            aria-controls="bar-with-underline-2" role="tab">
            Broadcast
        </button>
    </nav>

    <div class="mt-3">
        <div id="bar-with-underline-1" role="tabpanel" aria-labelledby="bar-with-underline-item-1">

            <!-- Card -->
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="inline-block min-w-full p-1.5 align-middle">
                        <div
                            class="overflow-hidden bg-white border border-gray-200 shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800">
                            <!-- Header -->
                            <div
                                class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:items-center md:justify-between dark:border-neutral-700">
                                <!-- Input -->
                                <x-search-input id="hs-as-table-product-review-search" name="product-review-search"
                                    label="Search Produk" placeholder="Search" class="sm:col-span-1" />
                                <!-- End Input -->

                                <div>
                                    <x-button variant="add">Add Guess</x-button>
                                    <x-button variant="export-excel">Export Excel</x-button>
                                    <x-button variant="export-pdf">Export PDF</x-button>
                                    <x-button variant="import-excel">Import Excel</x-button>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="py-3 ps-6 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    No
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="py-3 pe-6 ps-6 text-start lg:ps-3 xl:ps-0">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Name
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Category
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Session
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Limit
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Relation
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                    Status
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-end"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tr>
                                        <td class="h-px w-[8.3%] whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">1</span>
                                            </div>
                                        </td>
                                        <td class="w-1/4 h-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="grow">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Jessica
                                                        Williams</span>
                                                    <span
                                                        class="block text-sm text-gray-500 dark:text-neutral-500">myhairisred@site.com</span>
                                                </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">VIP</span>
                                            </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">1</span>
                                            </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">2</span>
                                            </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Family</span>
                                            </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <x-status-badge status="accepted" />
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <div class="flex items-center gap-x-3">

                                                    <x-action-button variant="share" />
                                                    <x-action-button variant="edit" />
                                                    <x-action-button variant="delete" />
                                                    <x-action-button variant="send" />
                                                    <x-action-button variant="download" />

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table -->

                            <!-- Footer -->
                            <div
                                class="grid gap-3 px-6 py-4 border-t border-gray-200 md:flex md:items-center md:justify-between dark:border-neutral-700">
                                <div class="max-w-sm space-y-3">
                                    <span class="font-semibold text-gray-800 dark:text-neutral-200">Show</span>
                                    <select
                                        class="inline px-3 py-2 text-sm border-gray-200 rounded-lg pe-9 focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option selected>5</option>
                                        <option>6</option>
                                    </select>
                                    <span class="font-semibold text-gray-800 dark:text-neutral-200">entries</span>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <button type="button"
                                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-2 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-transparent dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                            <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m15 18-6-6 6-6" />
                                            </svg>
                                            Prev
                                        </button>

                                        <button type="button"
                                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-2 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-transparent dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                            Next
                                            <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m9 18 6-6-6-6" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- End Footer -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->

        </div>
        <div id="bar-with-underline-2" class="hidden" role="tabpanel" aria-labelledby="bar-with-underline-item-2">

            <!-- Card -->
            <div class="p-4 bg-white shadow-xs rounded-xl sm:p-7 dark:bg-neutral-900">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                        Send Attarivitation Kit
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                        URL Anda: https://attarivitation.com/hamid-khalisha
                    </p>
                </div>

                <form>

                    <!-- Section -->
                    <div
                        class="py-6 border-t border-gray-200 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">

                        <div class="mt-2 space-y-3">
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Expiration Date
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="city-select-1" class="block text-sm font-medium dark:text-white">
                                        City
                                    </label>
                                    <select id="city-select-1"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected>Select a city</option>
                                        <option>City 1</option>
                                        <option>City 2</option>
                                        <option>City 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="city-select-2" class="block text-sm font-medium dark:text-white">
                                        City
                                    </label>
                                    <select id="city-select-2"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected>Select a city</option>
                                        <option>City 1</option>
                                        <option>City 2</option>
                                        <option>City 3</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="state-select" class="block text-sm font-medium dark:text-white">
                                        State
                                    </label>
                                    <select id="state-select"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected>Select a state</option>
                                        <option>State 1</option>
                                        <option>State 2</option>
                                        <option>State 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="af-submit-app-description" class="block text-sm font-medium dark:text-white">
                                    Description
                                </label>
                                <textarea id="af-submit-app-description"
                                    class="block w-full rounded-lg border-gray-200 px-3 py-1.5 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    rows="6"
                                    placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- End Section -->
                </form>

                <div class="flex justify-end mt-5 gap-x-2">
                    <button type="button"
                        class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        Cancel
                    </button>
                    <button type="button"
                        class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                        Save changes
                    </button>
                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
@endsection
