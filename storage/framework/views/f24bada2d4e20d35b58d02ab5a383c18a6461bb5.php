<?php $__env->startSection('title'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('description'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('page-actions'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main-content'); ?>
    <div class="container pt-3 pt-md-5">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-8 col-xxl-8 pb-3 px-3 px-md-0">
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.dashboard.students-table')->html();
} elseif ($_instance->childHasBeenRendered('Es3zm9E')) {
    $componentId = $_instance->getRenderedChildComponentId('Es3zm9E');
    $componentTag = $_instance->getRenderedChildComponentTagName('Es3zm9E');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Es3zm9E');
} else {
    $response = \Livewire\Livewire::mount('admin.dashboard.students-table');
    $html = $response->html();
    $_instance->logRenderedChild('Es3zm9E', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.private-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\formulario-etai\formulario-etai\resources\views/dashboard-mod/index.blade.php ENDPATH**/ ?>