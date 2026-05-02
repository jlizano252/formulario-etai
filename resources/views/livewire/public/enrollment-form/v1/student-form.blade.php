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
                        <label class="form-label fw-semibold">Teléfono</label>

                        <div wire:ignore>
                            <input
                                id="phone"
                                type="tel"
                                class="form-control rounded-3"
                                placeholder="Ingrese teléfono">
                        </div>

                        @error('mobile')
                        <small class="text-danger d-block">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">
                            Carrera de interés
                        </label>

                        <select wire:model.defer="career"
                            class="form-select rounded-3"
                            style="border-color:#01498d;">

                            <option value="">Seleccione una carrera</option>

                            <option value="Ciencias Agropecuarias">
                                Ciencias Agropecuarias
                            </option>

                            <option value="Turismo Sostenible">
                                Turismo Sostenible
                            </option>

                            <option value="Gestion Empresarial">
                                Gestión Empresarial
                            </option>

                            <option value="Administracion de Empresas Agropecuarias">
                                Administración de Empresas Agropecuarias
                            </option>

                            <option value="Desarrollo de Software">
                                Desarrollo de Software
                            </option>

                            <option value="Administracion de Empresas (Virtual)">
                                Administración de Empresas (Virtual)
                            </option>
                            <option value="Contabilidad y Finanzas">
                                Contabilidad y Finanzas
                            </option>
                        </select>

                        @error('career')
                        <small class="text-danger">{{ $message }}</small>
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
                                <label class="form-label fw-semibold">Teléfono</label>
                                <div wire:ignore>
                                    <input
                                        id="phone-contact1"
                                        type="tel"
                                        class="form-control rounded-3"
                                        placeholder="Ingrese teléfono">
                                </div>
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
                                <label class="form-label fw-semibold">Teléfono</label>
                                <div wire:ignore>
                                    <input
                                        id="phone-contact2"
                                        type="tel"
                                        class="form-control rounded-3"
                                        placeholder="Ingrese teléfono">
                                </div>
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
                    Revise cuidadosamente sus datos antes de enviar el formulario.
                </p>

                <div class="table-responsive">

                    <table class="table align-middle border rounded-4 overflow-hidden bg-white">

                        <tbody>

                            {{-- Datos personales --}}
                            <tr class="table-light">
                                <th colspan="2" class="fw-bold" style="color:#01498d;">
                                    Información Personal
                                </th>
                            </tr>

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

                            <tr>
                                <th style="color:#01498d;">Carrera</th>
                                <td>{{ $career }}</td>
                            </tr>

                            {{-- Contactos de emergencia --}}
                            <tr class="table-light">
                                <th colspan="2" class="fw-bold" style="color:#42ab34;">
                                    Contactos de Emergencia
                                </th>
                            </tr>

                            <tr>
                                <th style="color:#42ab34;">Contacto #1</th>
                                <td>{{ $contact1_name }} - {{ $contact1_phone }}</td>
                            </tr>

                            <tr>
                                <th style="color:#42ab34;">Parentesco</th>
                                <td>{{ $contact1_relation }}</td>
                            </tr>

                            <tr>
                                <th style="color:#42ab34;">Contacto #2</th>
                                <td>{{ $contact2_name }} - {{ $contact2_phone }}</td>
                            </tr>

                            <tr>
                                <th style="color:#42ab34;">Parentesco</th>
                                <td>{{ $contact2_relation }}</td>
                            </tr>

                        </tbody>

                    </table>

                </div>

                <div class="alert alert-light border mt-3 mb-0">
                    <small class="text-muted">
                        Al presionar <strong>Enviar</strong>, confirma que toda la información suministrada es verídica y correcta.
                    </small>
                </div>

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
                        id="btn-next"

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

@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/css/intlTelInput.css">
<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/intlTelInput.min.js"></script>

<script>
    let itiPhone = null;
    let itiContact1 = null;
    let itiContact2 = null;

    const itiConfig = {
        initialCountry: "cr",
        preferredCountries: ["cr", "us", "pa", "ni"],
        separateDialCode: true,
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.2.1/build/js/utils.js"
    };

    function initInput(selector) {
        const input = document.querySelector(selector);
        if (!input || input.classList.contains("iti-initialized")) return null;
        const instance = window.intlTelInput(input, itiConfig);
        input.classList.add("iti-initialized");
        return instance;
    }

    function initAllInputs() {
        const p = initInput("#phone");
        if (p) itiPhone = p;

        const c1 = initInput("#phone-contact1");
        if (c1) itiContact1 = c1;

        const c2 = initInput("#phone-contact2");
        if (c2) itiContact2 = c2;
    }

    function bindNextButton() {
        const btn = document.querySelector("#btn-next");
        if (!btn) return;

        // Clonar para limpiar cualquier listener anterior
        const fresh = btn.cloneNode(true);
        btn.parentNode.replaceChild(fresh, btn);

        fresh.addEventListener("click", async () => {
            const lw = Livewire.first();

            if (itiPhone && document.querySelector("#phone")) {
                await lw.set('mobile', itiPhone.getNumber());
            }

            if (itiContact1 && document.querySelector("#phone-contact1")) {
                await lw.set('contact1_phone', itiContact1.getNumber());
            }

            if (itiContact2 && document.querySelector("#phone-contact2")) {
                await lw.set('contact2_phone', itiContact2.getNumber());
            }

            lw.call('increaseStep');
        });
    }

    document.addEventListener("DOMContentLoaded", () => {
        initAllInputs();
        bindNextButton();
    });

    document.addEventListener("livewire:navigated", () => {
        initAllInputs();
        bindNextButton();
    });

    document.addEventListener("livewire:update", () => {
        setTimeout(() => {
            initAllInputs();
            bindNextButton();
        }, 50);
    });
</script>
@endpush