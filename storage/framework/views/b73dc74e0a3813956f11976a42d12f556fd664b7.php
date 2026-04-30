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

        
        <nav class="navbar navbar-expand-lg admin-navbar mb-4 px-4 py-3 rounded-4 shadow-sm bg-white border-0">

            <div class="container-fluid p-0">

                
                <a class="navbar-brand d-flex align-items-center gap-3 m-0"
                    href="#">

                    <div class="rounded-4 p-2 shadow-sm bg-light">
                        <img
                            src="<?php echo e(asset('images/ivetc-brand-loading-sm-min.png')); ?>"
                            style="height:52px;width:auto;"
                            alt="Logo">
                    </div>

                    <div class="d-none d-md-flex flex-column lh-sm">

                        <span class="fw-bold fs-5 mb-0">
                            <span class="text-etc-blue">Panel</span>
                            <span class="text-etc-green">Administrativo</span>
                        </span>

                        <small class="fw-semibold">
                            <span class="text-etc-blue">Sistema de</span>
                            <span class="text-etc-yellow"> Pre-Matriculas ETAI</span>
                        </small>

                    </div>

                </a>

                
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item dropdown">

                        <a class="nav-link p-0"
                            id="navbarDropdownUser"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">

                            <div class="user-profile-box d-flex align-items-center">

                                
                                <div class="user-slide-info text-end lh-sm">

                                    <div class="fw-semibold text-etc-blue" style="font-size:.95rem;">
                                        <?php echo e(Auth::user()->name); ?>

                                        <?php echo e(Auth::user()->lastname); ?>

                                    </div>

                                    <small class="text-muted">
                                        ID: <?php echo e(Auth::user()->ide); ?>

                                    </small>

                                </div>

                                
                                <div class="position-relative user-avatar-box">

                                    <img class="rounded-circle shadow"
                                        src="<?php echo e(asset('images/team/avatar.png')); ?>"
                                        style="width:46px;height:46px;object-fit:cover;"
                                        alt="Avatar">

                                    <span class="position-absolute bottom-0 end-0 rounded-circle border border-white"
                                        style="width:12px;height:12px;background:#42ab34;">
                                    </span>

                                </div>

                            </div>

                        </a>

                        
                        <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-4 mt-3 py-0 overflow-hidden"
                            style="min-width:260px;">

                            
                            <div class="px-4 py-3 text-white"
                                style="background:linear-gradient(135deg,#01498d,#0d63ba);">

                                <div class="fw-bold">
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?>

                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->lastname); ?>

                                </div>

                                <small style="opacity:.85;">
                                    Sesión iniciada correctamente
                                </small>

                            </div>

                            
                            <div class="px-4 py-3">

                                <div class="small text-muted mb-3">
                                    Documento:
                                    <?php echo e(\Illuminate\Support\Facades\Auth::user()->ide); ?>

                                </div>

                                <form action="<?php echo e(route('logout')); ?>"
                                    method="post">
                                    <?php echo csrf_field(); ?>

                                    <button class="btn w-100 rounded-4 fw-semibold text-white"
                                        style="background:#dc3545;"
                                        type="submit">

                                        <i class="fas fa-sign-out-alt me-2"></i>
                                        Cerrar sesión

                                    </button>

                                </form>

                            </div>

                        </div>

                    </li>

                </ul>

            </div>
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
<!-- ===============================================--><?php /**PATH C:\laragon\www\formulario-etai\resources\views/layout/sections/dashboard/main-container.blade.php ENDPATH**/ ?>