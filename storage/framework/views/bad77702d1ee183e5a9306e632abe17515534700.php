<?php $__env->startSection('main-content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/registration.css')); ?>">

<div class="registration-page d-flex align-items-center">

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-12 col-md-10 col-lg-7 col-xl-6">

                <div class="card border-0 shadow-lg rounded-4 overflow-hidden text-center">

                    
                    <div style="height:6px;background:linear-gradient(90deg,#01498d,#42ab34,#fcd841);"></div>

                    <div class="card-body p-4 p-lg-5">

                        
                        <img
                            src="<?php echo e(asset('images/ivetc-brand-footer.png')); ?>"
                            class="img-fluid mb-4"
                            style="max-width:180px;"
                            alt="Logo">

                        
                        <div class="mb-3">
                            <div class="mx-auto rounded-circle d-flex align-items-center justify-content-center"
                                style="width:90px;height:90px;background:rgba(220,53,69,.08);">
                                <span style="font-size:42px;color:#dc3545;">⚠</span>
                            </div>
                        </div>

                        
                        <h2 class="fw-bold mb-2" style="color:#dc3545;">
                            ¡Ocurrió un error!
                        </h2>

                        <h5 class="fw-bold mb-2" style="color:#01498d;">
                            Inténtalo nuevamente en unos minutos.
                        </h5>

                        <p class="text-muted mb-4">
                            Si el problema persiste, comunícate con nosotros para ayudarte.
                        </p>

                        
                        <a href="<?php echo e(route('public.postularse.index')); ?>"
                            class="btn px-4 py-2 rounded-3 fw-bold text-white border-0"
                            style="background:#01498d;">
                            Regresar a la página principal
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.public-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\formulario-etai\formulario-etai\resources\views/public-mod/error.blade.php ENDPATH**/ ?>