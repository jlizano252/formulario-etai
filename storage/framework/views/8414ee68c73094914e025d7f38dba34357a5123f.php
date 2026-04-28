<!-- ===============================================-->
<!-- Main Content Premium -->
<!-- ===============================================-->

<style>
    .page-link {
        font-size: .78rem !important;
        border-radius: 10px !important;
    }
</style>

<main class="main admin-layout" id="top">

    <div class="container py-3" data-layout="container">

        
        <nav class="navbar navbar-expand-lg admin-navbar mb-4">

            
            <a class="navbar-brand d-flex align-items-center gap-2"
                href="<?php echo e(route('public.postularse.index')); ?>">

                <div class="brand-logo-box">
                    <img
                        src="<?php echo e(asset('images/ivetc-brand-loading-sm-min.png')); ?>"
                        width="80"
                        alt="Logo">
                </div>

                <div class="d-flex flex-column lh-sm">
                    <span class="fw-bold admin-brand-title">
                        Registros
                    </span>
                    <small class="text-muted">
                        Panel Administrativo
                    </small>
                </div>
            </a>

            
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item dropdown">
                    <a class="nav-link p-0" id="navbarDropdownUser" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">

                        <div class="d-flex align-items-center justify-content-end gap-3">

                            <div class="text-end lh-sm">
                                <div class="fw-semibold" style="color:#01498d;font-size:.95rem;">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>

                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->lastname); ?>

                                </div>

                                <small class="text-muted">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->ide); ?>

                                </small>
                            </div>

                            <div class="avatar avatar-xl">
                                <img class="rounded-circle shadow-sm"
                                    src="<?php echo e(asset('images/team/avatar.png')); ?>"
                                    alt="Avatar">
                            </div>

                        </div>
                        </a>

                        
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow rounded-4 py-2 mt-2">

                            <div class="px-3 pb-2 border-bottom">
                                <div class="fw-semibold" style="color:#01498d;">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>

                                </div>
                                <small class="text-muted">
                                    Sesión activa
                                </small>
                            </div>
                            <form action="<?php echo e(route('logout')); ?>"
                                method="post"
                                class="mt-2">
                                <?php echo csrf_field(); ?>
                                <button class="dropdown-item d-flex align-items-center gap-2 py-2"
                                    type="submit">
                                    <i class="fas fa-sign-out-alt text-danger"></i>
                                    <span>Cerrar sesión</span>
                                </button>
                            </form>
                        </div>
                </li>
            </ul>
        </nav>

        
        <div class="content">

            <div class="admin-content-card">

                <?php echo $__env->yieldContent('main-content'); ?>

            </div>

        </div>

    </div>

</main>

<!-- ===============================================-->
<!-- End Main Content -->
<!-- ===============================================--><?php /**PATH C:\laragon\www\proyecto-limpio\proyecto-limpio\resources\views/layout/sections/dashboard/main-container.blade.php ENDPATH**/ ?>