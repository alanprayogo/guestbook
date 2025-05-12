function showGuest(name, detail = "") {
    const layer2 = document.getElementById("layer2");
    const guestCard = document.getElementById("guestCard");
    const guestName = document.getElementById("guestName");
    const guestDetail = document.getElementById("guestDetail");

    guestName.textContent = `Selamat Datang, ${name}!`;
    guestDetail.textContent = detail;

    layer2.classList.replace("hidden", "flex");
    guestCard.classList.remove("animate-fade-out");
    guestCard.classList.add("opacity-0");
    setTimeout(() => {
    guestCard.classList.remove("opacity-0");
    guestCard.classList.add("animate-fade-zoom-in");
    }, 10);

    setTimeout(() => {
    guestCard.classList.remove("animate-fade-zoom-in");
    guestCard.classList.add("animate-fade-out");
    }, 4500);

    setTimeout(() => {
    layer2.classList.add("hidden");
    }, 5000);
}

function simulateScan() {
    const guests = [
    { nama: "Budi Santoso", kategori: "Keluarga" },
    { nama: "Siti Aisyah", kategori: "Rekan Kerja" },
    { nama: "Joko Widodo", kategori: "Undangan VIP" },
    ];
    const randomGuest = guests[Math.floor(Math.random() * guests.length)];
    showGuest(randomGuest.nama, randomGuest.kategori);
}