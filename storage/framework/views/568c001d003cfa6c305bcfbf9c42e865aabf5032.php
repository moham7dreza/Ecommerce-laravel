<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo $__env->make('customer.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>
</head>
<body>

<?php echo $__env->make('customer.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<section id="main-body-two-col" class="container-xxl body-container">
    <section class="row">
        
        <?php echo $__env->make('customer.layouts.filter-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        

        <?php echo $__env->make('admin.alerts.alert-section.success', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
        <main id="main-body" class="main-body col-md-9">
            <?php echo $__env->yieldContent('content'); ?>

        </main>
    </section>
</section>

<?php echo $__env->make('customer.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('customer.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/customer/layouts/filter-two-col.blade.php ENDPATH**/ ?>