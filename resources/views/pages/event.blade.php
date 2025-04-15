@extends('layouts.app')

@section('page-title', 'Event')

@section('content')
    <!-- Grid Section -->
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- Card 1 -->
        <x-card-container title="Ganti Event">
            <form>
                <!-- Section -->
                <div
                    class="py-6 border-t border-gray-200 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="mt-2 space-y-3">
                        <input id="af-payment-billing-contact" type="text"
                            class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Acara">
                        <input type="text"
                            class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Jam">
                        <input type="text"
                            class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Tanggal">
                        <input type="text"
                            class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="Iframe Website">
                    </div>
                </div>
                <div class="flex items-center hs-tooltip gap-x-3">
                    <label for="hs-tooltip-example" class="relative inline-block h-6 cursor-pointer hs-tooltip-toggle w-11">
                        <input type="checkbox" id="hs-tooltip-example" class="sr-only peer">
                        <span
                            class="absolute inset-0 transition-colors duration-200 ease-in-out bg-gray-200 rounded-full peer-checked:bg-blue-600 peer-disabled:pointer-events-none peer-disabled:opacity-50 dark:bg-neutral-700 dark:peer-checked:bg-blue-500"></span>
                        <span
                            class="shadow-xs absolute start-0.5 top-1/2 size-5 -translate-y-1/2 rounded-full bg-white transition-transform duration-200 ease-in-out peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                    </label>
                    <label for="hs-tooltip-example" class="text-sm text-gray-500 dark:text-neutral-400">Tampilkan nama event
                        di cover</label>
                </div>
                <!-- End Section -->
            </form>

            <div class="flex justify-end mt-5 gap-x-2">
                <x-button variant="primary">Update</x-button>
            </div>
        </x-card-container>
        <!-- End Card 1 -->

        <!-- Card 2 -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="inline-block min-w-full p-1.5 align-middle">
                    <div
                        class="overflow-hidden bg-white border border-gray-200 shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800">
                        <!-- Header -->
                        <div
                            class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:items-center md:justify-between dark:border-neutral-700">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                    Guess Category Table
                                </h2>
                            </div>

                            <div>
                                <x-button variant="add">Add Guess</x-button>
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

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Category Name
                                            </span>
                                        </div>
                                    </th>
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
                                    <td class="h-px w-[16.7%] whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Family</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-1.5">
                                            <div class="flex items-center gap-x-3">

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
        <!-- End Card 2 -->
    </div>
    <!-- End Grid Section -->
@endsection
