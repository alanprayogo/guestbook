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

let isStopping = false;

function stopScanner() {
    if (html5QrCodeInstance && scannerActive && !isStopping) {
        isStopping = true;

        html5QrCodeInstance.stop()
            .then(() => {
                html5QrCodeInstance.clear();
                scannerActive = false;
                html5QrCodeInstance = null;
                isStopping = false;
                console.log("Scanner berhenti");
            })
            .catch(err => {
                console.warn("Scanner tidak bisa dihentikan (mungkin sudah stop):", err);
                isStopping = false;
            });
    } else {
        console.log("Scanner tidak aktif / instance null / sedang menghentikan");
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

            if (alreadyExists) {
                const confirm = await customConfirm("Tamu ini sudah pernah diinput. Apakah Anda yakin ingin memasukkan lagi?");
                if (!confirm) return;
            }

            if (!guest) {
                const confirm = await customConfirm("Nama tidak ada dalam daftar undangan. Apakah Anda yakin ingin memasukkan nama ini?");
                if (!confirm) return;
                categorySelect.selectedIndex = 0;
            } else {
                categorySelect.value = guest.id.toString();
            }

            formModal.classList.remove('hidden');
            formModal.classList.add('flex');
        })
        .catch(err => {
            console.error("Gagal ambil data tamu:", err);
        });
}

document.addEventListener('DOMContentLoaded', () => {
    const scanBtn = document.getElementById('btn-scan-qr');
    scanBtn?.addEventListener('click', () => {
        if (scannerActive) return;

        console.log("Tombol scan diklik");
        setTimeout(() => {
            startScanner();
        }, 300);
    });


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

    const observer = new MutationObserver((mutationsList) => {
        for (const mutation of mutationsList) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                const modal = mutation.target;
                if (modal.classList.contains('hidden')) {
                    console.log('Modal scanner ditutup (via observer)');
                    stopScanner();
                }
            }
        }
    });

    const scannerModal = document.getElementById('hs-static-backdrop-modal');
    if (scannerModal) {
        observer.observe(scannerModal, { attributes: true });
    }

});

