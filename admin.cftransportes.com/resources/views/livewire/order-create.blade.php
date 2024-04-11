<div>
    <x-breadcrumb title="Ordenes" route="Ordenes,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="mb-3">
                <h5>{{ __('Cliente') }}: {{ $client->full_name ?? __('Debe agregar un cliente') }}</h5>
                @error('form.client_id')
                    <p class="text-danger">{{ __($message) }}</p>
                @enderror
                <button wire:click="showClientDialog" type="button" class="btn btn-primary"
                    id="showClientDialog">{{ __('Buscar cliente') }}</button>
            </div>
            <x-table>
                <x-slot name="head">
                    <x-table.head scope="col">{{ __('Descripción') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Cantidad') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Unidad') }}</x-table.head>
                    <x-table.head scope="col">{{ __('Acciones') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($this->form->items as $key => $item)
                        <x-table.row>
                            <x-table.cell>
                                <x-input-field tabindex="1" name="desription.{{ $key }}" label="Descripción"
                                    model="form.items.{{ $key }}.name" />
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" name="quantity.{{ $key }}" label="Cantidad"
                                    model="form.items.{{ $key }}.quantity" />
                            </x-table.cell>
                            <x-table.cell>
                                <x-input-field tabindex="1" name="desription.{{ $key }}" label="Unidad"
                                    model="form.items.{{ $key }}.unit" />
                            </x-table.cell>
                            <x-table.cell>
                                <x-button-danger type="button" fullSize="true" label="Eliminar"
                                    wire:click="deleteItemField({{ $key }})"></x-button-danger>
                            </x-table.cell>
                        </x-table.row>
                    @empty
                        <x-table.row>
                            <x-table.cell colspan="4" class="text-center"> {{ __('No se han facturado productos') }}
                                ...</x-table.cell>
                        </x-table.row>
                    @endforelse
                </x-slot>
            </x-table>
            <button wire:click="addItemField" type="button" class="btn btn-primary"
                id="addItem">{{ __('Agregar Producto') }}</button>
            
            <x-button-success class="my-3" type="submit" fullSize="true" label="Generar orden" />
        </x-form>
    </x-card>

    <x-modal title="Seleccionar cliente" id="client-dialog" wire:ignore.self>
        <x-slot name="body">
            <x-input-field name="search" model="search" label="Buscar" />
            <x-table>
                <x-slot name="head">
                    <x-table.head>{{ __('Nombre') }}</x-table.head>
                    <x-table.head>{{ __('Tipo de entidad') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($results as $item)
                        <x-table.row wire:click="selectClient({{ $item->id }})" style="cursor: pointer">
                            <x-table.cell>{{ $item->full_name }}</x-table.cell>
                            <x-table.cell>{{ $item->personType->name }}</x-table.cell>
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
        $wire.on('show-client-dialog', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#client-dialog');
            modal.show();
        });

        $wire.on('close-client-modal', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#client-dialog');
            modal.hide();
        });
    </script>
@endscript
