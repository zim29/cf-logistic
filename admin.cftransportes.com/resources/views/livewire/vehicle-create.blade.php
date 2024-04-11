<div>
    <x-breadcrumb title="Vehículos" route="Vehículos,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-input-field 
                        tabindex="1" 
                        name="placard" 
                        label="Placa" 
                        model="form.placard"
                    /> 
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <x-select-field 
                            tabindex="1" 
                            name="vehicle_type_id" 
                            label="Tipo de Vehículo" 
                            model="form.vehicle_type_id"
                            :options="$vehicleTypes"
                        /> 
                    </div>

            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>