<div class="modal fade" id="{{ $id }}" {{$attributes}}>
    <div class="modal-dialog modal-dialog-centered text-center" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title">
                    {{ __($title) }}
                </h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-start">
                {{ $body }}
            </div>
            @if(isset($foot))
                <div class="modal-footer">
                    {{ $foot }}
                </div>
            @endif
        </div>
    </div>
</div>
