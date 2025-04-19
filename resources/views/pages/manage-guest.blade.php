@extends('layouts.app')

@section('page-title', 'Guess Management')

@section('content')

    <x-tabs.container>
        <x-tabs.tab-button tab="guessbook" active="true">Guess Book</x-tabs.tab-button>
        <x-tabs.tab-button tab="broadcast">Broadcast</x-tabs.tab-button>
    </x-tabs.container>

    <div class="mt-3">
        <x-tabs.tab-panel tab="guessbook" active="true">
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
                                    <x-button variant="export-excel">Export Excel</x-button>
                                    <x-button variant="export-pdf">Export PDF</x-button>
                                    <x-button variant="import-excel">Import Excel</x-button>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <table id="guestsTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead class="bg-gray-50 dark:bg-neutral-800">
                                    <tr>
                                        <th scope="col" class="py-3 ps-6 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    No
                                                </span>
                                            </div>
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
                                                    Category
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Session
                                                </span>
                                            </div>
                                        </th>

                                        <th scope="col" class="px-6 py-3 text-start">
                                            <div class="flex items-center gap-x-2">
                                                <span
                                                    class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                    Limit
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

                                        <th scope="col" class="px-6 py-3 text-end"></th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                    @foreach ($listGuest as $data)
                                        <tr>
                                            <td class="h-px w-[8.3%] whitespace-nowrap">
                                                <div class="py-3 ps-6">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</span>
                                                </div>
                                            </td>
                                            <td class="h-px w-1/4 whitespace-nowrap">
                                                <div class="py-3 pe-6 ps-6 lg:ps-3 xl:ps-0">
                                                    <div class="grow">
                                                        <span
                                                            class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $data->guest_name }}</span>
                                                        <span
                                                            class="block text-sm text-gray-500 dark:text-neutral-500">{{ $data->guest_phone }}</span>
                                                    </div>
                                            </td>
                                            <td class="h-px w-[16.7%] whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $data->broadcast->category->category_name }}</span>
                                                </div>
                                            </td>
                                            <td class="h-px w-[16.7%] whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $data->broadcast->session }}</span>
                                                </div>
                                            </td>
                                            <td class="h-px w-[16.7%] whitespace-nowrap">
                                                <div class="px-6 py-3">
                                                    <span
                                                        class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $data->broadcast->guest_limit }}</span>
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
                                    @endforeach
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
        </x-tabs.tab-panel>

        <x-tabs.tab-panel tab="broadcast">
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

                <form action="{{ route('manage-guest.store') }}" method="POST">
                    @csrf
                    <!-- Section -->
                    <div
                        class="border-t border-gray-200 py-6 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">
                        <div class="mt-2 space-y-3">
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="yang-mengundang" class="block text-sm font-medium dark:text-white">
                                        Yang Mengundang
                                    </label>
                                    <input type="text" id="yang-mengundang"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        placeholder="Aku & Kamu">
                                </div>
                                <div class="w-full">
                                    <label for="sesi" class="block text-sm font-medium dark:text-white">
                                        Sesi (Nomor Kursi)
                                    </label>
                                    <select id="sesi" name="session"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected disabled>Silahkan Pilih Kursi</option>
                                        <option>Kursi 1</option>
                                        <option>Kursi 2</option>
                                        <option>Kursi 3</option>
                                        <option>Kursi 4</option>
                                        <option>Kursi 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="category" class="block text-sm font-medium dark:text-white">
                                        Category
                                    </label>
                                    <select id="category" name="category_id"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected disabled>Pilih Kategori Tamu</option>
                                        @foreach ($category as $data)
                                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="limit-tamu" class="block text-sm font-medium dark:text-white">
                                        Limit Tamu
                                    </label>
                                    <select id="limit-tamu" name="guest_limit"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected>1 Orang</option>
                                        <option>2 Orang</option>
                                        <option>3 Orang</option>
                                        <option>4 Orang</option>
                                        <option>5 Orang</option>
                                        <option>6 Orang</option>
                                    </select>
                                </div>
                            </div>
                            <div class="space-y-2">
                                <label for="af-submit-app-description" class="block text-sm font-medium dark:text-white">
                                    List Nama Undangan
                                </label>
                                <p class="block text-sm font-medium dark:text-white">
                                    * <strong>Gunakan baris baru (↵)</strong> untuk memisahkan nama yang akan diundang.
                                </p>
                                <textarea id="af-submit-app-description" name="guest_name"
                                    class="block w-full rounded-lg border-gray-200 px-3 py-1.5 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    rows="6"
                                    placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                            </div>
                            <div class="space-y-2">
                                <span class="block text-sm font-medium dark:text-white">Teks Pengantar</span>
                                <nav class="flex gap-x-1" aria-label="Tabs" role="tablist"
                                    aria-orientation="horizontal">
                                    <button type="button"
                                        class="inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 disabled:pointer-events-none disabled:opacity-50 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300 hs-tab-active:dark:text-white"
                                        data-hs-tab="#tab-formal" role="tab"
                                        data-template="Dengan hormat, kami mengundang Anda ke acara kami.">
                                        Formal
                                    </button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-muslim"
                                        data-template="Assalamu'alaikum warahmatullahi wabarakatuh. Terima kasih atas kehadiran Anda."
                                        role="tab">Muslim</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-nasrani"
                                        data-template="Tuhan memberkati Anda yang telah hadir dan mendoakan kebahagiaan kami."
                                        role="tab">Nasrani</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-hindu"
                                        data-template="Om Swastyastu. Terima kasih telah menghadiri acara kami."
                                        role="tab">Hindu</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-birthday"
                                        data-template="Selamat ulang tahun! Semoga selalu diberi kesehatan dan kebahagiaan."
                                        role="tab">Birthday</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-english"
                                        data-template="Thank you for joining our special occasion. We are deeply honored."
                                        role="tab">English</button>
                                </nav>

                                <span class="block text-sm font-medium dark:text-white">Isi Kata Pengantar</span>
                                <div class="mt-3">
                                    <textarea id="text-pengantar" rows="5" name="kata_pengantar"
                                        class="w-full rounded-lg border border-gray-300 p-3 text-sm text-gray-700 dark:border-gray-600 dark:bg-gray-800 dark:text-white"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Section -->

                    <div class="mt-5 flex justify-end gap-x-2">
                        <button type="submit"
                            class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-1.5 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50 sm:py-2">
                            Save changes
                        </button>
                </form>
            </div>
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
        document.addEventListener('DOMContentLoaded', function() {
            const buttons = document.querySelectorAll('[data-template]');
            const textarea = document.getElementById('text-pengantar');

            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const text = this.getAttribute('data-template');
                    textarea.value = text;
                });
            });

            // Trigger klik setelah preline selesai inisialisasi
            window.HSStaticMethods.autoInit(); // Inisialisasi ulang komponen preline

            const defaultButton = document.querySelector('[data-hs-tab="#tab-formal"]');
            if (defaultButton) {
                defaultButton.click(); // Klik tombol formal setelah HS tab aktif
            }
        });
    </script>

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
