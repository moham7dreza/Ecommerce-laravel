<?php $__env->startSection('head-tag'); ?>
    <title>
        همه ی سرویس ها
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
                                <h1 class="page-title">همه ی سرویس ها</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="<?php echo e(route('it-city.home')); ?>">آیتی سیتی</a></li>
                                    <li><a href="<?php echo e(route('it-city.service.index')); ?>">سرویس ها</a></li>
                                    <li class="active">همه ی سرویس ها</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <!-- section -->
    <div class="section padding_layout_1 service_list rtl">
        <div class="container">
            <div class="row">

                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 service_blog margin_bottom_50 text_align_right">
                        <div class="full">
                            <div class="service_img"> <img class="img-responsive" src="<?php echo e($service->imagePath()); ?>" alt="<?php echo e($service->name); ?>" /> </div>
                            <div class="service_cont">
                                <h3 class="service_head"><?php echo e($service->name); ?></h3>
                                <p><?php echo \Illuminate\Support\Str::limit($service->description, 50); ?></p>
                                <div class="bt_cont"> <a class="btn sqaure_bt" href="<?php echo e(route('it-city.service.detail', $service)); ?>">جزئیات سرویس</a> </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </div>
        </div>
    </div>
    <!-- end section -->
    <?php echo $__env->make('it-city.layouts.partials.personnel', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/office/service/all-services.blade.php ENDPATH**/ ?>