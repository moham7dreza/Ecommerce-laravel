<?php $__env->startSection('head-tag'); ?>
    <title>
        خرید اقساطی
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-right">
                                <h1 class="page-title">خرید اقساطی</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="<?php echo e(route('customer.home')); ?>">خانه</a></li>
                                    <li><a href="<?php echo e(route('it-city.pc.smart-assemble.index')); ?>">اسمبل هوشمند</a></li>
                                    <li class="active">خرید اقساطی</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/pages/installment.blade.php ENDPATH**/ ?>