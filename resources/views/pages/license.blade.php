@extends('layouts.app')

@section('page-title', 'Lincense')

@section('content')
    <div class="max-w-xl mx-auto">
        <h1 class="mb-4 text-2xl font-semibold dark:text-blue-200">Licensi</h1>

        <div class="px-4 py-3 mb-6 text-blue-800 bg-blue-100 rounded dark:bg-blue-900 dark:text-blue-200">
            Reset licensi hubungi admin
            <a href="https://member.kolamdigital.net"
                class="text-blue-600 underline dark:text-blue-300">member.kolamdigital.net</a>
        </div>

        <label class="block mb-2 font-medium text-gray-700 dark:text-gray-300">Kode Licensi</label>
        <input type="text" readonly value="BUKTAxxxxxxxxxxxxxxxxxxxxEQF2G"
            class="w-full px-4 py-2 mb-6 text-gray-800 border rounded bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-100" />

        <hr class="my-6 border-t border-gray-300 dark:border-gray-700" />

        <p class="mb-2">
            <a href="#" class="font-bold text-blue-600 underline dark:text-blue-400">Aplikasi Buku Tamu</a>
            <span class="text-black dark:text-white"> supported by </span>
            <a href="#" class="font-bold text-blue-600 underline dark:text-blue-400">WeddingPress</a>
        </p>

        <p class="text-gray-700 dark:text-gray-300">
            Buku Tamu version (1.4.1) - Update Maret 2024.
        </p>
    </div>
@endsection
