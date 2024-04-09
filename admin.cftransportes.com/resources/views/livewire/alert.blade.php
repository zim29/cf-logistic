<div>
    <x-modal id="alert_modal">
        <x-slot name="body">
            <div class="text-center">
                <i style="font-size: 4rem" class="bi {{$this->icon}} text-{{$this->color}}"></i>
                <h6 class="fs-22 mt-3">{{ $this->message}}</h6>
            </div>
        </x-slot>
        <x-slot name="foot">
            <div class="v-stack w-100">
                <button class="btn btn-lg btn-{{$this->color}} w-100" data-bs-dismiss="modal">{{__('Aceptar')}}</button>
            </div>
        </x-slot>
    </x-modal>
    @script
        <script>
            $wire.on('show-modal', () => {
                const modal = bootstrap.Modal.getOrCreateInstance('#alert_modal');
                modal.show();
            });
        </script>
    @endscript
</div>
