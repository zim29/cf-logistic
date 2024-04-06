<div>
    <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
        <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
            <div class="card custom-card">
                <div class="card-body p-5">
                    <div class="my-2 d-flex justify-content-center">
                        <a href="https://cftransportes.com/">
                            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo" class="desktop-logo logo">
                            <img src="https://cftransportes.com/sitepad-data/uploads/2024/03/PERFIL.png" alt="CFTransporte logo" class="desktop-dark logo">
                        </a>
                    </div>
                    <p class="h5 fw-semibold mb-2 text-center">{{ __('Iniciar sesión')}}</p>
                    <div class="row gy-3">
                        <div class="col-xl-12">
                            <label for="email" class="form-label text-default">{{ __('Correo Electrónico') }}</label>
                            <input 
                                    type="text" 
                                    class="form-control form-control-lg @error('form.email') is-invalid  @enderror" 
                                    wire:model.live="form.email"
                                    id="email" 
                                    placeholder="{{ __('Correo Electrónico') }}"
                                    aria-describedby="emailFeedback" >
                            <div id="emailFeedback" class="invalid-feedback">
                                @error('form.email') {{ $message }}  @enderror
                            </div>
                        </div>
                        <div class="col-xl-12 mb-2">
                            <label for="password" class="form-label text-default d-block">{{ __('Contraseña') }}<a href="reset-password-basic.html" class="float-end text-danger">{{ __('¿Olvidó su contraseña?') }}</a></label>
                            <div class="input-group">
                                <input 
                                        type="password" 
                                        class="form-control form-control-lg @error('form.password') is-invalid  @enderror" 
                                        wire:model.live="form.password" 
                                        id="password" 
                                        placeholder="{{ __('Contraseña') }}" >
                                <button class="btn btn-light" type="button" onclick="createpassword('password',this)"  id="password-button"><i class="ri-eye-off-line align-middle"></i></button>
                                <div id="emailFeedback" class="invalid-feedback">
                                    @error('form.password') {{ $message }}  @enderror
                                </div>
                            </div>
                            <div class="mt-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" wire:model.change="form.remember">
                                    <label class="form-check-label text-muted fw-normal" for="defaultCheck1">
                                        {{ __('Mantener sesion activa')}}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-12 d-grid mt-2">
                            <button class="btn btn-lg btn-primary" wire:click="login">{{ __('Acceder')}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
