<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Menu Gathering</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            margin: 0;
            background: #111;
            color: white;
            font-family: sans-serif;
        }

        @keyframes slideIn {
            0% {
                transform: translateY(20px);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body class="flex min-h-screen flex-col items-center bg-gradient-to-b from-black to-gray-800 px-4 pt-8">

    <h1 class="mb-6 text-4xl font-bold text-white">📋 Daftar Tamu Hadir</h1>

    <!-- Container daftar tamu -->
    <div id="guestList" class="w-full max-w-3xl space-y-4">
        <!-- Tamu akan ditambahkan ke sini -->
    </div>

    <script>
        let guestCounter = 0;
        let displayedIds = new Set();

        function addGuest(name, category, arrivalTime = null) {
            const container = document.getElementById("guestList");
            const time = arrivalTime ?? new Date().toLocaleTimeString("id-ID", {
                hour: '2-digit',
                minute: '2-digit'
            });

            const div = document.createElement("div");
            div.className = "bg-white bg-opacity-10 rounded-lg p-4 flex justify-between items-center animate-slide-in";

            div.innerHTML = `
        <div>
          <p class="text-xl font-semibold">${name}</p>
          <p class="text-sm text-gray-300">${category}</p>
        </div>
        <div class="text-sm text-gray-400">${time}</div>
      `;

            container.appendChild(div);
        }

        async function fetchGuestList() {
            try {
                const response = await fetch('/api/arrival-guest');
                const guests = await response.json();

                const newGuests = guests.filter(guest => !displayedIds.has(guest.id));
                for (const guest of newGuests) {
                    addGuest(guest.guest_name, guest.category_name, guest.arrival_time);
                    displayedIds.add(guest.id);
                    await new Promise(resolve => setTimeout(resolve, 500)); // Delay animasi
                }
            } catch (error) {
                console.error("Gagal mengambil daftar tamu:", error);
            }
        }

        setInterval(() => {
            fetchGuestList();
        }, 10000);
    </script>

</body>

</html>
