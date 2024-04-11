<div>
    <x-breadcrumb title="Ordenes" route="Ordenes,Crear" />
    <x-card title="Ver">
        <x-form submitAction="save">
            <div class="mb-3">
                <h5>{{ __('Cliente') }}: {{ $order->client->full_name ?? __('Debe agregar un cliente') }}</h5>
            </div>
            <div class="mb-3">
                @if (\Auth::user()->can('approve', $order) && !$order->is_approved)
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <x-select-field label="Metodo de pago" name="pay_method_id" :options="$payMethods"
                                model="pay_method_id"></x-select-field>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-md-4">
                            <x-button-primary label="Guardar metodo de pago" fullSize="true" type="button"
                                wire:click="updatePayMethod"></x-button-primary>
                        </div>
                        <div class="col-sm-12 mt-md-4">
                            <h5>{{ __('Comprobante de pago') }}</h5>
                            <input type="file" name="file" wire:model="file" />
                            <x-input-field tabindex="1" label="Numero de comprobante" model="" />
                            @if ($file)
                                <img src="{{ $file->temporaryUrl() }}" alt="" class="img-fluid rounded"
                                    width="400px">
                            @else
                                <img src="{{ asset('storage/confirmations/payment-confirmation-' . $order->id) }}"
                                    alt="" class="img-fluid rounded" width="400px">
                            @endif
                        </div>
                    </div>
                @elseif(\Auth::user()->role_id === 1)
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <x-select-field label="Metodo de pago" name="pay_method_id" :options="$payMethods"
                                model="pay_method_id"></x-select-field>
                        </div>
                        <div class="col-md-4 col-sm-12 mt-md-4">
                            <x-button-primary label="Guardar metodo de pago" fullSize="true" type="button"
                                wire:click="updatePayMethod"></x-button-primary>
                        </div>
                        <div class="col-sm-12 mt-md-4">
                            <h5>Comprobante de pago</h5>
                            <input type="file" name="file" model="file" wire:model="file" />
                            <x-input-field tabindex="1" label="Numero de comprobante" />
                            @if ($file)
                                <img src="{{ $file->temporaryUrl() }}" alt="" class="img-fluid rounded"
                                    width="400px">
                            @endif
                        </div>
                    </div>
                @else
                    <x-input-field tabindex="1" name="pay_method_id" label="Método de pago"
                        value="{{ $order->payMethod->name ?? __('No se ha escogido un metodo de pago') }}" disabled />
                    <img src="{{ asset('storage/confirmations/payment-confirmation-' . $order->id) }}" alt=""
                        class="img-fluid rounded" width="400px">
                @endif
            </div>
            <x-table>
                <x-slot name="head">
                    <x-table.head scope="col">{{ __('Descripción') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Cantidad') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Unidad') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @foreach ($order->items as $key => $item)
                        <x-table.row>
                            <x-table.cell>
                                <x-input-field tabindex="1" label="Descripción" value="{{ $item['name'] }}"
                                    disabled />
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" label="Cantidad" value="{{ $item['quantity'] }}"
                                    disabled />
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" label="Unidad" value="{{ $item['unit'] }}" disabled />
                            </x-table.cell>
                        </x-table.row>
                    @endforeach
                </x-slot>
            </x-table>
            @if (!$order->is_approved && \Auth::user()->can('approve', $order))
                <div class="mb-3">
                    <x-button-primary wire:click="approve" label="Autorizar para despacho" fullSize="false"
                        type="button"></x-button-primary>
                </div>
            @endif
        </x-form>
    </x-card>


</div>

@script
    <script>
        document.addEventListener('DOMContentLoaded', () => {

        })
    </script>
@endscript
