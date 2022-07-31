<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo $__env->make('admin.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>

</head>

<body dir="rtl">

    <?php echo $__env->make('admin.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>



    <section class="body-container">

        <?php echo $__env->make('admin.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


        <section id="main-body" class="main-body">

            <?php echo $__env->yieldContent('content'); ?>

        </section>
    </section>


    <?php echo $__env->make('admin.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>

    <section class="toast-wrapper flex-row-reverse">
        <?php echo $__env->make('admin.alerts.toast.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.alerts.toast.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <?php echo $__env->make('admin.alerts.sweetalert.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


</body>
</html>
<?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/layouts/master.blade.php ENDPATH**/ ?>