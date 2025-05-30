@extends('layouts.app')

@section('page-title', 'User Management')

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
    <!-- Card -->
    <div class="flex flex-col">
        <div class="-m-1.5 overflow-x-auto">
            <div class="inline-block min-w-full p-1.5 align-middle">
                <div
                    class="overflow-hidden bg-white border border-gray-200 shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800">
                    <!-- Header -->
                    <div
                        class="grid gap-3 px-6 py-4 border-b border-gray-200 md:flex md:items-center md:justify-between dark:border-neutral-700">
                        <div>
                            <x-button variant="add" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#modal-add-user">Add
                                User</x-button>
                            <x-button variant="scan-qr">Scan QR</x-button>
                            <x-button variant="export-excel">Export Excel</x-button>
                            <x-button variant="export-pdf">Export PDF</x-button>
                            <x-button variant="import-excel">Import Excel</x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table id="userTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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

                                <th scope="col" class="px-6 py-3 text-end"></th>
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

    <!-- Modal Add Manual -->
    <div id="modal-add-user"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Masukkan Data User
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full focus:outline-hidden size-8 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#modal-add-user">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form action="{{ route('user.store') }}" method="POST" id="form-add-user">
                        @csrf
                        <div class="mb-2">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Nama</label>
                            <input type="text" id="name" name="name" class="w-full p-2 border rounded"
                                required>
                        </div>
                        <div class="mb-2">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-2 border rounded"
                                required>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="mb-2">
                                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Password</label>
                                <input type="password" name="password" required>
                            </div>
                            <div class="mb-2">
                                <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Konfirmasi
                                    Password</label>
                                <input type="password" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="mb-2">
                            <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">No HP</label>
                            <input type="text" id="phone" name="phone" class="w-full p-2 border rounded"
                                required>
                        </div>
                        <div class="mb-2">
                            <label for="role_name"
                                class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Role</label>
                            <select id="role_name" name="role_id"
                                class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option selected disabled>Pilih Role</option>
                                @foreach ($role as $data)
                                    <option value="{{ $data->id }}">{{ $data->role_name }}</option>
                                @endforeach
                            </select>
                        </div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2 dark:border-neutral-700">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-2xs focus:outline-hidden gap-x-2 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#modal-add-user">
                        Close
                    </button>
                    <button type="submit"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-lg focus:outline-hidden gap-x-2 hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
                        Save changes
                    </button>
                </div>
                </form>
            </div>

        </div>
    </div>
    </div>
    <!-- End Modal Add Manual -->

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
                            orderable: false
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'email',
                            name: 'email'
                        },
                        {
                            data: 'phone',
                            name: 'phone'
                        },
                        {
                            data: 'password',
                            name: 'password'
                        },
                        {
                            data: 'role_name',
                            name: 'user.role.role_name'
                        }
                    ];
                    initializeDataTable('#userTable', '{{ route('manage-user') }}', columns);
                } else {
                    console.error('initializeDataTable is not defined');
                }
            });
        </script>
    @endpush

    @if (session('success'))
        <div id="toast-success"
            class="fixed z-50 hidden w-full max-w-xs p-4 text-green-800 bg-green-100 rounded-lg shadow-lg right-5 top-5 dark:bg-green-800 dark:text-green-200"
            role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
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
            class="fixed z-50 hidden w-full max-w-xs p-4 text-red-800 bg-red-100 rounded-lg shadow-lg right-5 top-5 dark:bg-red-800 dark:text-red-200"
            role="alert">
            <div class="flex items-center">
                <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11V7a1 1 0 10-2 0v4a1 1 0 102 0zm-1 6a1.5 1.5 0 110-3 1.5 1.5 0 010 3z"
                        clip-rule="evenodd">
                    </path>
                </svg>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    @push('head')
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
    @endpush
@endsection
