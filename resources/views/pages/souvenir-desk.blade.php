@extends('layouts.app')

@section('page-title', 'Souvenir Desk')

@push('head')
    @vite('resources/js/souvenir.js');
    @push('head')
        @vite(['resources/js/datatables-init.js'])
        <link rel="stylesheet" href="{{ asset('assets/css/sort-icon.css') }}">
    @endpush
@endpush

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
                        <div>
                            <x-button variant="add" data-open-manual-modal>Add
                                Guess</x-button>
                            <x-button id="btn-scan-qr" variant="scan-qr" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#hs-static-backdrop-modal">
                                Scan QR
                            </x-button>
                            <x-button variant="export-excel">Export Excel</x-button>
                            <x-button variant="export-pdf">Export PDF</x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table id="souvenirTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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
                                            <span class="sort-icon">
                                                <span class="up">↑</span>
                                                <span class="down">↓</span>
                                            </span>
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Category
                                            <span class="sort-icon">
                                                <span class="up">↑</span>
                                                <span class="down">↓</span>
                                            </span>
                                        </span>
                                    </div>
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                        </tbody>
                    </table>
                    <!-- End Table -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->

    <!-- Modal QR Code -->
    <div id="hs-static-backdrop-modal"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="shadow-2xs pointer-events-auto flex flex-col rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-end border-b border-gray-200 px-4 py-3 dark:border-neutral-700">
                    <button type="button"
                        class="focus:outline-hidden inline-flex size-8 items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#hs-static-backdrop-modal">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="overflow-y-auto p-4">
                    <div id="reader" class="h-full w-full rounded border border-gray-300"></div>
                </div>

                <div
                    class="flex items-center justify-end gap-x-2 border-t border-gray-200 px-4 py-3 dark:border-neutral-700">
                    <button type="button"
                        class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-static-backdrop-modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal QR Code-->

    <!-- Modal Add Manual -->
    <div id="modal-add-manual"
        class="z-100 fixed inset-0 hidden h-full items-center justify-center opacity-0 transition-opacity duration-300"
        role="dialog" aria-hidden="true" style="background: rgba(0, 0, 0, 0.5)">

        <div class="w-full max-w-lg overflow-hidden rounded-xl bg-white shadow-xl dark:bg-neutral-800">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-gray-200 px-6 py-4 dark:border-neutral-700">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white">
                    Masukkan Nama Tamu
                </h3>
                <button type="button" data-close-manual-modal
                    class="text-gray-500 hover:text-gray-700 dark:text-neutral-400 dark:hover:text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="p-6">
                <form id="souvenir-form">
                    <div class="mb-4">
                        <label for="guest-name" class="block text-sm font-medium text-gray-700 dark:text-white">
                            Nama
                        </label>
                        <input type="text" id="guest-name" name="guest_name"
                            class="mt-1 block w-full rounded-md border border-gray-300 p-2 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:border-neutral-600 dark:bg-neutral-700 dark:text-white"
                            required>
                    </div>

                    <div class="flex justify-end gap-2 border-t border-gray-200 pt-4 dark:border-neutral-700">
                        <button type="button" data-close-manual-modal
                            class="rounded border border-gray-300 px-4 py-2 text-gray-700 hover:bg-gray-100 dark:border-neutral-600 dark:text-white dark:hover:bg-neutral-700">
                            Batal
                        </button>
                        <button type="submit"
                            class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 focus:outline-none">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Add Manual -->

    <!-- Modal Konfirmasi -->
    <div id="confirm-modal" class="z-100 fixed inset-0 hidden h-full items-center justify-center"
        style="background: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-sm rounded bg-white p-6 shadow-xl">
            <p id="confirm-message" class="mb-4 text-sm text-gray-800"></p>
            <div class="flex justify-end gap-2">
                <button id="cancel-button" class="rounded bg-gray-200 px-4 py-2 text-sm hover:bg-gray-300">
                    Batal
                </button>
                <button id="confirm-button" class="rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700">
                    Lanjutkan
                </button>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi -->

    <!-- Toast Success -->
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
            <span id="toast-success-message">Data berhasil disimpan</span>
        </div>
    </div>

    <!-- Toast Error -->
    <div id="toast-error"
        class="fixed right-5 top-20 z-50 hidden w-full max-w-xs rounded-lg bg-red-100 p-4 text-red-800 shadow-lg dark:bg-red-800 dark:text-red-200"
        role="alert">
        <div class="flex items-center">
            <svg class="mr-2 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                    d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-9-4h2v5h-2V6zm0 6h2v2h-2v-2z"
                    clip-rule="evenodd">
                </path>
            </svg>
            <span id="toast-error-message">Terjadi kesalahan</span>
        </div>
    </div>

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
                            name: 'guest.category.category_name'
                        }
                    ];
                    initializeDataTable('#souvenirTable', '{{ route('souvenir-desk') }}', columns);
                } else {
                    console.error('initializeDataTable is not defined');
                }
            });
        </script>
    @endpush

@endsection
