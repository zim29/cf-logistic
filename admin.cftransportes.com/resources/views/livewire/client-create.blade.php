<div>
    <x-breadcrumb title="Creación de clientes" route="Clientes,Crear" />
    <x-card title="Crear">
        <x-form submitAction="save">
            <div class="row">
                <div class="col-sm-12">
                    <x-select-field name="person_type_id" label="Tipo de entidad" :options="$personTypes"
                        model="form.person_type_id" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="full_name" label="Nombre o razón social completo" model="form.full_name" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="business_name" label="Nombre comercial" model="form.business_name" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="tax_registration"
                        label="Registro Fiscal, IVA, RUC, Identificación Tributatia (Según aplique)"
                        model="form.tax_registration" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="tax_identification_number" label="Nº de identificacion fiscal"
                        model="form.tax_identification_number" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input-field name="constitution_location" label="Lugar de Constitución"
                        model="form.constitution_location" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input-field type="date" name="constitution_date" label="Fecha de Constitución"
                        model="form.constitution_date" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="registration_number" label="Número de inscripción"
                        model="form.registration_number" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="registration_book" label="Libro de inscripción"
                        model="form.registration_book" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="registration_pages" label="Fólio de inscripción"
                        model="form.registration_pages" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input-field name="address" label="Dirección completa" model="form.address" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input-field name="primary_contact" label="Contacto principal" model="form.primary_contact" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="phone" label="Télefono" model="form.phone" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="website" label="Pagina Web" model="form.website" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="email" label="E-mail" model="form.email" />
                </div>
                <div class="col-md-6 col-sm-12 mt-md-4">
                    <x-checkbox name="corporate_group" label="Pertenece a un Grupo Corporativo"
                        model="form.corporate_group" />
                </div>
                <div class="col-md-6 col-sm-12">
                    <x-input-field name="group_origin_country" label="Pais de origen del grupo"
                        model="form.group_origin_country" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="legal_representative_name" label="Nombre del Representante Legal"
                        model="form.legal_representative_name" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="legal_representative_birthplace"
                        label="Lugar de Nacimiento del representante legal"
                        model="form.legal_representative_birthplace" />
                </div>
                <div class="col-sm-12">
                    <x-input-field type="date" name="legal_representative_birthdate"
                        label="Fecha de Nacimiento del representante legal"
                        model="form.legal_representative_birthdate" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="legal_representative_id_type" label="Tipo Documento de Identidad"
                        model="form.legal_representative_id_type" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="legal_representative_id_number" label="Número Documento de Identidad"
                        model="form.legal_representative_id_number" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="legal_representative_nationality" label="Nacionalidad"
                        model="form.legal_representative_nationality" />
                </div>
                <div class="col-sm-6">
                    <x-input-field name="legal_representative_tax_id" label="No. Identificación Fiscal"
                        model="form.legal_representative_tax_id" />
                </div>
                <div class="col-sm-6">
                    <x-input-field name="legal_representative_email"
                        label="Correo electrónico del representante legal" model="form.legal_representative_email" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="board_members" label="Tipo de entidad" model="form.board_members" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="major_shareholders" label="Tipo de entidad"
                        model="form.major_shareholders" />
                </div>
                <div class="col-sm-12">
                    <x-checkbox name="politically_exposed_person"
                        label="El representante legal de la sociedad, miembros de la junta directiva, principales accionistas ejercen o han ejercido algún cargo público o se consideran personas políticamente expuestas"
                        model="form.politically_exposed_person" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="source_of_funds"
                        label="Origen de fondos para pago de productos y/o servicios" model="form.source_of_funds" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="monthly_billing_estimate"
                        label="Cantidad de dinero estimada de facturación mensual"
                        model="form.monthly_billing_estimate" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="funds_deposited_safe_health"
                        label="Fondos que depositare a Carga, Flete y Transporte SA de CV provienen de:"
                        model="form.funds_deposited_safe_health" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="economic_activity" label="Actividad economica o giro"
                        model="form.economic_activity" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field type="date" name="operation_date" label="Operando desde"
                        model="form.operation_date" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="estimated_annual_income" label="Ingresos anuales estimados"
                        model="form.estimated_annual_income" />
                </div>
                <div class="col-md-4 col-sm-12">
                    <x-input-field name="number_of_employees" label="No. de empleados"
                        model="form.number_of_employees" />
                </div>
                <div class="col-sm-12">
                    <x-select-field name="tax_classification_id" label="Clasificación tributaria"
                        model="form.tax_classification_id" :options="$taxClassifications" />
                </div>
                <div class="col-sm-12">
                    <x-checkbox name="anti_money_laundering_policy"
                        label="La institución cuenta con una política para prevención de lavado de dinero?"
                        model="form.anti_money_laundering_policy" />
                </div>
                <div class="col-sm-12">
                    <x-input-field name="geographic_zones" label="Sucursales" model="form.geographic_zones" />
                </div>

                <div class="col-sm-12 my-3">
                    <h6> Referencias Comerciales</h6>
                    <div class="row">
                        @foreach ($this->form->commercial_references as $key => $item)
                            <div class="col-sm-8">
                                <x-input-field label="Referencia {{ $key+1 }}"
                                    model="form.commercial_references.{{ $key }}" />
                            </div>
                            <div class="col-sm-4 my-md-4">
                                <x-button-danger type="button" fullSize="true" label="Eliminar"
                                    wire:click="deleteCommercialField({{ $key }})"></x-button-danger>
                            </div>
                        @endforeach
                    </div>
                    <button wire:click="addCommercialField" type="button" class="btn btn-primary mt-2"
                        id="addItem">{{ __('Agregar referencia comercial') }}</button>
                </div>
                <div class="col-sm-12 my-3">
                    <h6> Referencias Bancarias</h6>
                    <div class="row">
                        @foreach ($this->form->bank_references as $key => $item)
                            <div class="col-sm-8">
                                <x-input-field label="Referencia {{ $key+1 }}"
                                    model="form.bank_references.{{ $key }}" />
                            </div>
                            <div class="col-sm-4 my-md-4">
                                <x-button-danger type="button" fullSize="true" label="Eliminar"
                                    wire:click="deleteBankField({{ $key }})"></x-button-danger>
                            </div>
                        @endforeach
                    </div>
                    <button wire:click="addBankField" type="button" class="btn btn-primary mt-2"
                        id="addItem">{{ __('Agregar referencia bancaria') }}</button>
                </div>

            </div>
            <x-button-success type="submit" color="primary" label="Crear" fullSize="true" />
        </x-form>
    </x-card>

</div>
