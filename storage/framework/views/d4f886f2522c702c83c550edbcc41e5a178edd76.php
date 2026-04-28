<?php echo $__env->make('layout.sections.private-head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/login.css')); ?>">

<?php echo $__env->make('layout.sections.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<main class="main" id="top">
    <div class="container login-wrapper" data-layout="container">

        <div class="row flex-center min-vh-100 py-6">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-4">

                <div class="card premium-card border-0">
                    <div class="card-body p-4 p-md-5">
                        <div class="text-center mb-4">
                            <img class="brand-logo" src="<?php echo e(asset('images/ivetc-brand-footer.png')); ?>" width="170" alt="Logo">
                        </div>
                        <div class="text-center mb-4">
                            <h3 class="login-title mb-1">Bienvenido</h3>
                            <p class="login-subtitle mb-0">Ingrese sus credenciales para continuar</p>
                        </div>

                        <form action="<?php echo e(route('login')); ?>" method="post">
                            <?php echo csrf_field(); ?>

                            <div class="mb-3">
                                <input name="email"
                                    class="form-control premium-input"
                                    type="text"
                                    placeholder="ID">
                            </div>

                            <div class="mb-3">
                                <input name="password"
                                    class="form-control premium-input"
                                    type="password"
                                    placeholder="Password">
                            </div>

                            <div class="mb-3">
                                <button class="btn premium-btn w-100" type="submit">
                                    Log in
                                </button>
                            </div>

                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small text-center mt-2">
                                Error de autenticación!!!
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="text-danger small text-center mt-2">
                                Error de autenticación!!!
                            </div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </form>

                        <div class="text-center mt-4 footer-note">
                            Portal de Acceso Institucional
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</main>

<?php echo $__env->make('layout.sections.private-foot', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\proyecto-limpio\proyecto-limpio\resources\views/login/login.blade.php ENDPATH**/ ?>