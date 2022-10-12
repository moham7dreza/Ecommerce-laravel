<!doctype html>
<html class="no-js" lang="">

<head>
    <?php echo $__env->make('panel.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>
</head>

<body class="rtl persianumber">
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">

    <?php echo $__env->make('panel.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div id="dw-s1" class="bmd-layout-drawer bg-faded ">
        <?php echo $__env->make('panel.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <main class="bmd-layout-content">
        <div class="container-fluid">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </main>
    <?php echo $__env->make('panel.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('script'); ?>

    <section class="toast-wrapper flex-row-reverse">
        <?php echo $__env->make('admin.alerts.toast.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('admin.alerts.toast.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </section>

    <?php echo $__env->make('admin.alerts.sweetalert.error', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/panel/layouts/master.blade.php ENDPATH**/ ?>