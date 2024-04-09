<div>
    <a href="{{route('warehouse-index')}}" class="btn btn-primary my-3">{{ __('Listar almacenes') }}</a>
    <x-breadcrumb title="Almacenes" route="Almacenes,Ver" />
    <x-card title="{{$this->editMode ? __('Editar') : __('Ver') }}">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="name" label="Tipo de entidad" model="form.name"
                        disabled='{{ !$this->editMode }}' />
                </div>
                <div class="col-sm-12">
                    <x-select-field 
                        tabindex="1" 
                        name="status" 
                        label="Estado" 
                        model="form.status"
                        disabled='{{ !$this->editMode }}'
                        :options="$statusOptions"
                    /> 
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

</div>
