<div class="px-6 py-1.5">
    <div class="flex items-center gap-x-3">
        <x-action-button variant="souvenir" />
        <x-action-button variant="gift" />
        <x-action-button variant="delete" aria-haspopup="dialog" data-hs-overlay="#delete-confirm-modal" class="btn-delete"
            data-id="{{ $row->id }}" data-name="{{ $row->guest_name }}" />
        <button onclick="openCameraModal(this)" data-guest-name="{{ $row->guest_name }}"
            class="rounded bg-green-600 px-4 py-2 text-white hover:bg-green-700">
            Buka Kamera
        </button>

    </div>
</div>
