<?php if($customException ?? false): ?>
    <div class="alert alert-warning text-center" role="alert">
        <?php echo e($customException); ?>

    </div>
<?php endif; ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('menu.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_8'); ?>
    <?php echo $__env->make('department.table', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content_4'); ?>
    <?php echo $__env->make('department.form_add', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH W:\domains\laraandvue\resources\views/pages/departments.blade.php ENDPATH**/ ?>