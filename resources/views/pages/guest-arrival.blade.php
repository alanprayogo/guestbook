@extends('layouts.app')

@section('page-title', 'Guess Arrival')

@push('head')
    @vite(['resources/js/scanner.js'])
    @vite(['resources/js/datatables-init.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/sort-icon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/random-pick.css') }}">
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

        #winner-modal {
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 150;
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
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#modal-add-manual">Add
                                Guess</x-button>
                            <x-button id="btn-scan-qr" variant="scan-qr" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#hs-static-backdrop-modal">
                                Scan QR
                            </x-button>
                            <x-button href="{{ route('exportArrival') }}" variant="export-excel">Export Excel</x-button>
                            <x-button variant="export-pdf">Export PDF</x-button>
                            <x-button variant="random-pick" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#modal-random-pick">Random
                                Pick</x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <div class="overflow-x-auto">
                        <table id="guestArrivalTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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

                                    <th scope="col" class="py-3 pe-6 ps-6 text-start lg:ps-3 xl:ps-0">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
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
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Tanggal
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
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Jam Kehadiran
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
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Tamu
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
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Status
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold text-gray-800 uppercase dark:text-neutral-200">
                                                Foto Kehadiran
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                            </tbody>
                        </table>
                    </div>
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
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-end px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full focus:outline-hidden size-8 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
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
                <div class="p-4 overflow-y-auto">
                    <div id="reader" class="w-full h-full border border-gray-300 rounded"></div>
                </div>

                <div
                    class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2 dark:border-neutral-700">
                    <button type="button"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-2xs focus:outline-hidden gap-x-2 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                        data-hs-overlay="#hs-static-backdrop-modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal QR Code-->

    <!-- Modal Add Guess -->
    <div id="guest-form-modal" class="fixed inset-0 items-center justify-center hidden h-full z-100"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-xl font-semibold">Input Tamu</h2>
            <form action="{{ route('guest-arrival.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="guest-name" class="block text-sm font-medium">Nama</label>
                    <input type="text" id="guest-name" name="guest_name" class="w-full p-2 border rounded" readonly>
                </div>

                <div class="mb-4">
                    <label for="guest-count" class="block text-sm font-medium">Jumlah Tamu</label>
                    <input type="number" id="guest-count" min="1" name="guest_count"
                        class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="category" class="block text-sm font-medium">Kategori</label>
                    <select id="category" name="category_id"
                        class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-9 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected disabled>Pilih Kategori Tamu</option>
                        @foreach ($category as $data)
                            <option value="{{ $data->id }}">{{ $data->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex justify-end gap-2">
                    <button type="button" id="close-guest-form"
                        class="px-4 py-2 text-black bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Modal Add Guess -->

    <!-- Modal Add Manual -->
    <div id="modal-add-manual"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Masukkan Nama Tamu
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full focus:outline-hidden size-8 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#modal-add-manual">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <form id="form-add-manual">
                        <div class="mb-4">
                            <label for="guest-name-manual" class="block text-sm font-medium">Nama</label>
                            <input type="text" id="guest-name-manual" name="guest_name"
                                class="w-full p-2 border rounded" required>
                        </div>

                        <div
                            class="flex items-center justify-end px-4 py-3 border-t border-gray-200 gap-x-2 dark:border-neutral-700">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-2xs focus:outline-hidden gap-x-2 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#modal-add-manual">
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

    <!-- Modal Konfirmasi -->
    <div id="custom-confirm-modal" class="fixed inset-0 items-center justify-center hidden h-full z-100"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-lg">
            <h2 class="mb-4 text-lg font-semibold text-gray-800">Konfirmasi</h2>
            <p class="mb-6 text-sm text-gray-600" id="custom-confirm-message">Apakah Anda yakin?</p>
            <div class="flex justify-end gap-2">
                <button id="cancel-btn" class="px-4 py-2 text-black bg-gray-300 rounded hover:bg-gray-400">Batal</button>
                <button id="confirm-btn" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Ya</button>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi -->

    <!-- Modal Camera -->
    <div id="camera-modal" class="fixed inset-0 items-center justify-center hidden h-full z-100"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="relative w-full max-w-md p-6 bg-white rounded-lg">
            <button id="close-camera-modal" class="absolute text-gray-500 right-2 top-2 hover:text-gray-800">
                &times;
            </button>
            <h2 class="mb-2 text-lg font-semibold">
                Ambil Foto Kehadiran untuk: <span id="modal-user-name" class="font-bold text-blue-600"></span>
            </h2>

            <!-- Hidden input untuk dikirim ke backend -->
            <input type="hidden" id="guest-name-input" name="guest_name">

            <video id="webcam-video" autoplay class="w-full rounded"></video>
            <button id="capture-btn" class="px-4 py-2 mt-4 text-white bg-blue-600 rounded hover:bg-blue-700">
                Ambil Foto
            </button>
            <canvas id="canvas" class="hidden"></canvas>
        </div>
    </div>
    <!-- End Modal Camera -->

    <!-- Modal tampilan foto -->
    <div id="photo-modal" class="fixed inset-0 items-center justify-center hidden h-full z-100"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="relative w-full max-w-lg p-4 bg-white rounded-lg">
            <button onclick="closePhotoModal()" class="absolute text-2xl text-gray-500 right-2 top-2 hover:text-gray-800">
                &times;
            </button>
            <h2 class="mb-2 text-lg font-semibold text-center" id="photo-modal-name"></h2>
            <img id="photo-modal-image" src="" class="w-full h-auto rounded shadow">
        </div>
    </div>
    <!-- End Modal tampilan foto -->

    <!-- Modal Random Pick -->
    <div id="modal-random-pick"
        class="hs-overlay z-80 pointer-events-none fixed start-0 top-0 hidden size-full overflow-y-auto overflow-x-hidden [--overlay-backdrop:static]"
        role="dialog" tabindex="-1" aria-labelledby="hs-static-backdrop-modal-label" data-hs-overlay-keyboard="false">
        <div
            class="m-3 mt-0 transition-all ease-out opacity-0 hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="flex flex-col bg-white border border-gray-200 pointer-events-auto shadow-2xs rounded-xl dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between px-4 py-3 border-b border-gray-200 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Random Pick
                    </h3>
                    <button type="button"
                        class="inline-flex items-center justify-center text-gray-800 bg-gray-100 border border-transparent rounded-full modal-close-btn focus:outline-hidden size-8 gap-x-2 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
                        aria-label="Close" data-hs-overlay="#modal-random-pick">
                        <span class="sr-only">Close</span>
                        <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M18 6 6 18"></path>
                            <path d="m6 6 12 12"></path>
                        </svg>
                    </button>
                </div>
                <div class="p-4 overflow-y-auto">
                    <div class="card">
                        <div class="wheel-container">
                            <div class="marker"></div>
                            <canvas id="wheel" width="400" height="400"></canvas>
                        </div>

                        <div class="button-container">
                            <button id="spin-button" class="button primary-button" disabled>SPIN</button>
                        </div>

                        <div id="result" class="result"></div>
                        <div class="flex justify-end mt-4">
                            <button type="button"
                                class="inline-flex items-center px-3 py-2 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg modal-close-btn shadow-2xs focus:outline-hidden gap-x-2 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#modal-random-pick">
                                Close
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Random Pick -->

    <!-- Modal Pemenang -->
    <div id="winner-modal" class="fixed inset-0 items-center justify-center hidden h-full">
        <div class="w-full max-w-sm p-6 text-center bg-white rounded-lg shadow-xl">
            <h2 class="mb-4 text-xl font-semibold text-gray-800">Pemenang</h2>
            <p id="winner-name" class="mb-4 text-lg font-bold text-indigo-600"></p>
            <div class="flex justify-center gap-3">
                <button id="remove-winner-btn" class="px-4 py-2 text-white bg-red-500 rounded hover:bg-red-600">
                    Hapus dari daftar
                </button>
                <button id="close-winner-modal" class="px-4 py-2 text-gray-700 bg-gray-300 rounded hover:bg-gray-400">
                    Tutup
                </button>
            </div>
        </div>
    </div>


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


    <script>
        window.guestsData = @json($guests);
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
        function customConfirm(message) {
            return new Promise((resolve) => {
                const modal = document.getElementById('custom-confirm-modal');
                const confirmBtn = document.getElementById('confirm-btn');
                const cancelBtn = document.getElementById('cancel-btn');
                const msgText = document.getElementById('custom-confirm-message');

                msgText.textContent = message;
                modal.classList.remove('hidden');
                modal.classList.add('flex');

                const cleanup = () => {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                    confirmBtn.removeEventListener('click', onConfirm);
                    cancelBtn.removeEventListener('click', onCancel);
                };

                const onConfirm = () => {
                    cleanup();
                    resolve(true);
                };

                const onCancel = () => {
                    cleanup();
                    resolve(false);
                };

                confirmBtn.addEventListener('click', onConfirm);
                cancelBtn.addEventListener('click', onCancel);
            });
        }
    </script>

    <script>
        let stream;

        function openCameraModal(button) {
            const userName = button.getAttribute('data-guest-name');
            const modal = document.getElementById('camera-modal');
            const video = document.getElementById('webcam-video');

            // Set nama ke span dan hidden input
            document.getElementById('modal-user-name').textContent = userName;
            document.getElementById('guest-name-input').value = userName;

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(mediaStream => {
                    stream = mediaStream;
                    video.srcObject = stream;
                    modal.classList.remove('hidden');
                    modal.classList.add('flex');
                })
                .catch(err => {
                    alert('Tidak bisa mengakses kamera: ' + err.message);
                });
        }

        function closeCameraModal() {
            const modal = document.getElementById('camera-modal');
            modal.classList.add('hidden');

            if (stream) {
                stream.getTracks().forEach(track => track.stop());
            }
        }

        document.getElementById('capture-btn').addEventListener('click', () => {
            const video = document.getElementById('webcam-video');
            const canvas = document.getElementById('canvas');
            const context = canvas.getContext('2d');

            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            context.drawImage(video, 0, 0, canvas.width, canvas.height);

            const base64Image = canvas.toDataURL('image/png');
            const guestName = document.getElementById('guest-name-input').value;

            // Kirim ke backend pakai fetch
            fetch('/guests/upload-photo', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify({
                        image: base64Image,
                        guest_name: guestName
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        alert('Foto berhasil disimpan untuk ' + guestName);
                        closeCameraModal();
                        location.reload();
                    } else {
                        alert('Gagal menyimpan foto.');
                    }
                })
                .catch(err => {
                    console.error(err);
                    alert('Terjadi kesalahan saat mengirim foto.');
                });
        });

        document.getElementById('close-camera-modal').addEventListener('click', closeCameraModal);
    </script>

    <script>
        function showPhotoModal(imageUrl, guestName) {
            document.getElementById('photo-modal-image').src = imageUrl;
            document.getElementById('photo-modal-name').innerText = guestName;
            document.getElementById('photo-modal').classList.remove('hidden');
            document.getElementById('photo-modal').classList.add('flex');
        }

        function closePhotoModal() {
            document.getElementById('photo-modal').classList.add('hidden');
            document.getElementById('photo-modal-image').src = '';
            document.getElementById('photo-modal-name').innerText = '';
        }
    </script>

    @push('scripts')
        <script src="{{ asset('assets/js/random-pick.js') }}"></script>
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
                            data: 'arrival_date',
                            name: 'arrival_date'
                        },
                        {
                            data: 'arrival_time',
                            name: 'arrival_time'
                        },
                        {
                            data: 'category_name',
                            name: 'category.category_name'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'photo_guest',
                            name: 'photo_guest'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        }
                    ];
                    initializeDataTable('#guestArrivalTable', '{{ route('guest-arrival') }}', columns);
                } else {
                    console.error('initializeDataTable is not defined');
                }
            });
        </script>
    @endpush

@endsection
