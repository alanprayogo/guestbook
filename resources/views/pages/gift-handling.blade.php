@extends('layouts.app')

@section('page-title', 'Gift Handling')

@section('content')
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div
                    class="shadow-2xs overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                    <!-- Header -->
                    <div
                        class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between dark:border-neutral-700">
                        <!-- Input -->
                        <x-search-input id="hs-as-table-product-review-search" name="product-review-search"
                            label="Search Produk" placeholder="Search" class="sm:col-span-1" />
                        <!-- End Input -->

                        <div>
                            <x-button variant="add">Add Guess</x-button>
                            <x-button variant="scan-qr">Scan QR</x-button>
                            <x-button variant="export-excel">Export Excel</x-button>
                            <x-button variant="export-pdf">Export PDF</x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="py-3 ps-6 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            No
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="py-3 pe-6 ps-6 text-start lg:ps-3 xl:ps-0">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Name
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Category
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Session
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Limit
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
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
                                <td class="h-px w-1/4 whitespace-nowrap">
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
                                        <x-status-badge status="accepted" />
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-1.5">
                                        <div class="flex items-center gap-x-3">

                                            <x-action-button variant="qr-code" />
                                            <x-action-button variant="edit" />

                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div
                        class="grid gap-3 border-t border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between dark:border-neutral-700">
                        <div class="max-w-sm space-y-3">
                            <span class="font-semibold text-gray-800 dark:text-neutral-200">Show</span>
                            <select
                                class="inline rounded-lg border-gray-200 px-3 py-2 pe-9 text-sm focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400">
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
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6" />
                                    </svg>
                                    Prev
                                </button>

                                <button type="button"
                                    class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-2 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-transparent dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                    Next
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
@endsection
