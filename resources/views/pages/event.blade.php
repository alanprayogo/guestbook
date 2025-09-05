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
                                    Guest Category Table
                                </h2>
                            </div>

                            <div>
                                <x-button variant="add" aria-haspopup="dialog" aria-expanded="false"
                                    aria-controls="hs-static-backdrop-modal" data-hs-overlay="#modal-add-category">Add
                                    New Category</x-button>
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
                                @forelse ($categories as $data)
                                    <tr>
                                        <td class="h-px w-[8.3%] whitespace-nowrap">
                                            <div class="py-3 ps-6">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $loop->iteration }}</span>
                                            </div>
                                        </td>
                                        <td class="h-px w-[16.7%] whitespace-nowrap">
                                            <div class="px-6 py-3">
                                                <span
                                                    class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">{{ $data->category_name }}</span>
                                            </div>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <div class="px-6 py-1.5">
                                                <div class="flex items-center gap-x-3">

                                                    <button type="button"
                                                        class="text-red-600 btn-delete hover:text-red-800"
                                                        data-id="{{ $data->id }}"
                                                        data-name="{{ $data->category_name }}">
                                                        Hapus
                                                    </button>

                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="py-4 text-center">
                                            <span class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">No
                                                data available</span>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <!-- End Table -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card 2 -->
    </div>
    <!-- End Grid Section -->

    <!-- Modal Add Manual -->
    <div id="modal-add-category"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Masukkan Nama Category
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full focus:outline-hidden size-8 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#modal-add-category">
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
                    <form action="{{ route('event.store') }}" method="POST" id="form-add-manual">
                        @csrf
                        <div class="mb-4">
                            <input type="text" id="guest-category" name="category_name"
                                class="w-full p-2 border rounded" required>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2 dark:border-neutral-700">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-2xs focus:outline-hidden gap-x-2 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#modal-add-category">
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

    <!-- Modal Konfirmasi Delete -->
    <div id="delete-confirm-modal"
        class="fixed top-0 left-0 hidden w-full h-full overflow-x-hidden overflow-y-auto hs-overlay z-100">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg dark:bg-neutral-800">
                <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Konfirmasi Hapus</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-neutral-300">
                    Apakah Anda yakin ingin menghapus kategori ini <span id="deleteUser"
                        class="font-semibold text-red-600"></span>?
                </p>
                <form method="POST" id="deleteForm" class="mt-4">
                    @csrf
                    @method('DELETE')
                    <div class="flex justify-end space-x-2">
                        <button type="button"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 rounded hover:bg-gray-300 dark:bg-neutral-700 dark:text-white"
                            data-hs-overlay="#delete-confirm-modal">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700">
                            Hapus
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi Delete -->

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.body.addEventListener('click', function(e) {
                    if (e.target.closest('.btn-delete')) {
                        const button = e.target.closest('.btn-delete');
                        const categoryId = button.dataset.id;
                        const userName = button.dataset.name;

                        const form = document.getElementById('deleteForm');
                        const nameSpan = document.getElementById('deleteUser');

                        form.action = `/categories/${categoryId}`;
                        nameSpan.textContent = userName;

                        const modal = document.getElementById('delete-confirm-modal');
                        window.HSOverlay.open(modal);
                    }
                });
            });
        </script>
    @endpush
@endsection
