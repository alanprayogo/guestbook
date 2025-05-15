@extends('layouts.app')

@section('page-title', 'Settings')

@section('content')
    <x-tabs.container>
        <x-tabs.tab-button tab="general" active="true">General</x-tabs.tab-button>
        <x-tabs.tab-button tab="smtp">SMTP Mail</x-tabs.tab-button>
    </x-tabs.container>

    <div class="mt-3">
        <x-tabs.tab-panel tab="general" active="true">
            {{-- Konten General --}}
            <!-- Card -->
            <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                        General
                    </h2>
                </div>

                <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Section -->
                    <div
                        class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">

                        <div class="mt-2 space-y-3">
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="city-select-1" class="block text-sm font-medium dark:text-white">
                                        Timezone
                                    </label>
                                    <select id="city-select-1"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected>Select a city</option>
                                        <option>City 1</option>
                                        <option>City 2</option>
                                        <option>City 3</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Ganti Logo Dashboard
                                    </label>
                                    <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                    <input type="file" name="logo_dashboard" accept="image/*"
                                        id="af-submit-application-resume-cv"
                                        class="block w-full rounded-lg border border-gray-200 shadow-sm file:me-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Ganti Backgorund Gathering
                                    </label>
                                    <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                    <input type="file" name="bg_gathering" accept="video/mp4"
                                        id="af-submit-application-resume-cv" accept=".mp4, .mkv"
                                        class="block w-full rounded-lg border border-gray-200 shadow-sm file:me-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Ganti Backgorund Welcome
                                    </label>
                                    <label for="af-submit-application-resume-cv" class="sr-only">Choose file</label>
                                    <input type="file" name="bg_video_welcome" accept="video/mp4"
                                        id="af-submit-application-resume-cv" accept=".mp4, .mkv"
                                        class="block w-full rounded-lg border border-gray-200 shadow-sm file:me-4 file:border-0 file:bg-gray-100 file:px-4 file:py-2 focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Pilih Mode Backgroud
                                    </label>
                                    <label for="hs-tooltip-example"
                                        class="hs-tooltip-toggle relative inline-block h-6 w-11 cursor-pointer">
                                        <input type="checkbox" id="hs-tooltip-example" class="peer sr-only">
                                        <span
                                            class="absolute inset-0 rounded-full bg-gray-200 transition-colors duration-200 ease-in-out peer-checked:bg-blue-600 peer-disabled:pointer-events-none peer-disabled:opacity-50 dark:bg-neutral-700 dark:peer-checked:bg-blue-500"></span>
                                        <span
                                            class="shadow-xs absolute start-0.5 top-1/2 size-5 -translate-y-1/2 rounded-full bg-white transition-transform duration-200 ease-in-out peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                                    </label>
                                    <label for="hs-tooltip-example"
                                        class="text-sm text-gray-500 dark:text-neutral-400">Aktifkan Background Mode
                                        Gambar</label>
                                </div>
                                <div class="w-full">
                                    <label for="hs-color-input" class="mb-2 block text-sm font-medium dark:text-white">Style
                                        Welcome Color</label>
                                    <input type="color"
                                        class="block h-10 w-14 cursor-pointer rounded-lg border border-gray-200 bg-white p-1 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-900"
                                        id="hs-color-input" value="#2563eb" title="Choose your color">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Speed Timer
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Style Welcome Text
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Style Font Tamu
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Api Key Starsender
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Style Welcome Font
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Aktifkan Starsender
                                    </label>
                                    <label for="hs-tooltip-example"
                                        class="hs-tooltip-toggle relative inline-block h-6 w-11 cursor-pointer">
                                        <input type="checkbox" id="hs-tooltip-example" class="peer sr-only">
                                        <span
                                            class="absolute inset-0 rounded-full bg-gray-200 transition-colors duration-200 ease-in-out peer-checked:bg-blue-600 peer-disabled:pointer-events-none peer-disabled:opacity-50 dark:bg-neutral-700 dark:peer-checked:bg-blue-500"></span>
                                        <span
                                            class="shadow-xs absolute start-0.5 top-1/2 size-5 -translate-y-1/2 rounded-full bg-white transition-transform duration-200 ease-in-out peer-checked:translate-x-full dark:bg-neutral-400 dark:peer-checked:bg-white"></span>
                                    </label>
                                    <label for="hs-tooltip-example"
                                        class="text-sm text-gray-500 dark:text-neutral-400">Aktifkan notifikasi whatsapp
                                        dengan starsender</label>
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Size Welcome Font
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Api Key Onesender
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Api Url Onesender
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="button"
                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                            Cancel
                        </button>
                        <button type="submit"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Save changes
                        </button>
                    </div>
                    <!-- End Section -->
                </form>

            </div>
            <!-- End Card -->
        </x-tabs.tab-panel>

        <x-tabs.tab-panel tab="smtp">
            {{-- Konten SMTP --}}
            <!-- Card -->
            <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                        SMTP Mail
                    </h2>
                </div>

                <form>

                    <!-- Section -->
                    <div
                        class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">

                        <div class="mt-2 space-y-3">
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Email Pengirim
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Nama Pengirim
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        SMTP Host
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                            </div>
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
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        SMTP Port
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        SMTP Username
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-full">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        SMTP Password
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
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
            <!-- Card -->
            <div class="shadow-xs rounded-xl bg-white p-4 sm:p-7 dark:bg-neutral-900">
                <div class="mb-8 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 md:text-3xl dark:text-neutral-200">
                        Test Kirim Email
                    </h2>
                </div>

                <form>

                    <!-- Section -->
                    <div
                        class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">
                        <div class="mt-2 space-y-3">
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-3/4">
                                    <label for="expiration-date" class="block text-sm font-medium dark:text-white">
                                        Email Address
                                    </label>
                                    <input type="text" id="expiration-date"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="MM/YY">
                                </div>
                                <div class="w-1/4">
                                    <div class="mt-5 flex justify-end gap-x-2">
                                        <button type="button"
                                            class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 sm:py-2 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                                            Cancel
                                        </button>
                                        <button type="button"
                                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                                            Send Email
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Section -->
                </form>

            </div>
            <!-- End Card -->
        </x-tabs.tab-panel>
    </div>
    @if (session('success'))
        <div id="toast-success"
            class="fixed right-5 top-5 z-50 hidden w-full max-w-xs rounded-lg bg-green-100 p-4 text-green-800 shadow-lg dark:bg-green-800 dark:text-green-200"
            role="alert">
            <div class="flex items-center">
                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M16.707 5.293a1 1 0 010 1.414L8.414 15l-4.121-4.121a1 1 0 111.414-1.414L8.414 12.586l7.879-7.879a1 1 0 011.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if (session('error'))
        <div id="toast-error"
            class="fixed right-5 top-5 z-50 hidden w-full max-w-xs rounded-lg bg-red-100 p-4 text-red-800 shadow-lg dark:bg-red-800 dark:text-red-200"
            role="alert">
            <div class="flex items-center">
                <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v4a1 1 0 102 0zm-1 6a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const toastSuccess = document.getElementById("toast-success");
            const toastError = document.getElementById("toast-error");

            if (toastSuccess) {
                toastSuccess.classList.remove("hidden");
                setTimeout(() => toastSuccess.classList.add("hidden"), 4000);
            }

            if (toastError) {
                toastError.classList.remove("hidden");
                setTimeout(() => toastError.classList.add("hidden"), 4000);
            }
        });
    </script>
@endsection
