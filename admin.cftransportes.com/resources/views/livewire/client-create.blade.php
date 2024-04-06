<div>
    <x-breadcrumb title="Creación de clientes" route="Clientes,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-select-field 
                        tabindex="1" 
                        name="person_type_id" 
                        label="Tipo de entidad" 
                    /> 
                </div>
            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>
