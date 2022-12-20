<!-- section systems-->
<div class="section padding_layout_1 border-bottom danger">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h3>بهترین سیستم های تک زیلا</h3>
                        <p class="large">نمونه هایی از سیستم ها با کارایی و محبوبیت خوب از نظر مشتری</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $homeRepo->sampleOfAssembledSystems(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all rtl text_align_center">
                    <div class="product_list">
                        <a href="#">
                            <div class="product_img"><img class="img-responsive"
                                                          src="<?php echo e(asset('it-next-assets/system.png')); ?>" alt="">
                            </div>
                            <div class="product_detail_btm">
                                <div class="center">
                                    <h5><?php echo e($system->name); ?></h5>
                                </div>
                                <div class="starratin">
                                    <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i
                                            class="fa fa-star"
                                            aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                         aria-hidden="true"></i> <i
                                            class="fa fa-star-o" aria-hidden="true"></i></div>
                                </div>
                                <div class="product_price">
                                    <p><span class="old_price">۳۰۰۰۰۰۰ تومان</span> – <span
                                            class="new_price"><?php echo e(priceFormat($system->system_price)); ?> تومان</span></p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<!-- end section -->
<?php /**PATH C:\CODEX\techzilla\resources\views/it-city/layouts/partials/system.blade.php ENDPATH**/ ?>