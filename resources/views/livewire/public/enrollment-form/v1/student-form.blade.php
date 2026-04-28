<div>
    <div class="card shadow-lg border-0 rounded-4 position-relative overflow-hidden">

        {{-- Loading overlay --}}
        <div wire:loading class="position-absolute top-0 start-0 w-100 h-100"
            style="z-index:20;background:rgba(255,255,255,.82);backdrop-filter:blur(4px);">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="spinner-border" style="color:#01498d;width:3rem;height:3rem;"></div>
            </div>
        </div>

        {{-- Header line --}}
        <div style="height:6px;background:linear-gradient(90deg,#01498d,#42ab34,#fcd841);"></div>

        {{-- Logo --}}
        <div class="d-flex justify-content-center mt-4">
            <img class="img-fluid"
                src="{{ asset('images/ivetc-brand-footer.png') }}"
                style="max-width:130px;">
        </div>

        {{-- Indicador de pasos --}}
        <div class="d-flex justify-content-center py-3">
            <div class="d-flex align-items-center gap-3">

                <div class="rounded-circle d-flex justify-content-center align-items-center fw-bold text-white"
                    style="width:32px;height:32px;background: {{ $current_step >= 1 ? '#01498d' : '#dee2e6' }};">
                    1
                </div>

                <div style="width:35px;height:3px;background: {{ $current_step >= 2 ? '#42ab34' : '#dee2e6' }};"></div>

                <div class="rounded-circle d-flex justify-content-center align-items-center fw-bold text-white"
                    style="width:32px;height:32px;background: {{ $current_step >= 2 ? '#42ab34' : '#dee2e6' }};">
                    2
                </div>

                <div style="width:35px;height:3px;background: {{ $current_step >= 3 ? '#42ab34' : '#dee2e6' }};"></div>

                <div class="rounded-circle d-flex justify-content-center align-items-center fw-bold text-white"
                    style="width:32px;height:32px;background: {{ $current_step >= 3 ? '#42ab34' : '#dee2e6' }};">
                    3
                </div>

                <div style="width:35px;height:3px;background: {{ $current_step >= 4 ? '#fcd841' : '#dee2e6' }};"></div>

                <div class="rounded-circle d-flex justify-content-center align-items-center fw-bold"
                    style="width:32px;height:32px;
                     color: {{ $current_step >= 4 ? '#111' : '#666' }};
                     background: {{ $current_step >= 4 ? '#fcd841' : '#dee2e6' }};">
                    4
                </div>

            </div>
        </div>

        <form wire:submit.prevent="processData" autocomplete="off">

            <div class="card-body px-4 px-lg-5 pb-4" style="line-height:1.75;">

                {{-- Título --}}
                <div class="text-center mb-4">
                    <h4 class="fw-bold text-uppercase mb-2" style="color:#01498d;">
                        Formulario de Registro Estudiantil
                    </h4>

                    <p class="text-muted small mb-0">
                        Complete todos los campos requeridos cuidadosamente.
                    </p>
                </div>


                {{-- PASO 1 --}}
                @if($current_step == 1)

                <h5 class="text-center fw-bold mb-4" style="color:#01498d;">
                    Instrucciones Generales
                </h5>

                <div class="rounded-4 p-4 border bg-light">

                    <p class="text-secondary mb-3">
                        La información que proporcione será tratada de forma confidencial.
                    </p>

                    <p class="text-secondary mb-0">
                        Verifique nombres, números y correo electrónico antes de continuar.
                    </p>

                </div>

                <div class="mt-4 p-4 rounded-4 border">

                    <h6 class="fw-bold mb-3">
                        <span style="color:#01498d;">Sección 1.</span>
                        <span style="color:#42ab34;"> Términos y Condiciones</span>
                    </h6>

                    <p class="mb-3">
                        ¿Se compromete a brindar información veraz y correcta en este formulario?
                    </p>

                    <div class="d-flex flex-wrap gap-4">

                        <div class="form-check">
                            <input wire:model="accepts_terms"
                                class="form-check-input"
                                type="radio"
                                id="terms-yes"
                                value="si">

                            <label class="form-check-label" for="terms-yes">
                                Sí
                            </label>
                        </div>

                        <div class="form-check">
                            <input wire:model="accepts_terms"
                                class="form-check-input"
                                type="radio"
                                id="terms-no"
                                value="no">

                            <label class="form-check-label" for="terms-no">
                                No
                            </label>
                        </div>

                    </div>

                </div>

                @endif



                {{-- PASO 2 --}}
                @if($current_step == 2)

                <h5 class="fw-bold mb-4" style="color:#01498d;">
                    Información Personal
                </h5>

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Número de Identificación
                        </label>

                        <input wire:model.defer="ide"
                            type="text"
                            class="form-control rounded-3"
                            placeholder="Ingrese su identificación"
                            style="border-color:#01498d;">

                        @error('ide')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Nombre
                        </label>

                        <input wire:model.defer="name"
                            type="text"
                            class="form-control rounded-3"
                            placeholder="Ingrese su nombre"
                            style="border-color:#01498d;">

                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Apellidos
                        </label>

                        <input wire:model.defer="lastname"
                            type="text"
                            class="form-control rounded-3"
                            placeholder="Ingrese sus apellidos"
                            style="border-color:#01498d;">

                        @error('lastname')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Correo Electrónico
                        </label>

                        <input wire:model.defer="email"
                            type="email"
                            class="form-control rounded-3"
                            placeholder="Ingrese su correo activo"
                            style="border-color:#01498d;">

                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Teléfono
                        </label>

                        <input wire:model.defer="mobile"
                            type="text"
                            class="form-control rounded-3"
                            placeholder="+### ####-####"
                            style="border-color:#01498d;">

                        <small class="text-muted">
                            Formato: +### ####-####
                        </small>

                        @error('mobile')
                        <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                @endif

                {{-- PASO 3 --}}
                @if($current_step == 3)

                <h5 class="fw-bold mb-4" style="color:#01498d;">
                    Contactos de Emergencia
                </h5>

                <div class="alert border rounded-4 mb-4"
                    style="background:#f8fafc;border-color:#dee2e6;color:#495057;">

                    <strong>Importante:</strong><br>
                    Debe registrar <strong>2 contactos de emergencia distintos</strong>.<br>
                    Ninguno puede corresponder a la persona que realiza el pre-registro.

                </div>


                {{-- CONTACTO PRINCIPAL --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-header border-0 rounded-top-4 text-white fw-bold"
                        style="background:#01498d;">
                        Contacto Principal
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Nombre Completo
                                </label>

                                <input wire:model.defer="contact1_name"
                                    type="text"
                                    class="form-control rounded-3"
                                    placeholder="Ingrese nombre completo">

                                @error('contact1_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Parentesco
                                </label>

                                <select wire:model.defer="contact1_relation"
                                    class="form-select rounded-3">
                                    <option value="">Seleccione</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Hermano(a)">Hermano(a)</option>
                                    <option value="Cónyuge">Cónyuge</option>
                                    <option value="Encargado Legal">Encargado Legal</option>
                                    <option value="Otro">Otro</option>
                                </select>

                                @error('contact1_relation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Teléfono
                                </label>

                                <input wire:model.defer="contact1_phone"
                                    type="text"
                                    class="form-control rounded-3"
                                    placeholder="+### ####-####">

                                @error('contact1_phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>



                {{-- CONTACTO SECUNDARIO --}}
                <div class="card border-0 shadow-sm rounded-4 mb-4">

                    <div class="card-header border-0 rounded-top-4 fw-bold"
                        style="background:#42ab34;color:#fff;">
                        Contacto Secundario
                    </div>

                    <div class="card-body">

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Nombre Completo
                                </label>

                                <input wire:model.defer="contact2_name"
                                    type="text"
                                    class="form-control rounded-3"
                                    placeholder="Ingrese nombre completo">

                                @error('contact2_name')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Parentesco
                                </label>

                                <select wire:model.defer="contact2_relation"
                                    class="form-select rounded-3">
                                    <option value="">Seleccione</option>
                                    <option value="Madre">Madre</option>
                                    <option value="Padre">Padre</option>
                                    <option value="Hermano(a)">Hermano(a)</option>
                                    <option value="Cónyuge">Cónyuge</option>
                                    <option value="Encargado Legal">Encargado Legal</option>
                                    <option value="Otro">Otro</option>
                                </select>

                                @error('contact2_relation')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="col-md-6">
                                <label class="form-label fw-semibold">
                                    Teléfono
                                </label>

                                <input wire:model.defer="contact2_phone"
                                    type="text"
                                    class="form-control rounded-3"
                                    placeholder="+### ####-####">

                                @error('contact2_phone')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                    </div>
                </div>

                @endif

                {{-- PASO 4 --}}
                @if($current_step == 4)

                <h5 class="fw-bold mb-4" style="color:#01498d;">
                    Confirmar Información
                </h5>

                <p class="text-secondary">
                    Revise sus datos antes de enviar el formulario.
                </p>

                <div class="table-responsive">

                    <table class="table align-middle border rounded-4 overflow-hidden">

                        <tbody>

                            <tr>
                                <th style="width:35%;color:#01498d;">Identificación</th>
                                <td>{{ $ide }}</td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Nombre</th>
                                <td>{{ $name }}</td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Apellidos</th>
                                <td>{{ $lastname }}</td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Correo</th>
                                <td>{{ $email }}</td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Teléfono</th>
                                <td>{{ $mobile }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                <p class="small text-muted mt-3 mb-0">
                    Al presionar <strong>Enviar</strong>, confirma que la información es correcta.
                </p>

                @endif



                {{-- ACCIONES --}}
                <hr class="my-4" style="opacity:.12;">

                <div class="d-flex {{ $current_step == 1 ? 'justify-content-end' : 'justify-content-between' }}">

                    @if($current_step >= 2)
                    <button type="button"
                        wire:click="decreaseStep"
                        class="btn px-4 text-white rounded-3"
                        style="background:#01498d;">
                        Atrás
                    </button>
                    @endif


                    @if($current_step == 4)
                    <button type="submit"
                        class="btn px-5 fw-bold rounded-3"
                        style="background:#42ab34;color:#fff;">
                        Enviar
                    </button>
                    @endif


                    @if($current_step < 4)
                        <button type="button"
                        wire:click="increaseStep"

                        @if($current_step==1 && $accepts_terms=='no' )
                        disabled
                        @endif

                        class="btn px-5 fw-bold rounded-3
                            {{ $current_step == 1 && $accepts_terms == 'no' ? 'btn-secondary' : '' }}"

                        style="{{ $current_step == 1 && $accepts_terms == 'no' ? '' : 'background:#42ab34;color:#fff;' }}">
                        Siguiente
                        </button>
                        @endif

                </div>

            </div>

        </form>
    </div>
</div>
<div class="text-center mt-4">

    <small class="text-muted d-block">
        © ETAI {{ date('Y') }} · Formulario Oficial
    </small>

    <a href="{{ route('login') }}"
        class="text-decoration-none small fw-semibold"
        style="color:#01498d;">
        Acceso Administrativo
    </a>

    <small class="d-block mt-2 text-muted" style="font-size:.72rem;">
        Desarrollado por Jenhson Lizano Villalobos
    </small>

</div>