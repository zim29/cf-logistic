<div>
    <a href="{{route('person-type-index')}}" class="btn btn-primary my-3">{{ __('Listar entidades') }}</a>
    <x-breadcrumb title="Entidades" route="Entidades,Ver" />
    <x-card title="{{$this->editMode ? __('Editar') : __('Ver') }}">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="name" label="Nombre completo" model="form.name"
                        disabled='{{ !$this->editMode }}' />
                </div>
                <div class="col-sm-12">
                    <x-input-field tabindex="1" name="name" label="Correo Electrónico" model="form.email"
                        disabled='{{ !$this->editMode }}' />
                </div>
                <div class="col-sm-12">
                    <x-select-field 
                        tabindex="1" 
                        name="role_id" 
                        label="Rol" 
                        model="form.role_id"
                        :options="$roles"
                        disabled='{{ !$this->editMode }}'
                    /> 
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
