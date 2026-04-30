

<?php $__env->startSection('main-content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/registration.css')); ?>">

<div class="registration-page">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xl-7">

                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('public.enrollment-form.v1.student-form')->html();
} elseif ($_instance->childHasBeenRendered('srhuVMi')) {
    $componentId = $_instance->getRenderedChildComponentId('srhuVMi');
    $componentTag = $_instance->getRenderedChildComponentTagName('srhuVMi');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('srhuVMi');
} else {
    $response = \Livewire\Livewire::mount('public.enrollment-form.v1.student-form');
    $html = $response->html();
    $_instance->logRenderedChild('srhuVMi', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

            </div>
        </div>
    </div>

</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script>
window.addEventListener('load', function () {
    let preloader = document.querySelector('#preloader');

    if(preloader){
        preloader.classList.add('hide-element');

        setTimeout(() => {
            preloader.classList.add('d-none');
        }, 500);
    }
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.public-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\formulario-etai\resources\views/public-mod/public-postulation.blade.php ENDPATH**/ ?>