@extends('layouts.app')

@section('page-title', 'Guess Arrival')

@push('head')
    @vite(['resources/js/scanner.js'])
    @vite(['resources/js/datatables-init.js'])
    <link rel="stylesheet" href="{{ asset('assets/css/sort-icon.css') }}">
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
                            <x-button variant="add" aria-haspopup="dialog" aria-expanded="false"
                                aria-controls="hs-static-backdrop-modal" data-hs-overlay="#modal-add-manual">Add
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
                    <div class="overflow-x-auto">
                        <table id="guestArrivalTable" class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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
                                                class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
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
                                                class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
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
                                                class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                Status
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                                Foto
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

    <!-- Modal Add Guess -->
    <div id="guest-form-modal" class="z-100 fixed inset-0 hidden h-full items-center justify-center"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-xl font-semibold">Input Tamu</h2>
            <form action="{{ route('guest-arrival.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="guest-name" class="block text-sm font-medium">Nama</label>
                    <input type="text" id="guest-name" name="guest_name" class="w-full rounded border p-2" readonly>
                </div>

                <div class="mb-4">
                    <label for="guest-count" class="block text-sm font-medium">Jumlah Tamu</label>
                    <input type="number" id="guest-count" min="1" name="guest_count"
                        class="w-full rounded border p-2" required>
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
                        class="rounded bg-gray-300 px-4 py-2 text-black hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Simpan</button>
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
            class="m-3 mt-0 opacity-0 transition-all ease-out hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 sm:mx-auto sm:w-full sm:max-w-lg">
            <div
                class="shadow-2xs pointer-events-auto flex flex-col rounded-xl border border-gray-200 bg-white dark:border-neutral-700 dark:bg-neutral-800 dark:shadow-neutral-700/70">
                <div class="flex items-center justify-between border-b border-gray-200 px-4 py-3 dark:border-neutral-700">
                    <h3 id="hs-static-backdrop-modal-label" class="font-bold text-gray-800 dark:text-white">
                        Modal title
                    </h3>
                    <button type="button"
                        class="focus:outline-hidden inline-flex size-8 items-center justify-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:bg-gray-200 disabled:pointer-events-none disabled:opacity-50 dark:bg-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-600 dark:focus:bg-neutral-600"
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
                <div class="overflow-y-auto p-4">
                    <form action="{{ route('guest-arrival.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="guest-name" class="block text-sm font-medium">Nama</label>
                            <input type="text" id="guest-name" name="guest_name" class="w-full rounded border p-2"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="whatsapp" class="block text-sm font-medium">WhatsApp</label>
                            <input type="tel" id="whatsapp" name="whatsapp" placeholder="08xxxxxxxxxx"
                                maxlength="13" class="w-full rounded border p-2" required>
                        </div>

                        <div class="mb-4">
                            <label for="guest-count" class="block text-sm font-medium">Jumlah Tamu</label>
                            <input type="number" id="guest-count" min="1" name="guest_count"
                                class="w-full rounded border p-2" required>
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

                        <div
                            class="flex items-center justify-end gap-x-2 border-t border-gray-200 px-4 py-3 dark:border-neutral-700">
                            <button type="button"
                                class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-neutral-800 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                data-hs-overlay="#modal-add-manual">
                                Close
                            </button>
                            <button type="submit"
                                class="focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-transparent bg-blue-600 px-3 py-2 text-sm font-medium text-white hover:bg-blue-700 focus:bg-blue-700 disabled:pointer-events-none disabled:opacity-50">
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
    <div id="custom-confirm-modal" class="z-100 fixed inset-0 hidden h-full items-center justify-center"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-md rounded-lg bg-white p-6 shadow-lg">
            <h2 class="mb-4 text-lg font-semibold text-gray-800">Konfirmasi</h2>
            <p class="mb-6 text-sm text-gray-600" id="custom-confirm-message">Apakah Anda yakin?</p>
            <div class="flex justify-end gap-2">
                <button id="cancel-btn" class="rounded bg-gray-300 px-4 py-2 text-black hover:bg-gray-400">Batal</button>
                <button id="confirm-btn" class="rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">Ya</button>
            </div>
        </div>
    </div>
    <!-- End Modal Konfirmasi -->

    <!-- Modal Camera -->
    <div id="camera-modal" class="z-100 fixed inset-0 hidden h-full items-center justify-center"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="relative w-full max-w-md rounded-lg bg-white p-6">
            <button id="close-camera-modal" class="absolute right-2 top-2 text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <h2 class="mb-2 text-lg font-semibold">
                Ambil Foto Kehadiran untuk: <span id="modal-user-name" class="font-bold text-blue-600"></span>
            </h2>

            <!-- Hidden input untuk dikirim ke backend -->
            <input type="hidden" id="guest-name-input" name="guest_name">

            <video id="webcam-video" autoplay class="w-full rounded"></video>
            <button id="capture-btn" class="mt-4 rounded bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                Ambil Foto
            </button>
            <canvas id="canvas" class="hidden"></canvas>
        </div>
    </div>
    <!-- End Modal Camera -->

    <!-- Modal tampilan foto -->
    <div id="photo-modal" class="z-100 fixed inset-0 hidden h-full items-center justify-center"
        style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="relative w-full max-w-lg rounded-lg bg-white p-4">
            <button onclick="closePhotoModal()" class="absolute right-2 top-2 text-2xl text-gray-500 hover:text-gray-800">
                &times;
            </button>
            <h2 class="mb-2 text-center text-lg font-semibold" id="photo-modal-name"></h2>
            <img id="photo-modal-image" src="" class="h-auto w-full rounded shadow">
        </div>
    </div>
    <!-- End Modal tampilan foto -->

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
