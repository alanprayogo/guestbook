<div class="px-6 py-1.5">
    <div class="flex items-center gap-x-3">
        <x-action-button variant="qr-code" />
        <x-action-button variant="edit" />
        <button onclick="openCameraModal(this)"
            data-guest-name="{{ $row->guest_name }}"
            class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
            Buka Kamera
        </button>

    </div>
</div>
