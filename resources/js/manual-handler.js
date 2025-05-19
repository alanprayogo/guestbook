import { Html5Qrcode } from 'html5-qrcode';

export function setupManualHandler({
    modalId,
    formId,
    guestNameInputId,
    openButtonAttr,
    closeButtonAttr,
    submitUrl,
    scannerButtonId = null,
    submitFnName = 'submitData',
    enableNotesModal = false,
}) {
    const modalEl = document.getElementById(modalId);
    const form = document.getElementById(formId);
    const guestInput = document.getElementById(guestNameInputId);
    const openButtons = document.querySelectorAll(`[${openButtonAttr}]`);
    const closeButtons = modalEl.querySelectorAll(`[${closeButtonAttr}]`);

    // === SCANNER SETUP ===
    let html5QrCodeInstance = null;
    let scannerActive = false;
    let isStopping = false;

    const startScanner = () => {
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
                submitData(decodedText);
            }
        ).then(() => {
            scannerActive = true;
        }).catch(err => {
            console.error("Gagal memulai scanner:", err);
        });
    };

    const stopScanner = () => {
        if (html5QrCodeInstance && scannerActive && !isStopping) {
            isStopping = true;

            html5QrCodeInstance.stop()
                .then(() => {
                    html5QrCodeInstance.clear();
                    scannerActive = false;
                    html5QrCodeInstance = null;
                    isStopping = false;
                })
                .catch(err => {
                    console.warn("Scanner tidak bisa dihentikan:", err);
                    isStopping = false;
                });
        }
    };

    // === BUTTON EVENT SETUP ===
    openButtons.forEach(btn => btn.addEventListener('click', () => {
        modalEl.classList.remove('hidden');
        modalEl.classList.add('flex');
        setTimeout(() => {
            modalEl.classList.remove('opacity-0');
            modalEl.classList.add('opacity-100');
        }, 10);
        modalEl.setAttribute('aria-hidden', 'false');
        document.body.classList.add('overflow-hidden');
        guestInput.focus();
    }));

    closeButtons.forEach(btn => btn.addEventListener('click', () => {
        document.activeElement.blur();
        modalEl.classList.remove('opacity-100');
        modalEl.classList.add('opacity-0');
        modalEl.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
        stopScanner();

        setTimeout(() => {
            modalEl.classList.add('hidden');
            form.reset();
        }, 300);
    }));

    // === SCANNER BUTTON ===
    if (scannerButtonId) {
        const scannerBtn = document.getElementById(scannerButtonId);
        if (scannerBtn) {
            scannerBtn.addEventListener('click', startScanner);
        }
    }

    // === MODAL OBSERVER UNTUK MENUTUP KAMERA ===
    const scannerModal = document.getElementById('hs-static-backdrop-modal');
    if (scannerModal) {
        const observer = new MutationObserver((mutationsList) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                    if (mutation.target.classList.contains('hidden')) {
                        stopScanner();
                    }
                }
            }
        });
        observer.observe(scannerModal, { attributes: true });
    }

    // === FORM SUBMIT ===
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        const guestName = guestInput.value;
        submitData(guestName);
    });

    const showToastSuccess = (message) => {
        const toast = document.getElementById('toast-success');
        const messageEl = document.getElementById('toast-success-message');
        messageEl.innerText = message;
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 4000);
    };


    const showToastError = (message) => {
        const toast = document.getElementById('toast-error');
        const messageEl = document.getElementById('toast-error-message');
        messageEl.innerText = message;
        toast.classList.remove('hidden');
        setTimeout(() => toast.classList.add('hidden'), 4000);
    };

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
            confirmModal.classList.add('hidden');
            confirmModal.classList.remove('flex');
        };

        confirmButton.onclick = handleConfirm;
        cancelButton.onclick = () => {
            confirmModal.classList.add('hidden');
            confirmModal.classList.remove('flex');
        };
    };

    let lastGiftId = null;

    function submitData(guestName, force = false) {
        fetch(submitUrl, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            },
            body: JSON.stringify({ guest_name: guestName, force })
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    lastGiftId = data.gift_id || null;
                    closeModal();
                    showToastSuccess(data.message);
                    if (enableNotesModal){
                        openNotesModal(guestName);
                    }else{
                        setTimeout(() => {
                            window.location.reload();
                        }, 2000);
                    }
                } else if (data.status === 'exists' || data.status === 'not_found_in_guests') {
                    closeModal();
                    showConfirmModal(data.message, () => {
                        submitData(guestName, true);
                    });
                } else {
                    showToastError(data.message);
                }
            })
            .catch(err => {
                console.error(err);
                showToastError('Terjadi kesalahan');
            });
    }

    const closeModal = () => {
        document.activeElement.blur();
        modalEl.classList.remove('opacity-100');
        modalEl.classList.add('opacity-0');
        modalEl.setAttribute('aria-hidden', 'true');
        document.body.classList.remove('overflow-hidden');
        stopScanner();

        setTimeout(() => {
            modalEl.classList.add('hidden');
            form.reset();
        }, 300);
    };

    // === MODAL CATATAN ===
    const notesModal = document.getElementById('notes-modal');
    const notesTextarea = document.getElementById('notes-textarea');
    const notesSubmitButton = document.getElementById('notes-submit-button');
    const notesSkipButton = document.getElementById('notes-skip-button');

    const openNotesModal = (guestName) => {
        notesTextarea.value = '';
        notesModal.classList.replace('hidden', 'flex');
    };

    const closeNotesModal = () => {
        notesModal.classList.replace('flex', 'hidden');
        setTimeout(() => {
            window.location.reload();
        }, 500);
    };

    notesSubmitButton?.addEventListener('click', () => {
        const catatan = notesTextarea.value.trim();
        if (catatan !== '') {
            fetch(`${submitUrl}/note`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    note: catatan,
                    gift_id: lastGiftId, // ← kirim ke controller
                })
            })
            .then(res => res.json())
            .then(data => {
                closeNotesModal();
                showToastSuccess(data.message);
            })
            .catch(() => {
                showToastError('Gagal menyimpan catatan');
            });
        } else {
            closeNotesModal();
        }
    });

    notesSkipButton?.addEventListener('click', closeNotesModal);
}
