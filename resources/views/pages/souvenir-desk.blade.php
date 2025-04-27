@extends('layouts.app')

@section('page-title', 'Souvenir Desk')

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
                        <!-- Input -->
                        <x-search-input id="hs-as-table-product-review-search" name="product-review-search"
                            label="Search Produk" placeholder="Search" class="sm:col-span-1" />
                        <!-- End Input -->

                        <div>
                            <x-button variant="add" data-open-manual-modal>Add
                                Guess</x-button>
                            <x-button variant="scan-qr">Scan QR</x-button>
                            <x-button variant="export-excel">Export Excel</x-button>
                            <x-button variant="export-pdf">Export PDF</x-button>
                        </div>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
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
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Category
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Session
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Limit
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase text-gray-800 dark:text-neutral-200">
                                            Status
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @forelse ($souvenir as $data)
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
                                                    class="block text-sm text-gray-500 dark:text-neutral-500">myhairisred@site.com</span>
                                            </div>
                                    </td>
                                    <td class="h-px w-[16.7%] whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">VIP</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-[16.7%] whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">1</span>
                                        </div>
                                    </td>
                                    <td class="h-px w-[16.7%] whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span
                                                class="block text-sm font-semibold text-gray-800 dark:text-neutral-200">2</span>
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

                                                <x-action-button variant="qr-code" />
                                                <x-action-button variant="edit" />

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="py-4 text-center">
                                        <span class="text-sm text-gray-500 dark:text-neutral-500">No data available</span>
                                    </td>
                                </tr>
                            @endforelse
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
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="m15 18-6-6 6-6" />
                                    </svg>
                                    Prev
                                </button>

                                <button type="button"
                                    class="shadow-2xs focus:outline-hidden inline-flex items-center gap-x-2 rounded-lg border border-gray-200 bg-white px-2 py-1.5 text-sm font-medium text-gray-800 hover:bg-gray-50 focus:bg-gray-50 disabled:pointer-events-none disabled:opacity-50 dark:border-neutral-700 dark:bg-transparent dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800">
                                    Next
                                    <svg class="size-4 shrink-0" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
    <div id="modal-confirm" class="fixed inset-0 z-100 h-full hidden items-center justify-center" style="background: rgba(0, 0, 0, 0.5)">
        <div class="w-full max-w-sm rounded bg-white p-6 shadow-xl">
            <p id="confirm-message" class="mb-4 text-sm text-gray-800"></p>
            <div class="flex justify-end gap-2">
                <button id="cancel-confirm" class="rounded bg-gray-200 px-4 py-2 text-sm hover:bg-gray-300">
                    Batal
                </button>
                <button id="ok-confirm" class="rounded bg-blue-600 px-4 py-2 text-sm text-white hover:bg-blue-700">
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


    <script>
        const modalEl = document.getElementById('modal-add-manual');
        const form = document.getElementById('souvenir-form');
        const openButtons = document.querySelectorAll('[data-open-manual-modal]');
        const closeButtons = modalEl.querySelectorAll('[data-close-manual-modal]');

        const confirmModal = document.getElementById('modal-confirm');
        const confirmMsg = document.getElementById('confirm-message');
        const cancelBtn = document.getElementById('cancel-confirm');
        const okBtn = document.getElementById('ok-confirm');

        const openModal = () => {
            modalEl.classList.remove('hidden');
            modalEl.classList.add('flex');
            setTimeout(() => {
                modalEl.classList.remove('opacity-0');
                modalEl.classList.add('opacity-100');
            }, 10);
            modalEl.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');
            document.getElementById('guest-name').focus();
        };

        const closeModal = () => {
            document.activeElement.blur();
            modalEl.classList.remove('opacity-100');
            modalEl.classList.add('opacity-0');
            modalEl.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('overflow-hidden');

            setTimeout(() => {
                modalEl.classList.add('hidden');
                form.reset();
            }, 300);
        };

        const showToastSuccess = (message) => {
            const toast = document.getElementById('toast-success');
            const messageEl = document.getElementById('toast-success-message');
            messageEl.innerText = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 4000);
        };

        const showToastError = (message) => {
            const toast = document.getElementById('toast-error');
            const messageEl = document.getElementById('toast-error-message');
            messageEl.innerText = message;
            toast.classList.remove('hidden');
            setTimeout(() => {
                toast.classList.add('hidden');
            }, 4000);
        };


        const showConfirmModal = (message, onConfirm) => {
            closeModal();

            confirmMsg.innerText = message;
            confirmModal.classList.remove('hidden');
            confirmModal.classList.add('flex');

            okBtn.onclick = () => {
                confirmModal.classList.add('hidden');
                onConfirm();
            };

            cancelBtn.onclick = () => {
                confirmModal.classList.add('hidden');
            };
        };


        openButtons.forEach(btn => {
            btn.addEventListener('click', openModal);
        });

        closeButtons.forEach(btn => {
            btn.addEventListener('click', closeModal);
        });

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            const guestName = document.getElementById('guest-name').value;

            const submitSouvenir = (force = false) => {
                fetch('/souvenir-desk', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({
                            guest_name: guestName,
                            force: force,
                        }),
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === 'success') {
                            closeModal();
                            showToastSuccess('Data berhasil disimpan');
                            location.reload();
                        } else if (data.status === 'exists' || data.status === 'not_found_in_guests') {
                            showConfirmModal(data.message, () => submitSouvenir(true));
                        } else {
                            showToastError(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Fetch error:', error);
                        alert('Terjadi kesalahan. Coba lagi nanti.');
                    });
            };

            submitSouvenir();
        });
    </script>



@endsection
