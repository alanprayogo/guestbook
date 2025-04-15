@extends('layouts.app')

@section('content')
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
                        <div class="sm:col-span-1">
                            <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                            <div class="relative">
                                <input type="text" id="hs-as-table-product-review-search"
                                    name="hs-as-table-product-review-search"
                                    class="block w-full px-3 py-2 text-sm border-gray-200 rounded-lg ps-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="Search">
                                <div class="absolute inset-y-0 flex items-center pointer-events-none start-0 ps-4">
                                    <svg class="text-gray-400 size-4 shrink-0 dark:text-neutral-500"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <circle cx="11" cy="11" r="8" />
                                        <path d="m21 21-4.3-4.3" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <!-- End Input -->

                        <div>
                            <x-button href="#"
                                icon='
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg>
                                '>
                                Add user
                            </x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="py-3 ps-6 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                            No
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="py-3 pe-6 ps-6 text-start lg:ps-3 xl:ps-0">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                            Username
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                            Phone
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                            Role
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                            Created
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
                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">085791174251</span>
                                    </div>
                                </td>
                                <td class="h-px w-[16.7%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span
                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">admin</span>
                                    </div>
                                </td>
                                <td class="h-px w-[16.7%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec, 15:20</span>
                                    </div>
                                </td>
                                <td class="size-px whitespace-nowrap">
                                    <div class="px-6 py-1.5">
                                        <div class="flex items-center gap-x-3">

                                            <x-action-button variant="edit" />
                                            <x-action-button variant="delete" />

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
