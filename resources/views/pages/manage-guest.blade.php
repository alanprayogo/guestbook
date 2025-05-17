@extends('layouts.app')

@section('page-title', 'Guess Management')

@push('head')
    @vite(['resources/js/datatables-init.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/sort-icon.css') }}">
    <style>
        /* Styling khusus untuk DataTables dalam dark mode */
        .dark .dataTables_wrapper {
            color: #e5e7eb;
        }

        .dark .dataTables_wrapper .dataTables_filter input,
        .dark .dataTables_wrapper .dataTables_length select {
            background-color: #1f2937;
            color: #f3f4f6;
            border-color: #374151;
        }

        .dark .dataTables_wrapper .dataTables_paginate .paginate_button {
            color: #e5e7eb !important;
        }

        .dark .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            background-color: #374151 !important;
            border-color: #4b5563 !important;
            color: #ffffff !important;
        }
    </style>
@endpush
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
                                <div>
                                    <x-button variant="add">Add Guess</x-button>
                                    <x-button variant="export-excel">Export Excel</x-button>
                                    <x-button variant="export-pdf">Export PDF</x-button>
                                    <x-button variant="import-excel">Import Excel</x-button>
                                </div>
                            </div>
                            <!-- End Header -->

                            <!-- Table -->
                            <div class="overflow-x-auto">
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
                                                        <span class="sort-icon">
                                                            <span class="up">↑</span>
                                                            <span class="down">↓</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                        Category
                                                        <span class="sort-icon">
                                                            <span class="up">↑</span>
                                                            <span class="down">↓</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                        Session
                                                        <span class="sort-icon">
                                                            <span class="up">↑</span>
                                                            <span class="down">↓</span>
                                                        </span>
                                                    </span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-6 py-3 text-start">
                                                <div class="flex items-center gap-x-2">
                                                    <span
                                                        class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                        Limit
                                                        <span class="sort-icon">
                                                            <span class="up">↑</span>
                                                            <span class="down">↓</span>
                                                        </span>
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

                                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700"></tbody>
                                </table>
                            </div>
                            <!-- End Table -->
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
                                    <input type="text" id="yang-mengundang" name="yang_mengundang"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                        value="Iki & Iku" readonly>
                                </div>
                                <div class="w-full">
                                    <label for="sesi" class="block text-sm font-medium dark:text-white">
                                        Sesi
                                    </label>
                                    <select id="sesi" name="session"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected disabled>Silahkan Pilih Sesi</option>
                                        <option value="Sesi 1">Sesi 1</option>
                                        <option value="Sesi 2">Sesi 2</option>
                                        <option value="Sesi 3">Sesi 3</option>
                                        <option value="Sesi 4">Sesi 4</option>
                                        <option value="Sesi 5">Sesi 5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col gap-3 sm:flex-row">
                                <div class="w-full">
                                    <label for="url" class="block text-sm font-medium dark:text-white">
                                        Alamat URL
                                    </label>
                                    <select id="url" name="url"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected disabled>Pilih URL</option>
                                        <option value="byattari">By Attari</option>
                                        <option value="attarivation">Attarivation</option>
                                    </select>
                                </div>
                                <div class="w-full">
                                    <label for="nomor-meha" class="block text-sm font-medium dark:text-white">
                                        Nomor Meja
                                    </label>
                                    <select id="nomor-meha" name="no_table"
                                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                        <option selected disabled>Pilih Nomor Meja</option>
                                        <option value="Meja 1">Meja 1</option>
                                        <option value="Meja 2">Meja 2</option>
                                        <option value="Meja 3">Meja 3</option>
                                        <option value="Meja 4">Meja 4</option>
                                        <option value="Meja 5">Meja 5</option>
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
                                        <option value="1 Orang" selected>1 Orang</option>
                                        <option value="2 Orang">2 Orang</option>
                                        <option value="3 Orang">3 Orang</option>
                                        <option value="4 Orang">4 Orang</option>
                                        <option value="5 Orang">5 Orang</option>
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
                                        data-template="Yth. [nama]

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami :

*[mempelai]*

Berikut link undangan kami, untuk info lengkap dari acara bisa kunjungi :

[link-undangan]

Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.

*Note :*
_Jika link tidak bisa dibuka, silahkan copy link kemudian paste di Chrome atau Browser lainnya._
_Untuk tampilan terbaik, silahkan akses melalui Browser Chrome / Safari dan non-aktifkan Dark Mode / Mode Gelap._

