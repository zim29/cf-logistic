<div>
    <x-breadcrumb title="Almacenes" route="Almacenes,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field 
                        tabindex="1" 
                        name="name" 
                        label="Nombre" 
                        model="form.name"
                    /> 
                </div>
            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>