<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Welcome Tamu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
</head>

<body class="relative h-screen w-screen">

    <!-- Layer Judul -->
    <div class="absolute left-1/2 top-10 z-20 -translate-x-1/2 text-center text-white drop-shadow-lg">
        <h1 class="text-4xl font-bold md:text-5xl">The Wedding of</h1>
        <h2 class="mt-2 text-5xl font-extrabold md:text-6xl">Aku & Kamu</h2>
    </div>


    <!-- Layer 1: Video Background -->
    <div id="layer1" class="absolute inset-0 z-10">
        <video autoplay loop muted class="h-full w-full object-cover">
            @if ($bgVideo = \App\Models\Setting::get('bg_video_welcome'))
                <source src="{{ asset($bgVideo) }}" type="video/mp4">
            @else
                <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4">
            @endif
            Browser Anda tidak mendukung video.
        </video>
    </div>

    <!-- Layer 2: Tamu Baru Masuk -->
    <div id="layer2" class="absolute inset-0 z-20 hidden items-center justify-center bg-black bg-opacity-60">
        <div id="guestCard" class="text-center text-white opacity-0">
            <h1 class="mb-4 text-6xl font-bold" id="guestName">Selamat Datang</h1>
            <p class="text-3xl" id="guestDetail">Kategori Tamu</p>
        </div>
    </div>

    <!-- Tombol Simulasi (Hanya Untuk Demo) -->
    <div class="absolute bottom-10 left-1/2 z-30 -translate-x-1/2 transform">
        <button onclick="simulateScan()"
            class="rounded-lg bg-white bg-opacity-80 px-6 py-3 font-semibold text-black hover:bg-opacity-100">
            Simulasikan Scan Tamu
        </button>
    </div>

    <!-- Script -->
    <script src="{{ asset('assets/js/welcome.js') }}"></script>
</body>

</html>