Terima kasih banyak atas perhatiannya.
">
                                        Formal
                                    </button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-muslim"
                                        data-template="Yth. [nama]

Assalamualaikum Warahmatullahi Wabarakatuh

Dengan memohon Rahmat dan Ridho Allah SWT, dan tanpa mengurangi rasa hormat melalui pesan ini kami mengundang Bapak/Ibu/Saudara/I untuk menghadiri acara pernikahan kami :

*[mempelai]*

Berikut link undangan kami, untuk info lengkap dari acara bisa kunjungi :

[link-undangan]

Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.

*Note :*
_Jika link tidak bisa dibuka, silahkan copy link kemudian paste di Chrome atau Browser lainnya._
_Untuk tampilan terbaik, silahkan akses melalui Browser Chrome / Safari dan non-aktifkan Dark Mode / Mode Gelap._

Terima kasih banyak atas perhatiannya.

Wassalamualaikum Warahmatullahi Wabarakatuh
"
                                        role="tab">Muslim</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-nasrani"
                                        data-template="Yth. [nama]

Salam Sejahtera Bagi Kita Semua. Tuhan membuat segala sesuatu indah pada waktunya dan mempersatukan kami dalam suatu ikatan pernikahan kudus, semoga Tuhan memberkati dalam mengiringi pernikahan kami.

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami :

*[mempelai]*

Klik link undangan berikut, untuk info acara selengkapnya :

[link-undangan]

Merupakan suatu kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.

*Note :*
_Jika link tidak bisa dibuka, silahkan copy link kemudian paste di Chrome atau Browser lainnya._
_Untuk tampilan terbaik, silahkan akses melalui Browser Chrome / Safari dan non-aktifkan Dark Mode / Mode Gelap._

Terima kasih.
"
                                        role="tab">Nasrani</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-hindu"
                                        data-template="Yth. [nama]

Om Swastiastu

Tanpa mengurangi rasa hormat, perkenankan kami mengundang Bapak/Ibu/Saudara/i, teman sekaligus sahabat, untuk menghadiri acara pernikahan kami :

*[mempelai]*

Berikut link undangan kami, untuk info lengkap dari acara bisa kunjungi :

[link-undangan]

Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/Ibu/Saudara/i berkenan untuk hadir dan memberikan doa restu.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.

*Note :*
_Jika link tidak bisa dibuka, silahkan copy link kemudian paste di Chrome atau Browser lainnya._
_Untuk tampilan terbaik, silahkan akses melalui Browser Chrome / Safari dan non-aktifkan Dark Mode / Mode Gelap._

Terima kasih banyak atas perhatiannya.

Om Shanti, Shanti, Shanti, Om.
"
                                        role="tab">Hindu</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-birthday"
                                        data-template="Dear, *[nama]*

Assalamu'alaikum Wr. Wb.

Tanpa mengurangi rasa hormat perkenankan kami bermaksud mengundang teman-teman untuk menghadiri acara Ulang Tahun :

*[mempelai]*

Berikut link undangannya, untuk info lengkap dari acara bisa kunjungi :

[link-undangan]

Merupakan suatu kebahagiaan apabila teman-teman berkenan hadir di acara ulang tahun ini.

Mohon maaf perihal undangan hanya di bagikan melalui pesan ini.

Note :
_Jika link tidak bisa dibuka, silahkan copy link kemudian paste di Chrome atau Browser lainnya._
_Untuk tampilan terbaik, silahkan akses melalui Browser Chrome / Safari dan non-aktifkan Dark Mode / Mode Gelap._

Terima kasih banyak atas perhatiannya.
"
                                        role="tab">Birthday</button>

                                    <button type="button"
                                        class="focus:outline-hidden inline-flex flex-auto items-center justify-center gap-x-2 rounded-lg bg-transparent px-4 py-3 text-center text-sm font-medium text-gray-500 hover:text-blue-600 focus:text-blue-600 hs-tab-active:bg-blue-600 hs-tab-active:text-white dark:text-neutral-400 dark:hover:text-neutral-300"
                                        data-hs-tab="#tab-english"
                                        data-template="Dear.
Mr/Ms/Brother/Sister
*[nama]*

Without reducing our respect, please allow us to invite you, to attend our wedding.

*Following is our invitation link*, for complete information on the event, please visit:

[link-undangan]

It is a pleasure for us if you are willing to attend and give your blessing.

Thank You

