
<?php echo \Livewire\Livewire::scripts(); ?>



    <script src="<?php echo e(asset( 'vendors/popper/popper.min.js ')); ?>"></script>
    <script src="<?php echo e(asset( 'vendors/bootstrap/bootstrap.min.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'vendors/anchorjs/anchor.min.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'vendors/fontawesome/all.min.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'vendors/lodash/lodash.min.js' )); ?>"></script>
    <!-- <script src="<?php echo e(asset( 'js/theme.js' )); ?>/"></script> -->
    <script src="<?php echo e(asset( 'js/global/preloader.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/global/messages-listeners.js' )); ?>"></script>
    <script src="<?php echo e(asset( 'js/global/searchBox.js' )); ?>"></script>
<script src="<?php echo e(asset('vendors/countup/countUp.umd.js')); ?>"></script>

    
    <?php echo $__env->yieldContent('scripts'); ?>

</body>

</html>
<?php /**PATH C:\laragon\www\proyecto-limpio\proyecto-limpio\resources\views/layout/sections/private-foot.blade.php ENDPATH**/ ?>