<div>
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">

        
        <div style="height:5px;background:linear-gradient(90deg,#01498d,#42ab34,#fcd841);"></div>

        
        <div class="card-body pb-3 pt-4 px-4">

            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

                <div>
                    <h4 class="mb-1 fw-bold" style="color:#01498d;">
                        Estudiantes Registrados
                    </h4>

                    <small class="text-muted">
                        Total registrados
                    </small>
                </div>

                <span class="badge rounded-pill px-4 py-2 fs-6 text-white shadow-sm"
                    style="background:#01498d;">
                    <?php echo e($students->total()); ?>

                </span>

            </div>

            <div class="row g-2 mt-3">

                <div class="col-md-8">
                    <input
                        wire:model.debounce.400ms="search"
                        class="form-control rounded-3 border-0 shadow-sm"
                        type="text"
                        placeholder="Buscar por nombre, correo o identificación...">
                </div>

                <div class="col-md-4 d-grid">
                    <button wire:click="export"
                        class="btn rounded-3 fw-semibold text-white"
                        style="background:#01498d;"
                        type="button">
                        <span class="fas fa-download me-2"></span>
                        Descargar Excel
                    </button>
                </div>

            </div>

        </div>



        
        <div class="table-responsive">

            <table class="table align-middle table-hover mb-0">

                <thead style="background:#01498d;">

                    <tr>
                        <th class="text-white border-0 ps-4">Nombre</th>
                        <th class="text-white border-0">Identificación</th>
                        <th class="text-white border-0">Correo</th>
                        <th class="text-white border-0">Teléfono</th>
                        <th class="text-white border-0 pe-4">Registro</th>
                    </tr>

                </thead>

                <tbody>

                    <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

                    <tr>

                        <td class="ps-4">

                            <button
                                wire:click="openModal(<?php echo e($student->id); ?>)"
                                class="btn btn-link p-0 fw-semibold text-decoration-none"
                                style="color:#01498d;">

                                <?php echo e(ucfirst(strtolower($student->name . ' ' . $student->lastname))); ?>


                            </button>

                        </td>

                        <td><?php echo e($student->ide); ?></td>

                        <td><?php echo e($student->email); ?></td>

                        <td><?php echo e($student->mobile); ?></td>

                        <td class="pe-4 text-muted">
                            <?php echo e(\Carbon\Carbon::parse($student->created_at)->format('d/m/Y')); ?>

                        </td>

                    </tr>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                    <tr>
                        <td colspan="5" class="text-center py-5">

                            <div class="fw-semibold mb-1" style="color:#01498d;">
                                No se encontraron estudiantes
                            </div>

                            <small class="text-muted">
                                Intente con otro criterio de búsqueda.
                            </small>

                        </td>
                    </tr>

                    <?php endif; ?>

                </tbody>

            </table>

        </div>



        
        <?php if($students->hasPages()): ?>
        <div class="card-footer bg-white border-0 py-3 px-4">
            <div class="d-flex justify-content-end">
                <?php echo e($students->links()); ?>

            </div>
        </div>
        <?php endif; ?>

    </div>



    
    <?php if($showModal && $selectedStudent): ?>

    <div class="modal fade show d-block" tabindex="-1">

        <div class="modal-dialog modal-dialog-centered">

            <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

                
                <div style="height:5px;background:linear-gradient(90deg,#01498d,#42ab34,#fcd841);"></div>

                <div class="modal-header border-0 pb-0">

                    <div>

                        <h5 class="fw-bold mb-1" style="color:#01498d;">
                            Detalle del Estudiante
                        </h5>

                        <small class="text-muted">
                            Información registrada
                        </small>

                    </div>

                    <button type="button"
                        class="btn-close"
                        wire:click="closeModal"></button>

                </div>



                <div class="modal-body pt-3 px-4">

                    <div class="text-center mb-4">

                        <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                            style="width:70px;height:70px;background:#01498d;color:#fff;font-size:28px;">

                            <i class="fas fa-user-graduate"></i>

                        </div>

                        <h5 class="fw-bold mt-3 mb-0">
                            <?php echo e(ucfirst($selectedStudent->name . ' ' . $selectedStudent->lastname)); ?>

                        </h5>

                    </div>



                    <table class="table table-bordered align-middle">

                        <tbody>

                            <tr>
                                <th style="width:35%;color:#01498d;">Identificación</th>
                                <td><?php echo e($selectedStudent->ide); ?></td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Nombre</th>
                                <td><?php echo e($selectedStudent->name); ?></td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Apellidos</th>
                                <td><?php echo e($selectedStudent->lastname); ?></td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Correo</th>
                                <td><?php echo e($selectedStudent->email); ?></td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Teléfono</th>
                                <td><?php echo e($selectedStudent->mobile); ?></td>
                            </tr>

                            <tr>
                                <th style="color:#01498d;">Fecha Registro</th>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($selectedStudent->created_at)->format('d/m/Y h:i A')); ?>

                                </td>
                            </tr>

                        </tbody>

                    </table>

                </div>



                <div class="modal-footer border-0 pt-0 px-4 pb-4">

                    <button
                        class="btn px-4 rounded-3 text-white fw-semibold"
                        style="background:#01498d;"
                        wire:click="closeModal">

                        Cerrar

                    </button>

                </div>

            </div>

        </div>

    </div>

    <div class="modal-backdrop fade show"></div>

    <?php endif; ?>

</div><?php /**PATH C:\laragon\www\proyecto-limpio\proyecto-limpio\resources\views/livewire/admin/dashboard/students-table.blade.php ENDPATH**/ ?>