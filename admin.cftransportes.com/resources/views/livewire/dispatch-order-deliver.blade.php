<div>
    <x-breadcrumb title="Ordenes de despacho" route="Ordenes de despacho,Entrega" />
    <x-card title="Entrega">
        <x-form submitAction="save">
            <div class="mb-3">
                <h5>{{ __('Despacho') }}: {{ $dispatchOrder->id }} - {{ $dispatchOrder->order->client->full_name ?? '' }}</h5>
            </div>
            <div class="mb-3">
                <h5>{{ __('Destino') }}: {{ $dispatchOrder->warehouse_id !== null ? 
                                                $dispatchOrder->warehouse->name : 
                                                $dispatchOrder->order->client->address  }}</h5>
            </div>

            <div class="mb-3">
                <x-input-field label="Recibido por"/>
            </div>
            <x-input-signature-capture model="signature" />
         
            <x-button-success class="my-3" type="submit" fullSize="true" label="Aceptar orden" />
        </x-form>
    </x-card>

</div>


