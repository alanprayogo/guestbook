import { Html5Qrcode } from 'html5-qrcode';

const modalEl = document.getElementById('modal-add-manual');
const form = document.getElementById('souvenir-form');
const openButtons = document.querySelectorAll('[data-open-manual-modal]');
const closeButtons = modalEl.querySelectorAll('[data-close-manual-modal]');

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

openButtons.forEach(btn => {
    btn.addEventListener('click', openModal);
});

closeButtons.forEach(btn => {
    btn.addEventListener('click', closeModal);
});

// --- Toast Success ---
const showToastSuccess = (message) => {
    const toast = document.getElementById('toast-success');
    const messageEl = document.getElementById('toast-success-message');
    messageEl.innerText = message;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 4000);
};

// --- Toast Error ---
const showToastError = (message) => {
    const toast = document.getElementById('toast-error');
    const messageEl = document.getElementById('toast-error-message');
    messageEl.innerText = message;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 4000);
};

// --- Confirm Modal ---
let currentConfirmHandler = null;

const showConfirmModal = (message, onConfirm) => {
    const confirmModal = document.getElementById('confirm-modal');
    const confirmMessage = document.getElementById('confirm-message');
    const confirmButton = document.getElementById('confirm-button');
    const cancelButton = document.getElementById('cancel-button');

    confirmMessage.innerText = message;

    confirmModal.classList.remove('hidden');
    confirmModal.classList.add('flex');

    const handleConfirm = () => {
        onConfirm();
        closeConfirmModal();
    };

    const handleCancel = () => {
        closeConfirmModal();
    };

    if (currentConfirmHandler) {
        confirmButton.removeEventListener('click', currentConfirmHandler);
        cancelButton.removeEventListener('click', handleCancel);
    }

    confirmButton.addEventListener('click', handleConfirm, { once: true });
    cancelButton.addEventListener('click', handleCancel, { once: true });

    currentConfirmHandler = handleConfirm;
};

const closeConfirmModal = () => {
    const confirmModal = document.getElementById('confirm-modal');
    confirmModal.classList.remove('flex');
    confirmModal.classList.add('hidden');
};


const submitSouvenir = (guestName, force = false) => {
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
            closeModal();
            showConfirmModal(data.message, () => {
                submitSouvenir(guestName, true);
            });
        } else {
            showToastError(data.message);
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        showToastError('Terjadi kesalahan. Coba lagi nanti.');
    });
};

// --- Handle Submit Form Manual ---
form.addEventListener('submit', function(e) {
    e.preventDefault();
    const guestName = document.getElementById('guest-name').value;
    submitSouvenir(guestName);
});

let html5QrCodeInstance = null;
let scannerActive = false;
let isStopping = false;

function startScanner() {
    const qrRegion = document.getElementById('reader');

    if (!Html5Qrcode) {
        console.error("Html5Qrcode tidak tersedia");
        return;
    }

    if (!html5QrCodeInstance) {
        html5QrCodeInstance = new Html5Qrcode("reader");
    }

    html5QrCodeInstance.start(
        { facingMode: "environment" },
        {
            fps: 10,
            qrbox: { width: 250, height: 250 },
        },
        (decodedText, decodedResult) => {
            stopScanner();
            window.HSOverlay.close(document.getElementById('hs-static-backdrop-modal'));
            submitSouvenir(decodedText);
        }
    ).then(() => {
        scannerActive = true;
    }).catch(err => {
        console.error("Gagal memulai scanner:", err);
    });
}

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
                console.warn("Scanner tidak bisa dihentikan:", err);
                isStopping = false;
            });
    }
}

// Tombol untuk memulai scan
document.getElementById('btn-scan-qr').addEventListener('click', () => {
    startScanner();
});

// Observer untuk mematikan kamera saat modal ditutup
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
