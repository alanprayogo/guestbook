<div class="px-6 py-1.5">
    <div class="flex items-center gap-x-3">
        <x-action-button variant="souvenir" />
        <x-action-button variant="gift" />
        <x-action-button variant="delete" />
        <button onclick="openCameraModal(this)"
            data-guest-name="{{ $row->guest_name }}"
            class="px-4 py-2 text-white bg-green-600 rounded hover:bg-green-700">
            Buka Kamera
        </button>

    </div>
</div>
