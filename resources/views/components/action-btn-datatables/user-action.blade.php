<div class="flex items-center gap-x-3">
    <x-action-button variant="edit" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-static-backdrop-modal"
        data-hs-overlay="#hs-static-backdrop-modal" class="btn-edit" data-id="{{ $row->id }}" />
    <x-action-button variant="delete" aria-haspopup="dialog" data-hs-overlay="#delete-confirm-modal" class="btn-delete"
        data-id="{{ $row->id }}" data-name="{{ $row->name }}" />
</div>
