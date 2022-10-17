<?php $__env->startSection('head-tag'); ?>
    <title>
        نتیجه ای برای نمایش یافت نشد.
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- section -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="center margin_bottom_30_all"> <img class="margin_bottom_30_all" src="<?php echo e(asset('it-next-assets/images/it_service/404_error_img.png')); ?>" alt="#"> </div>
                    <div class="heading text_align_center">
                        <h2>اوه اوه صفحه مورد نظر یافت نشد</h2>
                    </div>
                    <div class="center"> <a class="btn sqaure_bt light_theme_bt" href="<?php echo e(route('it-city.home')); ?>">بازگشت به خانه</a> </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/error/404-error.blade.php ENDPATH**/ ?>