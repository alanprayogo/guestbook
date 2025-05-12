<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Welcome Tamu</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('assets/css/welcome.css') }}">
</head>
<body class="relative h-screen w-screen">

  <!-- Layer 1: Video Background -->
  <div id="layer1" class="absolute inset-0 z-10">
    <video autoplay loop muted class="w-full h-full object-cover">
      <source src="https://www.w3schools.com/howto/rain.mp4" type="video/mp4">
      Browser Anda tidak mendukung video.
    </video>
  </div>

  <!-- Layer 2: Tamu Baru Masuk -->
  <div id="layer2" class="absolute inset-0 z-20 hidden bg-black bg-opacity-60 items-center justify-center">
    <div id="guestCard" class="text-white text-center opacity-0">
      <h1 class="text-6xl font-bold mb-4" id="guestName">Selamat Datang</h1>
      <p class="text-3xl" id="guestDetail">Kategori Tamu</p>
    </div>
  </div>

  <!-- Tombol Simulasi (Hanya Untuk Demo) -->
  <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 z-30">
    <button onclick="simulateScan()" class="px-6 py-3 bg-white bg-opacity-80 rounded-lg text-black font-semibold hover:bg-opacity-100">
      Simulasikan Scan Tamu
    </button>
  </div>

  <!-- Script -->
   <script src="{{ asset('assets/js/welcome.js') }}"></script>
</body>
</html>
