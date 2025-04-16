@extends('layouts.app')

@section('page-title', 'Profile')

@section('content')
    <!-- Grid Section -->
    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
        <!-- Card 1 -->
        <x-card-container title="Ganti Password">
            <form>
                <!-- Section -->
                <div
                    class="py-6 border-t border-gray-200 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="mt-2 space-y-3">
                        <p class="text-sm text-gray-600 dark:text-neutral-400">
                            Harap diingat password baru setelah diupdate
                        </p>
                        <input id="af-payment-billing-contact" type="text"
                            class="shadow-2xs block w-full rounded-lg border-gray-200 px-3 py-1.5 pe-11 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            placeholder="New Password">
                    </div>
                </div>
                <!-- End Section -->
            </form>

            <div class="flex justify-end mt-5 gap-x-2">
                <x-button variant="primary">Update</x-button>
            </div>
        </x-card-container>
        <!-- End Card 1 -->

        <!-- Card 2 -->
        <x-card-container title="Pesan Undangan Whatsapp">
            <form>
                <!-- Section -->
                <div
                    class="py-6 border-t border-gray-200 first:border-transparent first:pt-0 last:pb-0 dark:border-neutral-700 dark:first:border-transparent">
                    <div class="space-y-2">
                        <label for="af-submit-app-description" class="block text-sm font-medium dark:text-white">
                            Isi Undangan Whatsapp
                        </label>
                        <textarea id="af-submit-app-description"
                            class="block w-full rounded-lg border-gray-200 px-3 py-1.5 focus:border-blue-500 focus:ring-blue-500 disabled:pointer-events-none disabled:opacity-50 sm:py-2 sm:text-sm dark:border-neutral-700 dark:bg-neutral-900 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="6"
                            placeholder="A detailed summary will better explain your products to the audiences. Our users will see this in your dedicated product page."></textarea>
                    </div>
                </div>
                <!-- End Section -->
            </form>

            <div class="flex justify-end mt-5 gap-x-2">
                <x-button variant="primary">Update</x-button>
            </div>
        </x-card-container>
        <!-- End Card 2 -->

    </div>
    <!-- End Grid Section -->
@endsection
