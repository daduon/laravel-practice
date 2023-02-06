<div class="modal fade" id="theme-preview-{{ $theme->code }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Preview Theme</h4>
                <button type="button" class="close" data-dismiss="modal"
                        aria-hidden="true">X</button>
            </div>
            <div class="modal-body wrap-none">
                <img src="{{ $theme->screenshot }}" width="100%" />
            </div>
        </div>
    </div>
</div>
