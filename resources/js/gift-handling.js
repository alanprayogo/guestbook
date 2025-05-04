import { setupManualHandler } from './manual-handler';

setupManualHandler({
    modalId: 'modal-add-manual',
    formId: 'gift-form',
    guestNameInputId: 'guest-name',
    openButtonAttr: 'data-open-manual-modal',
    closeButtonAttr: 'data-close-manual-modal',
    submitUrl: '/gift-handling',
    scannerButtonId: 'btn-scan-qr',
});