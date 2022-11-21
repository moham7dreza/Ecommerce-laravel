<?php $__env->startSection('head-tag'); ?>
    <title>
        محصولات فروش ویژه
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
                                <h1 class="page-title"> محصولات فروش ویژه</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="<?php echo e(route('it-city.home')); ?>">آیتی سیتی</a></li>
                                    <li><a href="#">استور</a></li>
                                    <li class="active"> محصولات فروش ویژه</li>
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
                        <?php $__empty_1 = true; $__currentLoopData = $productsWithActiveAmazingSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hardware): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <a href="<?php echo e(route('it-city.store.hardware', $hardware->product)); ?>">
                                        <div class="product_img"><img class="img-responsive"
                                                                      src="<?php echo e(asset('it-next-assets/images/it_service/1.jpg')); ?>"
                                                                      alt=""></div>
                                        <div class="product_detail_btm">
                                            <div class="center text_align_center">
                                                <h5><?php echo e($hardware->product->name); ?></h5>
                                            </div>
                                            <div class="starratin">
                                                <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                        class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                                      aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> <i
                                                        class="fa fa-star-o" aria-hidden="true"></i></div>
                                            </div>
                                            <div class="product_price">
                                                <p><span class="old_price">$15.00</span> – <span class="new_price"><?php echo e(priceFormat($hardware->product->price)); ?> تومان</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div>
                                <p>محصولی برای فروش ویژه وجود ندارد</p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <?php echo e($productsWithActiveAmazingSales->links()); ?>

                </div>
                <div class="col-md-3">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <h5>جست و جو</h5>
                            <div class="side_bar_search">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-addon">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span></div>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h5>سرویس</h5>
                            <p>سرویس</p>
                            <a class="btn sqaure_bt" href="it_service.html">مشاهده</a></div>
                        <div class="side_bar_blog">
                            <h4>سرویس های اصلی مجموعه</h4>
                            <div class="categary">
                                <ul>
                                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="<?php echo e(route('it-city.service.service', $service)); ?>"><?php echo e($service->name); ?>

                                                <i class="fa fa-angle-left mr-2"></i></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>آخرین پست ها</h4>
                            <div class="categary">
                                <ul>
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><a href="<?php echo e(route('it-city.blog.post.detail', $post)); ?>"><?php echo e($post->title); ?>

                                                <i class="fa fa-angle-left mr-2"></i></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>برچسب ها</h4>
                            <div class="tags">
                                <ul><?php if(count($productsWithActiveAmazingSales) > 0): ?>
                                        <?php $__currentLoopData = explode(',',$productsWithActiveAmazingSales[0]->product->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $category = \App\Models\Market\ProductCategory::query()->where('name', 'LIKE', '%' . $tag . '%')->first();
                                            ?>
                                            <li>
                                                <a <?php if($category): ?> href="<?php echo e(route('it-city.store.category.components', $category)); ?>"
                                                   <?php else: ?> href="<?php echo e(route('it-city.error.404')); ?>" <?php endif; ?>><?php echo e($tag); ?></a>
                                            </li>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <li>بدون برچسب</li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/store/hardware/special-sale.blade.php ENDPATH**/ ?>