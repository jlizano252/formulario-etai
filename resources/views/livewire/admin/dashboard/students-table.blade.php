<div>
    <div class="card border-0 rounded-4 shadow-lg overflow-hidden bg-white">

        {{-- Barra superior institucional --}}
        <div style="height:6px;background:linear-gradient(90deg,#01498d,#42ab34,#fcd841);"></div>

        {{-- Header --}}
        <div class="card-body px-4 py-4">

            <div class="row g-3 align-items-center">

                <div class="col-lg-6">
                    <h3 class="fw-bold mb-1" style="color:#01498d;">
                        Panel de Registros
                    </h3>

                    <p class="text-muted mb-0">
                        Gestión y seguimiento de estudiantes inscritos.
                    </p>
                </div>

                <div class="col-lg-6 text-lg-end">

                    <div class="d-inline-flex align-items-center gap-3 bg-light px-4 py-3 rounded-4 shadow-sm">
                        <div class="text-start">
                            <small class="text-muted d-block">Total registrados</small>
                            <span class="fw-bold fs-5" style="color:#01498d;">
                                {{ $students->total() }}
                            </span>
                        </div>

                        <div class="rounded-circle d-flex justify-content-center align-items-center"
                            style="width:48px;height:48px;background:#01498d;color:#fff;">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>

                </div>

            </div>

            {{-- Busqueda / acciones --}}
            <div class="row g-3 mt-3">

                <div class="col-lg-6">
                    <div class="position-relative">
                        <i class="fas fa-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>

                        <input
                            wire:model.debounce.400ms="search"
                            type="text"
                            class="form-control rounded-4 border-0 shadow-sm ps-5"
                            placeholder="Buscar por nombre, correo o identificación..."
                            x-on:input="document.querySelector('[data-search-overlay]').style.display = 'flex'"
                            x-on:keyup.escape="document.querySelector('[data-search-overlay]').style.display = 'none'">
                    </div>
                </div>

                <div class="col-lg-3 d-grid">
                    <button wire:click="export"
                        class="btn rounded-4 fw-semibold text-white shadow-sm"
                        style="background:#01498d;"
                        type="button"
                        wire:loading.attr="disabled">

                        <span wire:loading.remove wire:target="export">
                            <i class="fas fa-download me-2"></i>
                            Descargar Registros
                        </span>

                        <span wire:loading wire:target="export">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Generando...
                        </span>

                    </button>
                </div>

                <div class="col-lg-3 d-grid">
                    <button wire:click="exportContacts"
                        class="btn rounded-4 fw-semibold text-white shadow-sm"
                        style="background:#42ab34;"
                        type="button"
                        wire:loading.attr="disabled">

                        <span wire:loading.remove wire:target="exportContacts">
                            <i class="fas fa-phone-alt me-2"></i>
                            Exportar Contactos
                        </span>

                        <span wire:loading wire:target="exportContacts">
                            <span class="spinner-border spinner-border-sm me-2"></span>
                            Generando...
                        </span>

                    </button>
                </div>

            </div>

        </div>

        {{-- Tabla --}}
        <div class="table-responsive position-relative">

            {{-- Overlay --}}
            <div wire:loading.flex wire:target="search, gotoPage, nextPage, previousPage, openModal"
                data-search-overlay
                class="position-absolute w-100 h-100 flex-column justify-content-center align-items-center rounded-3"
                style="display:none;top:0;left:0;background:rgba(255,255,255,0.85);backdrop-filter:blur(3px);z-index:10;">
                <div class="mb-3">
                    <div class="spinner-border" style="color:#01498d;width:2.5rem;height:2.5rem;"></div>
                </div>
                <p class="fw-semibold mb-1" style="color:#01498d;font-size:.9rem;">
                    Cargando registros...
                </p>
                <small class="text-muted">Por favor, espere...</small>
            </div>


            <table class="table table-hover align-middle mb-0">

                <thead style="background:#01498d;">
                    <tr>
                        <th class="text-white ps-4 border-0">Estudiante</th>
                        <th class="text-white border-0">Identificación</th>
                        <th class="text-white border-0">Carrera</th>
                        <th class="text-white border-0">Correo</th>
                        <th class="text-white border-0">Teléfono</th>
                        <th class="text-white pe-4 border-0">Registro</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($students as $student)

                    <tr style="transition:.2s;">

                        <td class="ps-4">
                            <button
                                wire:click="openModal({{ $student->id }})"
                                wire:loading.class="opacity-50"
                                wire:target="openModal"
                                class="btn btn-link text-decoration-none p-0 fw-semibold"
                                style="color:#01498d;">

                                <span wire:loading.remove wire:target="openModal({{ $student->id }})">
                                    {{ ucfirst($student->name . ' ' . $student->lastname) }}
                                </span>

                                <span wire:loading wire:target="openModal({{ $student->id }})">
                                    <span class="spinner-border spinner-border-sm me-1"></span>
                                    Cargando...
                                </span>

                            </button>
                        </td>

                        <td>{{ $student->ide }}</td>

                        <td>
                            <span class="badge rounded-pill px-3 py-2"
                                style="background:#eef4ff;color:#01498d;">
                                {{ $student->career }}
                            </span>
                        </td>

                        <td>{{ $student->email }}</td>

                        <td class="text-nowrap">{{ $student->mobile_formatted }}</td>

                        <td class="pe-4 text-muted">
                            {{ \Carbon\Carbon::parse($student->created_at)->format('d/m/Y') }}
                        </td>

                    </tr>

                    @empty

                    <tr>
                        <td colspan="6" class="text-center py-5">
                            <div class="mb-2">
                                <i class="fas fa-folder-open fa-2x text-muted"></i>
                            </div>
                            <h6 class="fw-bold mb-1" style="color:#01498d;">
                                No se encontraron registros
                            </h6>
                            <small class="text-muted">
                                Intente con otro criterio de búsqueda.
                            </small>
                        </td>
                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>



        {{-- Footer --}}
        @if($students->hasPages())
        <div class="card-footer bg-white border-0 px-4 py-3">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2">

                <small class="text-muted">
                    Mostrando resultados paginados
                </small>

                {{ $students->links() }}

            </div>

        </div>
        @endif

    </div>

    {{-- MODAL PREMIUM --}}
    @if($showModal && $selectedStudent)

    <div
        x-data="{
        visible: false,
        closing: false,
        close() {
            this.closing = true;
            setTimeout(() => {
                this.visible = false;
                setTimeout(() => $wire.closeModal(), 50);
            }, 280);
        }
    }"
        x-init="requestAnimationFrame(() => visible = true)"
        x-show="visible"
        class="modal d-block"
        tabindex="-1"
        style="z-index: 1055; transition: opacity 0.3s ease, backdrop-filter 0.3s ease;"
        :style="closing
        ? 'background: rgba(0,0,0,0); backdrop-filter: blur(0px); -webkit-backdrop-filter: blur(0px);'
        : 'background: rgba(0,0,0,0.5); backdrop-filter: blur(4px); -webkit-backdrop-filter: blur(4px);'">

        <div
            class="modal-dialog modal-lg modal-dialog-centered"
            :class="closing ? 'modal-dialog-out' : 'modal-dialog-anim'">

            <div class="modal-content student-modal border-0 rounded-4 shadow-lg overflow-hidden">

                <div class="modal-bar-animated"></div>

                <div class="modal-header border-0 pb-0 px-4 pt-4 modal-section-1">
                    <div>
                        <h4 class="fw-bold mb-1" style="color:#01498d;">
                            Perfil del Estudiante
                        </h4>
                        <small class="text-muted">
                            Información completa del registro
                        </small>
                    </div>
                    <button type="button" class="btn-close" @click="close()"></button>
                </div>

                <div class="modal-body px-4 pb-2">

                    @php
                    $careerIcon = match($selectedStudent->career) {
                    'Ciencias Agropecuarias' => 'images/ciencias_agropecuarias.png',
                    'Turismo Sostenible' => 'images/turismo_sostenible.png',
                    'Gestion Empresarial' => 'images/gestion_empresarial.png',
                    'Administracion de Empresas Agropecuarias' => 'images/admin_empresas.png',
                    'Desarrollo de Software' => 'images/desarrollo_software.png',
                    'Administracion de Empresas (Virtual)' => 'images/admin_virtual.png',
                    'Contabilidad y Finanzas' => 'images/contabilidad_finanzas.png',
                    default => 'fa-user-graduate',
                    };
                    @endphp

                    {{-- Contenedor del Icono --}}
                    <div class="text-center mb-4 modal-section-1">
                        <div class="mx-auto rounded-circle shadow overflow-hidden"
                            style="width:85px; height:85px; background:#f8f9fa; border: 3px solid #01498d;">

                            <img src="{{ asset($careerIcon) }}"
                                class="w-100 h-100"
                                style="object-fit:cover;"
                                alt="{{ $selectedStudent->career }}">

                        </div>

                        <h5 class="fw-bold mt-3 mb-1">
                            {{ ucfirst($selectedStudent->name . ' ' . $selectedStudent->lastname) }}
                        </h5>
                        <small class="text-muted">{{ $selectedStudent->career }}</small>
                    </div>

                    <div class="row g-4">
                        <div class="col-md-6 modal-section-2">
                            <div class="p-3 rounded-4 bg-light h-100">
                                <h6 class="fw-bold mb-3" style="color:#01498d;">
                                    Datos Personales
                                </h6>
                                <p class="mb-2"><strong>ID:</strong> {{ $selectedStudent->ide }}</p>
                                <p class="mb-2"><strong>Correo:</strong> {{ $selectedStudent->email }}</p>
                                <p class="mb-2"><strong>Carrera:</strong> {{ $selectedStudent->career }}</p>
                                <p class="mb-2"><strong>Teléfono:</strong> {{ $selectedStudent->mobile_formatted }}</p>
                                <p class="mb-0"><strong>Registro:</strong>
                                    {{ \Carbon\Carbon::parse($selectedStudent->created_at)->format('d/m/Y h:i A') }}
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 modal-section-3">
                            <div class="p-3 rounded-4 bg-light h-100">
                                <h6 class="fw-bold mb-3" style="color:#42ab34;">
                                    Contactos de Emergencia
                                </h6>

                                <p class="mb-1">
                                    <strong>#1:</strong> {{ $selectedStudent->emergency_name_1 }}
                                </p>
                                <p class="mb-1">
                                    <small class="text-muted">
                                        <i class="fas fa-heart me-1" style="color:#42ab34;"></i>
                                        {{ $selectedStudent->emergency_relation_1 }}
                                    </small>
                                </p>
                                <p class="mb-2">
                                    <small>
                                        <i class="fas fa-phone-alt me-1" style="color:#01498d;"></i>
                                        {{ $selectedStudent->emergency_phone_1_formatted }}
                                    </small>
                                </p>

                                <hr>

                                <p class="mb-1">
                                    <strong>#2:</strong> {{ $selectedStudent->emergency_name_2 }}
                                </p>
                                <p class="mb-1">
                                    <small class="text-muted">
                                        <i class="fas fa-heart me-1" style="color:#42ab34;"></i>
                                        {{ $selectedStudent->emergency_relation_2 }}
                                    </small>
                                </p>
                                <p class="mb-0">
                                    <small>
                                        <i class="fas fa-phone-alt me-1" style="color:#01498d;"></i>
                                        {{ $selectedStudent->emergency_phone_2_formatted }}
                                    </small>
                                </p>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer border-0 px-4 pb-4 modal-section-3">
                    <button class="btn rounded-4 px-4 text-white fw-semibold"
                        style="background:#01498d;"
                        @click="close()">
                        Cerrar
                    </button>
                </div>

            </div>
        </div>
    </div>
    @endif
</div>