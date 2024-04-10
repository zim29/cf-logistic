<div>
    <x-breadcrumb title="Ordenes" route="Ordenes,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="mb-3">
                <h5>{{ __('Cliente') }}: {{ $order->client->full_name ?? __('Debe agregar un cliente') }}</h5>
            </div>
            <div class="mb-3">
                <x-input-field tabindex="1" name="pay_method_id" label="Método de pago"
                    value="{{ $order->payMethod->name }}" disabled />
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