Best regards,
[mempelai]
"
                                        role="tab">English</button>
                                </nav>

                                <span class="block text-sm font-medium dark:text-white">Isi Kata Pengantar</span>
                                <div class="mt-3">
                                    <textarea id="text-pengantar" rows="15" name="kata_pengantar"
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

    <!-- Modal Edit -->
    <div id="hs-static-backdrop-modal"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="pointer-events-auto flex flex-col rounded-xl border border-gray-200 bg-white shadow-lg dark:border-neutral-700 dark:bg-neutral-800">
                <!-- Header -->
                <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="text-lg font-bold text-gray-800 dark:text-white">
                        Edit Tamu
                    </h3>
                    <button type="button"
                        class="inline-flex size-8 items-center justify-center rounded-full border border-transparent bg-gray-100 text-gray-600 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-static-backdrop-modal">
                        <span class="sr-only">Close</span>
                        <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>

                <!-- Form Content -->
                <div class="overflow-y-auto p-4">
                    <form method="POST" id="editGuestForm">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="editGuestId">

                        <div class="space-y-4 p-2">
                            <!-- Nama Tamu -->
                            <div>
                                <label for="editGuestName"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nama Tamu
                                </label>
                                <input type="text" name="guest_name" id="editGuestName" required
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white"
                                    placeholder="Masukkan nama tamu" />
                            </div>

                            <!-- No. HP -->
                            <div>
                                <label for="editGuestPhone"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    No. HP
                                </label>
                                <input type="text" name="guest_phone" id="editGuestPhone" required
                                    class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white"
                                    placeholder="Contoh: 08123456789" />
                            </div>

                            <!-- Kategori Tamu -->
                            <div>
                                <label for="editGuestCategory"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Kategori Tamu
                                </label>
                                <select id="editGuestCategory" name="category_id"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white">
                                    <option value="" disabled selected>Pilih Kategori</option>
                                    @foreach ($category as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Nomor Meja -->
                            <div>
                                <label for="editGuestUrl"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    URL
                                </label>
                                <select id="editGuestUrl" name="url" required
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white">
                                    <option selected disabled>Pilih URL</option>
                                    <option value="byattari">By Attari</option>
                                    <option value="attarivation">Attarivation</option>
                                </select>
                            </div>

                            <div>
                                <label for="editGuestTable"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Nomor Meja
                                </label>
                                <select id="editGuestTable" name="no_table" required
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white">
                                    <option value="" disabled selected>Pilih Nomor Meja</option>
                                    <option value="Meja 1">Meja 1</option>
                                    <option value="Meja 2">Meja 2</option>
                                    <option value="Meja 3">Meja 3</option>
                                    <option value="Meja 4">Meja 4</option>
                                    <option value="Meja 5">Meja 5</option>
                                </select>
                            </div>

                            <!-- Status Kehadiran -->
                            <div>
                                <label for="editGuestSession"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Session
                                </label>
                                <select id="editGuestSession" name="session"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white">
                                    <option selected disabled>Silahkan Pilih Sesi</option>
                                    <option value="Sesi 1">Sesi 1</option>
                                    <option value="Sesi 2">Sesi 2</option>
                                    <option value="Sesi 3">Sesi 3</option>
                                    <option value="Sesi 4">Sesi 4</option>
                                    <option value="Sesi 5">Sesi 5</option>
                                </select>
                            </div>

                            <div>
                                <label for="editGuestLimit"
                                    class="mb-1 block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Limit Tamu
                                </label>
                                <select id="editGuestLimit" name="guest_limit"
                                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-800 dark:text-white">
                                    <option value="1 Orang" selected>1 Orang</option>
                                    <option value="2 Orang">2 Orang</option>
                                    <option value="3 Orang">3 Orang</option>
                                    <option value="4 Orang">4 Orang</option>
                                    <option value="5 Orang">5 Orang</option>
                                </select>
                            </div>
                        </div>

                        <!-- Button Section -->
                        <div
                            class="mt-6 flex items-center justify-end space-x-3 border-t border-gray-200 pt-4 dark:border-neutral-700">
                            <button type="button" data-hs-overlay="#hs-static-backdrop-modal"
                                class="rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-600">
                                Batal
                            </button>
                            <button type="submit"
                                class="rounded-lg bg-blue-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:bg-blue-700 dark:hover:bg-blue-800">
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Edit -->

    <!-- Modal Konfirmasi Delete -->
    <div id="delete-confirm-modal"
        class="hs-overlay z-100 fixed left-0 top-0 hidden h-full w-full overflow-y-auto overflow-x-hidden">
        <div class="flex min-h-screen items-center justify-center px-4">
            <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Konfirmasi Hapus</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-300">
                    Apakah Anda yakin ingin menghapus tamu <span id="deleteGuestName"
                        class="font-semibold text-red-600"></span>?
                </p>
                <form method="POST" id="deleteForm" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-2">
                        <button type="button"
                            class="rounded bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 dark:bg-neutral-700 dark:text-white"
                            data-hs-overlay="#delete-confirm-modal">
                            Batal
                        </button>
                        <button type="submit"
                            class="rounded bg-red-600 px-4 py-2 text-sm font-medium text-white hover:bg-red-700">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi Delete -->

    <!-- Modal Konfirmasi Kehadiran -->
    <div id="arrival-confirm-modal"
        class="hs-overlay z-100 fixed left-0 top-0 hidden h-full w-full overflow-y-auto overflow-x-hidden">
        <div class="flex min-h-screen items-center justify-center px-4">
            <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg dark:bg-neutral-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Konfirmasi Kehadiran</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-300">
                    Apakah anda yakin tamu dengan atas nama <span id="arrivalGuestName"
                        class="font-semibold text-black"></span> telah hadir?
                </p>
                <form method="POST" id="arrivalForm" class="mt-4">
                    @csrf
                    <div class="flex justify-end space-x-2">
                        <button type="button"
                            class="rounded bg-gray-200 px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-300 dark:bg-neutral-700 dark:text-white"
                            data-hs-overlay="#arrival-confirm-modal">
                            Tidak
                        </button>
                        <button type="submit"
                            class="rounded bg-green-600 px-4 py-2 text-sm font-medium text-white hover:bg-green-700">
                            Ya
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi Kehadiran -->

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
        const guestDataMap = @json($query->keyBy('id'));
    </script>

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
                defaultButton.click();
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(e) {
                if (e.target.closest('.btn-edit')) {
                    const button = e.target.closest('.btn-edit');
                    const id = button.dataset.id;
                    const guest = guestDataMap[id];

                    if (guest) {
                        document.querySelector('#editGuestId').value = guest.id;
                        document.querySelector('#editGuestName').value = guest.guest_name || '';
                        document.querySelector('#editGuestPhone').value = guest.guest_phone || '';
                        document.querySelector('#editGuestCategory').value = guest.category_id || '';
                        document.querySelector('#editGuestUrl').value = guest.url || '';
                        document.querySelector('#editGuestTable').value = guest.no_table || '';
                        document.querySelector('#editGuestSession').value = guest.session || '';
                        document.querySelector('#editGuestLimit').value = guest.guest_limit || '';

                        const form = document.querySelector('#editGuestForm');
                        if (form) {
                            form.action = `/manage-guest`;
                        }
                        const modal = document.getElementById('hs-static-backdrop-modal');
                        window.HSOverlay.open(modal);
                    } else {
                        alert("Data tamu tidak ditemukan.");
                    }
                }
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(e) {
                if (e.target.closest('.btn-delete')) {
                    const button = e.target.closest('.btn-delete');
                    const guestId = button.dataset.id;
                    const guestName = button.dataset.name;

                    const form = document.getElementById('deleteForm');
                    const nameSpan = document.getElementById('deleteGuestName');

                    form.action = `/manage-guest/${guestId}`;
                    nameSpan.textContent = guestName;

                    const modal = document.getElementById('delete-confirm-modal');
                    window.HSOverlay.open(modal);
                }
            });
        });
    </script>




    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.btn-arrival').forEach(button => {
                button.addEventListener('click', () => {
                    const guestId = button.dataset.id;
                    const guestName = button.dataset.name;

                    const form = document.getElementById('arrivalForm');
                    const nameSpan = document.getElementById('arrivalGuestName');

                    // form.action = `/manage-guest/${guestId}`;
                    nameSpan.textContent = guestName;
                });
            });
        });
    </script>

    @push('scripts')
        <!-- Include jQuery dan DataTables -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof initializeDataTable !== 'undefined') {
                    const columns = [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                        },
                        {
                            data: 'guest_name',
                            name: 'guest_name'
                        },
                        {
                            data: 'category_name',
                            name: 'category.category_name'
                        },
                        {
                            data: 'session',
                            name: 'session'
                        },
                        {
                            data: 'guest_limit',
                            name: 'guest_limit'
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ];
                    initializeDataTable('#guestsTable', '{{ route('manage-guest') }}', columns);
                } else {
                    console.error('initializeDataTable is not defined');
                }
            });
        </script>
    @endpush


@endsection
