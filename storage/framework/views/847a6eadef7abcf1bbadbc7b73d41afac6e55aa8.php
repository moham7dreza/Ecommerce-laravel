<?php $__env->startSection('head-tag'); ?>
    <title>
        دنیای دیجیتالی
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="position-relative">
        <?php echo $__env->make('digital-world.layouts.partials.vip-posts', ['homeRepo' => $homeRepo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <div class="container">
            <?php echo $__env->make('digital-world.layouts.partials.top-banner', ['homeRepo' => $homeRepo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
            <div class="row">
                <?php echo $__env->make('digital-world.layouts.partials.right-sidebar', ['homeRepo' => $homeRepo], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        <?php echo $__env->make('digital-world.layouts.partials.news-posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        <?php echo $__env->make('digital-world.layouts.partials.left-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/home.blade.php ENDPATH**/ ?>