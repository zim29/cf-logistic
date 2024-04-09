<div>
    <a href="{{ route('vehicle-index') }}" class="btn btn-primary my-3">{{ __('Listar vehículos') }}</a>
    <x-breadcrumb title="Vehículos" route="Vehículos,Listar,Ver" />
    <x-card title="{{ $this->editMode ? __('Editar') : __('Ver') }}">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="placard" label="Placa" model="form.placard"
                        disabled='{{ !$this->editMode }}' />
                </div>
                <div class="mb-3">
                    @if (!$this->editMode)
                        <x-input-field tabindex="1" name="driver_name" label="Conductor" value="{{ $model->driver->name ?? __('Sin asignar') }}" disabled />
                    @else
                        <h5>{{ __('Conductor') }}: {{ $driver->name ?? __('Debe agregar un conductor') }}</h5>
                        @error('form.client_id')
                            <p class="text-danger">{{ __($message) }}</p>
                        @enderror
                        <button wire:click="showDriverDialog" type="button" class="btn btn-primary"
                            id="showDriverDialog">{{ __('Buscar Conductor') }}</button>
                    @endif
                </div>
                <div class="col-sm-12">
                    <x-select-field tabindex="1" name="status" label="Estado" model="form.status"
                        disabled='{{ !$this->editMode }}' :options="$statusOptions" />
                </div>
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="creator" label="Creador"
                        value="{{ $this->model->creator->name ?? __('Sistema') }}" disabled />
                </div>
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="created_at" label="Fecha de creacion"
                        value="{{ $this->model->created_at }}" disabled />
                </div>
            </div>
            @if (!$editMode)
                <x-button-success type="button" label="Editar" fullSize="true" wire:click="toggleEdit" />
            @else
                <x-button-success type="button" label="Guardar cambios" fullSize="true" wire:click="save" />
            @endif
        </x-form>
    </x-card>

    <x-modal title="Seleccionar conductor" id="driver-dialog" wire:ignore.self>
        <x-slot name="body">
            <x-input-field name="search" model="search" label="Buscar" />
            <x-table>
                <x-slot name="head">
                    <x-table.head>{{ __('Nombre') }}</x-table.head>
                </x-slot>
                <x-slot name="body">
                    @forelse ($results as $item)
                        <x-table.row wire:click="selectDriver({{ $item->id }})" style="cursor: pointer">
                            <x-table.cell>{{ $item->name }}</x-table.cell>
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
        $wire.on('show-driver-dialog', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#driver-dialog');
            modal.show();
        });

        $wire.on('close-driver-modal', () => {
            const modal = bootstrap.Modal.getOrCreateInstance('#driver-dialog');
            modal.hide();
        });
    </script>
@endscript
