<div>
    <x-breadcrumb title="Tipo de vehículo" route="Tipo de vehículo,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field 
                        tabindex="1" 
                        name="name" 
                        label="Tipo de vehículo" 
                        model="form.name"
                    /> 
                </div>
            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>