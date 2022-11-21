<?php $__env->startSection('head-tag'); ?>
    <title>
        اجزای سخت افزاری دسته بندی <?php echo e($productCategory->name); ?>

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
                                <h6 class="page-title"> <?php echo e($productCategory->name); ?></h6>
                                <ol class="breadcrumb rtl">
                                    <li><a href="<?php echo e(route('customer.home')); ?>">خانه</a></li>
                                    <li><a href="#">استور</a></li>
                                    <li class="active"><?php echo e($productCategory->name); ?></li>
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
    <div class="section padding_layout_1 product_list_main rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hardware): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <a href="<?php echo e(route('it-city.store.hardware', $hardware)); ?>">
                                        <div class="product_img"> <img class="img-responsive" src="<?php echo e(asset('it-next-assets/images/it_service/1.jpg')); ?>" alt=""> </div>
                                        <div class="product_detail_btm">
                                            <div class="center text_align_center">
                                                <h5><?php echo e($hardware->name); ?></h5>
                                            </div>
                                            <div class="starratin">
                                                <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                            </div>
                                            <div class="product_price">
                                                <p><span class="old_price">$15.00</span> – <span class="new_price"><?php echo e(priceFormat($hardware->price)); ?> تومان</span></p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                </div>
                <?php echo $__env->make('it-city.layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/store/hardware/category-components.blade.php ENDPATH**/ ?>