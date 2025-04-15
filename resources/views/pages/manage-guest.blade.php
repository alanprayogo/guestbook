@extends('layouts.app')

@section('content')
    <nav class="relative z-0 flex overflow-hidden rounded-xl border border-gray-200 dark:border-neutral-700" aria-label="Tabs"
        role="tablist" aria-orientation="horizontal">
        <button type="button"
            class="focus:outline-hidden active relative min-w-0 flex-1 overflow-hidden border-b-2 border-s border-gray-200 bg-white px-4 py-4 text-center text-sm font-medium text-gray-500 first:border-s-0 hover:bg-gray-50 hover:text-gray-700 focus:z-10 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:border-b-neutral-700 dark:border-l-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:hs-tab-active:border-b-blue-600 dark:hs-tab-active:text-white"
            id="bar-with-underline-item-1" aria-selected="true" data-hs-tab="#bar-with-underline-1"
            aria-controls="bar-with-underline-1" role="tab">
            Guest Book
        </button>
        <button type="button"
            class="focus:outline-hidden relative min-w-0 flex-1 overflow-hidden border-b-2 border-s border-gray-200 bg-white px-4 py-4 text-center text-sm font-medium text-gray-500 first:border-s-0 hover:bg-gray-50 hover:text-gray-700 focus:z-10 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-900 dark:border-b-neutral-700 dark:border-l-neutral-700 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-400 dark:hs-tab-active:border-b-blue-600 dark:hs-tab-active:text-white"
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
                            class="shadow-2xs overflow-hidden rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                            <!-- Header -->
                            <div
                                class="grid gap-3 border-b border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between dark:border-neutral-700">
                                <div>
                                    <h2 class="text-xl font-semibold text-gray-800 dark:text-neutral-200">
                                        Users
                                    </h2>
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        Add users, edit and more.
                                    </p>
                                </div>

                                <div>
                                    <div class="inline-flex gap-x-2">
                                        <a class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-transparent dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                                            href="#">
                                            View all
                                        </a>

                                        <a class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50"
                                            href="#">
                                            <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M5 12h14" />
                                                <path d="M12 5v14" />
                                            </svg>
                                            Add user
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="py-3 ps-6 text-start">
                                            <label for="hs-at-with-checkboxes-main" class="flex">
                                                <input type="checkbox"
                                                    class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-main">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </th>

                                        <th scope="col" class="py-3 pe-6 ps-6 text-start lg:ps-3 xl:ps-0">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Name
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Position
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Status
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Portfolio
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Created
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-end"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-1" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-1">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1531927557220-a9e23c1e4794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Christina
                                                            Bersh</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">christina@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Director</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Human
                                                    resources</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">1/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 25%" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">28 Dec,
                                                    12:12</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-2" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-2">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">David
                                                            Harrison</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">david@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                    products</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-yellow-100 px-1.5 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    Warning
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 78%" aria-valuenow="78"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                    09:27</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-3" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-3">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-9.5 inline-flex items-center justify-center rounded-full border border-gray-300 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                                                        <span
                                                            class="text-sm font-medium text-gray-800 dark:text-neutral-200">A</span>
                                                    </span>
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Anne
                                                            Richard</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">anne@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                    department</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 100%" aria-valuenow="100"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                    15:20</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-4" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-4">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1541101767792-f9b2b1c4f127?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&&auto=format&fit=facearea&facepad=3&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Samia
                                                            Kartoon</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">samia@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Executive
                                                    director</span>
                                                <span
                                                    class="block text-sm text-gray-500 dark:text-neutral-500">Marketing</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">0/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 1%" aria-valuenow="1"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                    15:20</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-5" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-5">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-9.5 inline-flex items-center justify-center rounded-full border border-gray-300 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                                                        <span
                                                            class="text-sm font-medium text-gray-800 dark:text-neutral-200">D</span>
                                                    </span>
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">David
                                                            Harrison</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">david@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Developer</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Mobile
                                                    app</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-red-100 px-1.5 py-1 text-xs font-medium text-red-800 dark:bg-red-500/10 dark:text-red-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    Danger
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 78%" aria-valuenow="78"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">15 Dec,
                                                    14:41</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-6" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-6">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Brian
                                                            Halligan</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">brian@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Accountant</span>
                                                <span
                                                    class="block text-sm text-gray-500 dark:text-neutral-500">Finance</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">2/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 40%" aria-valuenow="40"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">11 Dec,
                                                    18:51</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-7" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-7">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1659482634023-2c4fda99ac0c?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2.5&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Andy
                                                            Clerk</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">andy@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Director</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Human
                                                    resources</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">1/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 25%" aria-valuenow="25"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">28 Dec,
                                                    12:12</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-8" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-8">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1601935111741-ae98b2b230b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Bart
                                                            Simpson</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">Bart@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                    products</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-yellow-100 px-1.5 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    Warning
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 78%" aria-valuenow="78"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                    09:27</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-9" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-9">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-9.5 inline-flex items-center justify-center rounded-full border border-gray-300 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                                                        <span
                                                            class="text-sm font-medium text-gray-800 dark:text-neutral-200">C</span>
                                                    </span>
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Camila
                                                            Welters</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">cwelt@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                    department</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 100%" aria-valuenow="100"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                    15:20</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-10" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-10">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Oliver
                                                            Schevich</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">oliver@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Seller</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">Branding
                                                    products</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-yellow-100 px-1.5 py-1 text-xs font-medium text-yellow-800 dark:bg-yellow-500/10 dark:text-yellow-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                                    </svg>
                                                    Warning
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">3/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 78%" aria-valuenow="78"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">20 Dec,
                                                    09:27</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-11" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-11">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <span
                                                        class="size-9.5 inline-flex items-center justify-center rounded-full border border-gray-300 bg-white dark:border-neutral-700 dark:bg-neutral-800">
                                                        <span
                                                            class="text-sm font-medium text-gray-800 dark:text-neutral-200">I</span>
                                                    </span>
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Inna
                                                            Ivy</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">invy@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Designer</span>
                                                <span class="block text-sm text-gray-500 dark:text-neutral-500">IT
                                                    department</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">5/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 100%" aria-valuenow="100"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                    15:20</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <label for="hs-at-with-checkboxes-12" class="flex">
                                                    <input type="checkbox"
                                                        class="shrink-0 rounded-sm border-gray-300 text-blue-600 checked:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-600 dark:bg-neutral-800 dark:checked:border-blue-500 dark:checked:bg-blue-500 dark:focus:ring-offset-gray-800"
                                                        id="hs-at-with-checkboxes-12">
                                                    <span class="sr-only">Checkbox</span>
                                                </label>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                <div class="flex items-center gap-x-3">
                                                    <img class="size-9.5 inline-block rounded-full"
                                                        src="https://images.unsplash.com/photo-1670272505340-d906d8d77d03?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                                                        alt="Avatar">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Jessica
                                                            Williams</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">myhairisred@site.com</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="h-px w-72 whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">Executive
                                                    director</span>
                                                <span
                                                    class="block text-sm text-gray-500 dark:text-neutral-500">Marketing</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="inline-flex items-center gap-x-1 rounded-full bg-teal-100 px-1.5 py-1 text-xs font-medium text-teal-800 dark:bg-teal-500/10 dark:text-teal-500">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    Active
                                                </span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <div class="flex items-center gap-x-3">
                                                    <span class="text-xs text-gray-500 dark:text-neutral-500">0/5</span>
                                                    <div
                                                        class="flex h-1.5 w-full overflow-hidden rounded-full bg-gray-200 dark:bg-neutral-700">
                                                        <div class="flex flex-col justify-center overflow-hidden bg-gray-800 dark:bg-neutral-200"
                                                            role="progressbar" style="width: 1%" aria-valuenow="1"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span class="text-sm text-gray-500 dark:text-neutral-500">18 Dec,
                                                    15:20</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <a class="focus:outline-hidden inline-flex items-center gap-x-1 text-sm font-medium text-blue-600 decoration-2 hover:underline focus:underline dark:text-blue-500"
                                                    href="#">
                                                    Edit
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Table -->

                            <!-- Footer -->
                            <div
                                class="grid gap-3 border-t border-gray-200 px-6 py-4 md:flex md:items-center md:justify-between dark:border-neutral-700">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-neutral-400">
                                        <span class="font-semibold text-gray-800 dark:text-neutral-200">12</span> results
                                    </p>
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
            <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
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
                        class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">

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

                <div class="mt-5 flex justify-end gap-x-2">
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
