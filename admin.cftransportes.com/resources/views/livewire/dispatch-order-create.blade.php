<div>
    <x-breadcrumb title="Ordenes de despacho" route="Ordenes de despacho,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="mb-3">
                <h5>{{ __('Orden') }}: {{ $order->id ?? __('Debe agregar una órden') }} - {{ $order->client->full_name ?? '' }}</h5>
                @error('form.order_id')
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror
                <button wire:click="showOrderDialog" type="button" class="btn btn-primary"
                    id="showOrderDialog">{{ __('Buscar órden') }}</button>
            </div>
            <div class="mb-3 my-3">
                <h6>Destino</h6>
                <x-checkbox label="Se enviará al cliente?" model="form.destiny" name="destiny"/>

                @if(!$form->destiny)
                    <x-select-field label="Almacén" name="warehouse_id" :options="$warehouses" model="form.warehouse_id" />
                @endif
            </div>
            <div class="mb-3">
            </div>
            <x-table>
                <x-slot name="head">
                    <x-table.head scope="col">{{ __('Descripción') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Cantidad restante') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Cantidad a despachar') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Unidad') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Acciones') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($this->form->items as $key => $item)
                        <x-table.row>
                            <x-table.cell class="text-center">
                                {{ $item['name'] }}
                            </x-table.cell>
                            <x-table.cell class="text-center">
                                {{ $item['remaining_quantity'] }}
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" name="quantity.{{ $key }}" label="Cantidad"
                                    model="form.items.{{ $key }}.dispatchQuantity" type='number' min="0" max="{{ $item['remaining_quantity'] }}" />
                            </x-table.cell>
                            <x-table.cell>
                                {{ $item['unit'] }}
                            </x-table.cell>
                            <x-table.cell>
                                <x-button-danger type="button" fullSize="true" label="Eliminar"
                                    wire:click="deleteItemField({{ $key }})"></x-button-danger>
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
            <x-button-success class="my-3" type="submit" fullSize="true" label="Generar orden de despacho" />
        </x-form>
    </x-card>

    <x-modal title="Seleccionar order" id="order-dialog" wire:ignore.self>
        <x-slot name="body">
            <x-input-field name="search" model="search" label="Buscar" />
            <x-table>
                <x-slot name="head">
                    <x-table.head>{{ __('No. Orden') }}</x-table.head>
                    <x-table.head>{{ __('Cliente') }}</x-table.head>
                    <x-table.head>{{ __('Fecha de creación') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($results as $item)
                        <x-table.row wire:click="selectOrder({{ $item->id }})" style="cursor: pointer">
                            <x-table.cell>{{ $item->id }}</x-table.cell>
                            <x-table.cell>{{ $item->client->full_name }}</x-table.cell>
                            <x-table.cell>{{ $item->created_at }}</x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="4"
                                class="text-center">{{ __('Sin resultados...') }}</x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
        </x-slot>
    </x-modal>

</div>



@script
    <script>
        $wire.on('show-order-dialog', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#order-dialog');
            modal.show();
        });

        $wire.on('close-order-modal', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#order-dialog');
            modal.hide();
        });
    </script>
@endscript
