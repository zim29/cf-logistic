<div>
    <x-breadcrumb title="Entidades" route="Entidades,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field 
                        tabindex="1" 
                        name="name" 
                        label="Tipo de entidad" 
                        model="form.name"
                    /> 
                </div>
            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>