<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <?php echo $__env->make('digital-world.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>
</head>
<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img class="jump mb-50" src="<?php echo e(asset('news-viral-assets/imgs/loading.svg')); ?>" alt="loading">
                <h6>در حال بارگذاری</h6>
                <div class="loader">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-wrap">
    <!--Offcanvas sidebar-->
    <?php echo $__env->make('digital-world.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Header -->
    <?php echo $__env->make('digital-world.layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- Main Wrap Start -->
    <?php echo $__env->yieldContent('content'); ?>

    <!-- Footer Start-->
    <?php echo $__env->make('digital-world.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<div class="dark-mark"></div>
<?php echo $__env->make('digital-world.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>

<section class="toast-wrapper flex-row-reverse"></section>

<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/master.blade.php ENDPATH**/ ?>