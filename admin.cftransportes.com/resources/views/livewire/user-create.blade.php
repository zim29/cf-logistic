<div>
    <x-breadcrumb title="Usuarios" route="Usuarios,Crear" />
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
                <div class="col-sm-12">
                    <x-input-field 
                        tabindex="1" 
                        name="email" 
                        label="Correo Electrónico" 
                        model="form.email"
                    /> 
                </div>
                <div class="col-sm-12">
                    <x-input-field 
                        type="password"
                        tabindex="1" 
                        name="password" 
                        label="Contraseña" 
                        model="form.password"
                    /> 
                </div>
                <div class="col-sm-12">
                    <x-select-field 
                        tabindex="1" 
                        name="role_id" 
                        label="Rol" 
                        model="form.role_id"
                        :options="$roles"
                    /> 
                </div>
            </div>    
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true"/>
        </x-form>
    </x-card>

</div>