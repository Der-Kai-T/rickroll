<div {{ $attributes->class(['modal fade']) }} id="{{ $name }}" tabindex="-1" aria-labelledby="{{ $name }}Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ $name }}Label">{{ $headline }}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ $slot }}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn {{ $submitClass ?? "btn-primary" }}" data-bs-dismiss="modal" wire:click="{{ $submitFunction ?? "submit" }}">{{ $submitLabel ?? "Save changes" }}</button>
            </div>
        </div>
    </div>
</div>
