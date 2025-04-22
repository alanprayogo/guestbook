import { Html5Qrcode } from "html5-qrcode";

let html5QrCodeInstance;
let scannerActive = false;

function startScanner() {
    console.log("Inisialisasi scanner...");
    const qrRegionId = "reader";
    const html5QrCode = new Html5Qrcode(qrRegionId);

    html5QrCode.start(
        { facingMode: "environment" },
        { fps: 10, qrbox: 250 },
        (decodedText, decodedResult) => {
            if (scannerActive) {
                console.log("Hasil QR:", decodedText);
                html5QrCode.stop().then(() => {
                    html5QrCode.clear();
                    scannerActive = false;
                    console.log("Scanner berhenti");
                    const scanModal = document.getElementById("hs-static-backdrop-modal");
                    if (scanModal) {
                        window.HSOverlay.close(scanModal);
                    }

                    // Tampilkan form tamu
                    showGuestForm(decodedText);
                }).catch(err => {
                    console.error("Gagal menghentikan scanner:", err);
                });
            }
        }
    ).then(() => {
        html5QrCodeInstance = html5QrCode;
        scannerActive = true;
    }).catch((err) => {
        console.error("Gagal memulai scanner:", err);
    });
}

function stopScanner() {
    if (html5QrCodeInstance && scannerActive) {
        html5QrCodeInstance.stop().then(() => {
            html5QrCodeInstance.clear();
            scannerActive = false;
            console.log("Scanner berhenti");
        }).catch(err => {
            console.error("Gagal menghentikan scanner:", err);
        });
    }
}

function showGuestForm(qrResult) {
    const formModal = document.getElementById('guest-form-modal');
    const nameInput = document.getElementById('guest-name');
    const categorySelect = document.getElementById('category');

    if (!formModal || !nameInput || !categorySelect) return;

    nameInput.value = qrResult;

    fetch(`/guest-category?guest_name=${encodeURIComponent(qrResult)}`)
        .then(res => res.json())
        .then(async data => {
            const alreadyExists = data.already_exists;
            const guest = data.guest;

            // Kondisi (a): Sudah ada di tabel guests
            if (alreadyExists) {
                const confirm = await customConfirm("Tamu ini sudah pernah diinput. Apakah Anda yakin ingin memasukkan lagi?");
                if (!confirm) return;
            }

            // Kondisi (b): Tidak ditemukan di broadcast_list
            if (!guest) {
                const confirm = await customConfirm("Nama tidak ada dalam daftar undangan. Apakah Anda yakin ingin memasukkan nama ini?");
                if (!confirm) return;
                categorySelect.selectedIndex = 0;
            } else {
                categorySelect.value = guest.id.toString();
            }

            // Tampilkan modal form
            formModal.classList.remove('hidden');
            formModal.classList.add('flex');
        })
        .catch(err => {
            console.error("Gagal ambil data tamu:", err);
        });
}




document.addEventListener('DOMContentLoaded', () => {
    // Tombol scan ditekan
    const scanBtn = document.getElementById('btn-scan-qr');
    scanBtn?.addEventListener('click', () => {
        console.log("Tombol scan diklik");
        setTimeout(() => {
            startScanner();
        }, 300);
    });

    // Tombol tutup form ditekan
    const closeBtn = document.getElementById('close-guest-form');
    closeBtn?.addEventListener('click', () => {
        const modal = document.getElementById('guest-form-modal');
        modal?.classList.add('hidden');

        const guestCount = document.getElementById('guest-count');
        if (guestCount) guestCount.value = '';
        const category = document.getElementById('category');
        if (category) category.selectedIndex = 0;

        stopScanner();
    });
});
