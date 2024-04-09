<div>
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <x-card>
                <div class="my-2 d-flex justify-content-center">
                    <a href="https://cftransportes.com/">
                        <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo" class="desktop-logo logo">
                        <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo" class="desktop-dark logo">
                    </a>
                </div>
                <p class="h5 fw-semibold mb-2 text-center">{{ __('Iniciar sesión')}}</p>
                <div class="row gy-3">
                    <x-form submitAction="login">
                        <div class="col-xl-12" x-data="{ autofocus: false }" x-init="setTimeout(() => { autofocus = true }, 3000)">
                            <x-input-field
                                    x-ref="inputField" x-autofocus="autofocus"
                                    tabindex="1"
                                    model="form.email"
                                    name="email" 
                                    label="Correo Electrónico" />
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <a href="reset-password-basic.html" class="text-danger">{{ __('¿Olvidó su contraseña?') }}</a>
                        </div>
                        <div class="col-xl-12 mb-2">
                            <x-input-field 
                                        tabindex="2"
                                        type="password" 
                                        model="form.password" 
                                        name="password" 
                                        label="{{ __('Contraseña') }}" />
                            <div class="mt-2">
                                <x-checkbox label="Mantener sesion activa" model="form.remember" tabindex="3"/>
                            </div>
                        </div>
                        <div class="col-xl-12 d-grid mt-2">
                            <x-button-primary type="submit" color="primary" label="Acceder" fullSize="true" tabindex="4"/>
                        </div>
                    </x-form>
                </div>
            </x-card>
        </div>
    </div>
</div>
