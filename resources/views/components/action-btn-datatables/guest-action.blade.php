<div class="flex items-center gap-x-3">
    @if (!$row->arrival)
        {{-- Tampilkan tombol jika belum hadir --}}
        <x-action-button variant="plus" aria-haspopup="dialog" data-hs-overlay="#arrival-confirm-modal" class="btn-arrival"
            data-id="{{ $row->id }}" data-name="{{ $row->guest_name }}" />
    @endif
    <x-action-button variant="edit" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-static-backdrop-modal"
        data-hs-overlay="#hs-static-backdrop-modal" class="btn-edit" data-id="{{ $row->id }}" />
    <x-action-button variant="delete" aria-haspopup="dialog" data-hs-overlay="#delete-confirm-modal" class="btn-delete"
        data-id="{{ $row->id }}" data-name="{{ $row->guest_name }}" />
    <x-action-button variant="send"
        href="https://wa.me/{{ $row->guest_phone }}?text={{ urlencode($row->kata_pengantar) }}" target="_blank" />
    @if ($row->url === 'byattari')
        <x-action-button variant="download"
            href="https://byattari.com/hamid-khalisha/?to={{ $row->guest_name }}&sesi={{ $row->session }}&cat={{ $row->category_id }}&lim={{ $row->guest_limit }}&meja={{ $row->no_table }}"
            target="_blank" />
    @else
        <x-action-button variant="download"
            href="https://attarivitation.com/demo-undangan-buku-tamu/?to={{ $row->guest_name }}&sesi={{ $row->session }}&cat={{ $row->category_id }}&lim={{ $row->guest_limit }}&meja={{ $row->no_table }}"
            target="_blank" />
    @endif
</div>
