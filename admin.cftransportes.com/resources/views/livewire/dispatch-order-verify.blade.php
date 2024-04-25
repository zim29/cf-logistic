<div>
    <x-breadcrumb title="Ordenes de despacho" route="Ordenes de despacho,Verificar" />
    <x-card title="Verficar">
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
            </div>
            <x-table>
                <x-slot name="head">
                    <x-table.head scope="col">{{ __('Descripción') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Cantidad contada') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Unidad') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($this->form->items as $key => $item)
                        <x-table.row>
                            <x-table.cell class="text-center">
                                {{ $item['name'] }}
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" name="quantity.{{ $key }}" label="Cantidad"
                                    model="form.items.{{ $key }}.dispatchQuantity" type='number' min="0" class="text-center" />
                            </x-table.cell>
                            <x-table.cell>
                                {{ $item['unit'] }}
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="5" class="text-center"> {{ __('No se han facturado productos') }}
                                ...</x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>            
            <x-button-success class="my-3" type="submit" fullSize="true" label="Aceptar orden" />
        </x-form>
    </x-card>

</div>


