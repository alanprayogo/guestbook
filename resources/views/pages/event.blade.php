@extends('layouts.app')

@section('content')
    <!-- Section -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Card 1 -->
        <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
            <form>
                <div class="flex h-full flex-col">
                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">Expiration Date</label>
                    <input type="text" id="expiration-date"
                        class="shadow-2xs mt-2 block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="MM/YY">
                    <div class="mt-auto flex justify-end gap-x-2 pt-5">
                        <button type="button"
                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Clear
                        </button>
                        <button type="button"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Card 2 -->
        <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
            <form>
                <div class="flex h-full flex-col">
                    <label for="city-select-2" class="block text-sm font-medium dark:text-white">City</label>
                    <select id="city-select-2"
                        class="shadow-2xs mt-2 block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected>Select a city</option>
                        <option>City 1</option>
                        <option>City 2</option>
                        <option>City 3</option>
                    </select>
                    <div class="mt-auto flex justify-end gap-x-2 pt-5">
                        <div class="invisible h-[42px]"></div>
                    </div>
                    <div class="mt-auto flex justify-end gap-x-2 pt-5">
                        <button type="button"
                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Clear
                        </button>
                        <button type="button"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Card 3 -->
        <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
            <form>
                <div class="flex h-full flex-col">
                    <label for="expiration-date-2" class="block text-sm font-medium dark:text-white">Expiration Date</label>
                    <input type="text" id="expiration-date-2"
                        class="shadow-2xs mt-2 block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="MM/YY">
                    <div class="mt-auto flex justify-end gap-x-2 pt-5">
                        <button type="button"
                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Clear
                        </button>
                        <button type="button"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Card 4 -->
        <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
            <form>
                <div class="flex h-full flex-col">
                    <label for="expiration-date-2" class="block text-sm font-medium dark:text-white">Expiration Date</label>
                    <input type="text" id="expiration-date-2"
                        class="shadow-2xs mt-2 block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="MM/YY">
                    <div class="mt-auto flex justify-end gap-x-2 pt-5">
                        <button type="button"
                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Clear
                        </button>
                        <button type="button"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End Section -->
@endsection
