<?php $__env->startSection('head-tag'); ?>
    <title><?php echo e($siteSetting->title); ?></title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- start slideshow -->
    <section class="container-xxl my-4">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <?php if(session('danger')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('danger')); ?>

            </div>
        <?php endif; ?>
        <section class="row">
            <section class="col-md-8 pe-md-1">
                <section id="slideshow" class="owl-carousel owl-theme">

                    <?php $__currentLoopData = $slideShowImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slideShowImage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <section class="item">
                            <a class="w-100 d-block h-auto text-decoration-none"
                               href="<?php echo e(urldecode($slideShowImage->url)); ?>">
                                <img class="w-100 rounded-2 d-block h-auto" src="<?php echo e(asset($slideShowImage->image)); ?>"
                                     alt="<?php echo e($slideShowImage->title); ?>">
                            </a>
                        </section>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                <?php $__currentLoopData = $topBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section class="mb-2">
                        <a href="<?php echo e(urldecode($slideShowImage->url)); ?>" class="d-block">
                            <img class="w-100 rounded-2" src="<?php echo e(asset($topBanner->image)); ?>"
                                 alt="<?php echo e($topBanner->title); ?>">
                        </a>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </section>
        </section>
    </section>
    <!-- end slideshow -->


    <?php if(count($productsWithActiveAmazingSales) > 0): ?>
        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>محصولات فروش ویژه</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="<?php echo e(route('customer.market.query-products', 'inputQuery=productsWithActiveAmazingSales')); ?>">مشاهده
                                            همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- end content header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                    <?php $__currentLoopData = $productsWithActiveAmazingSales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $amazingSale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                            $activeAmazingSaleProduct = $amazingSale->product;
                                            $productNewPrice = $activeAmazingSaleProduct->price - ($activeAmazingSaleProduct->price * $amazingSale->percentage / 100);
                                        ?>
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    <?php if(auth()->guard()->guest()): ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $activeAmazingSaleProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    <?php endif; ?>
                                                    <?php if(auth()->guard()->check()): ?>
                                                        <section class="product-add-to-cart"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به سبد خرید"><i
                                                                    class="fa fa-cart-plus"></i></a></section>
                                                        <?php if($activeAmazingSaleProduct->user->contains(auth()->user()->id)): ?>
                                                            <section class="product-add-to-favorite">
                                                                <button
                                                                    class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $activeAmazingSaleProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                    <i class="fa fa-heart text-danger"></i>
                                                                </button>
                                                            </section>
                                                        <?php else: ?>
                                                            <section class="product-add-to-favorite">
                                                                <button
                                                                    class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $activeAmazingSaleProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                    <i class="fa fa-heart"></i>
                                                                </button>
                                                            </section>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <a class="product-link"
                                                       href="<?php echo e(route('customer.market.product', $activeAmazingSaleProduct)); ?>">
                                                        <section class="product-image">
                                                            <img class=""
                                                                 src="<?php echo e(asset($activeAmazingSaleProduct->image['indexArray']['medium'])); ?>"
                                                                 alt="<?php echo e($activeAmazingSaleProduct->name); ?>">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <h3><?php echo e(Str::limit($activeAmazingSaleProduct->name, 30)); ?></h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span class="product-old-price"><?php echo e(priceFormat($activeAmazingSaleProduct->price)); ?> تومان</span>
                                                                <span
                                                                    class="product-discount-amount">% <?php echo e(convertEnglishToPersian($amazingSale->percentage)); ?></span>
                                                            </section>
                                                            <section
                                                                class="product-price"><?php echo e(priceFormat($productNewPrice)); ?>

                                                                تومان
                                                            </section>
                                                        </section>
                                                        <section class="product-colors">
                                                            <?php $__currentLoopData = $activeAmazingSaleProduct->colors()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <section class="product-colors-item"
                                                                         style="background-color: <?php echo e($color->color); ?>;"></section>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    <?php endif; ?>
    <!-- start ads section -->
    <section class="">
        <section class="container-xxl">
            <!-- four column-->
            <section class="row py-4">
                <?php $__currentLoopData = $fourColumnBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section class="col">
                        <a href="<?php echo e(urldecode($colBanner->url)); ?>">
                            <img class="d-block rounded-2 w-100" src="<?php echo e(asset($colBanner->image)); ?>"
                                 alt="<?php echo e($colBanner->title); ?>">
                        </a>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </section>
        </section>
    </section>
    <!-- end ads section -->

    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="<?php echo e(route('customer.market.query-products', 'inputQuery=mostVisitedProducts')); ?>">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                <?php $__currentLoopData = $mostVisitedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mostVisitedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">

                                                <?php if(auth()->guard()->guest()): ?>
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="<?php echo e(route('customer.market.add-to-favorite', $mostVisitedProduct)); ?>"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                <?php endif; ?>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <?php if($mostVisitedProduct->user->contains(auth()->user()->id)): ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $mostVisitedProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    <?php else: ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $mostVisitedProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <a class="product-link"
                                                   href="<?php echo e(route('customer.market.product', $mostVisitedProduct)); ?>">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="<?php echo e(asset($mostVisitedProduct->image['indexArray']['medium'])); ?>"
                                                             alt="<?php echo e($mostVisitedProduct->name); ?>">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3><?php echo e(Str::limit($mostVisitedProduct->name, 30)); ?></h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            
                                                            
                                                        </section>
                                                        <section
                                                            class="product-price"><?php echo e(priceFormat($mostVisitedProduct->price)); ?>

                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        <?php $__currentLoopData = $mostVisitedProduct->colors()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <section class="product-colors-item"
                                                                     style="background-color: <?php echo e($color->color); ?>;"></section>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                <?php $__currentLoopData = $middleBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middleBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <a href="<?php echo e(urldecode($middleBanner->url)); ?>">
                            <img class="d-block rounded-2 w-100" src="<?php echo e(asset($middleBanner->image)); ?>"
                                 alt="<?php echo e($middleBanner->title); ?>">
                        </a>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="<?php echo e(route('customer.market.query-products', 'inputQuery=offerProducts')); ?>">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                <?php $__currentLoopData = $offerProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                <?php endif; ?>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <?php if($offerProduct->user->contains(auth()->user()->id)): ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    <?php else: ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <a class="product-link"
                                                   href="<?php echo e(route('customer.market.product', $offerProduct)); ?>">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="<?php echo e(asset($offerProduct->image['indexArray']['medium'])); ?>"
                                                             alt="<?php echo e($offerProduct->name); ?>">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3><?php echo e(Str::limit($offerProduct->name, 30)); ?></h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            
                                                            
                                                        </section>
                                                        <section
                                                            class="product-price"><?php echo e(priceFormat($offerProduct->price)); ?>

                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        <?php $__currentLoopData = $offerProduct->colors()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <section class="product-colors-item"
                                                                     style="background-color: <?php echo e($color->color); ?>;"></section>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    <?php if(!empty($bottomBanner)): ?>
        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <a href="<?php echo e(urldecode($bottomBanner->url)); ?>">
                            <img class="d-block rounded-2 w-100" src="<?php echo e(asset($bottomBanner->image)); ?>"
                                 alt="<?php echo e($bottomBanner->title); ?>">
                        </a>
                    </section>
                </section>

            </section>
        </section>
        <!-- end ads section -->

    <?php endif; ?>

    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>جدیدترین محصولات</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="<?php echo e(route('customer.market.query-products', 'inputQuery=newestProducts')); ?>">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                <?php $__currentLoopData = $newestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offerProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                <?php endif; ?>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    <?php if($offerProduct->user->contains(auth()->user()->id)): ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    <?php else: ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $offerProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <a class="product-link"
                                                   href="<?php echo e(route('customer.market.product', $offerProduct)); ?>">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="<?php echo e(asset($offerProduct->image['indexArray']['medium'])); ?>"
                                                             alt="<?php echo e($offerProduct->name); ?>">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3><?php echo e(Str::limit($offerProduct->name, 30)); ?></h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            
                                                            
                                                        </section>
                                                        <section
                                                            class="product-price"><?php echo e(priceFormat($offerProduct->price)); ?>

                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        <?php $__currentLoopData = $offerProduct->colors()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <section class="product-colors-item"
                                                                     style="background-color: <?php echo e($color->color); ?>;"></section>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->

    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                <?php $__currentLoopData = $bottomMiddleBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $middleBanner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <a href="<?php echo e(urldecode($middleBanner->url)); ?>">
                            <img class="d-block rounded-2 w-100" src="<?php echo e(asset($middleBanner->image)); ?>"
                                 alt="<?php echo e($middleBanner->title); ?>">
                        </a>
                    </section>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start content header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            <?php $__currentLoopData = $systemBrands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="rounded-2"
                                                 src="<?php echo e(asset($brand->logo['indexArray']['medium'])); ?>" alt="">
                                        </a>
                                    </section>
                                </section>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->

    <div class="album py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه سیستم های اسمبل شده</li>
                </ol>
            </nav>
            <div class="card-group">
                <?php $__currentLoopData = $sampleOfGamingSystemImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="card">
                        <img src="<?php echo e(asset($system->image['indexArray']['medium'] )); ?>" class="card-img-top"
                             alt="...">
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>

    <?php if(!empty($brandsBanner)): ?>
        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <a href="<?php echo e(urldecode($brandsBanner->url)); ?>">
                            <img class="d-block rounded-2 w-100" src="<?php echo e(asset($brandsBanner->image)); ?>"
                                 alt="<?php echo e($brandsBanner->title); ?>">
                        </a>
                    </section>
                </section>

            </section>
        </section>
        <!-- end ads section -->

    <?php endif; ?>

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $('.product-add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#search').on('keyup', function () {
            var searchKey = $(this).val()
            var timer = setTimeout(liveSearch(searchKey), 2000);
        });

        function liveSearch(str) {
            // var url = "/search?name=" + str
            $.ajax({
                url: '<?php echo e(route('customer.search')); ?>',
                type: "GET",
                data: {'search': str},
                success: function (response) {
                    if (response.status) {
                        let products = response.results.products;
                        let categories = response.results.categories;
                        let brands = response.results.brands;
                        if (products != null) {
                            $('#product-search-result').removeClass('d-none').append()
                            $('#product-search-key').innerHTML = response.key
                            products.map((product) => {
                                $('#product-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').text(product.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        if (categories != null) {
                            $('#product-category-search-result').removeClass('d-none')
                            $('#category-search-key').innerHTML = response.key
                            categories.map((category) => {
                                $('#product-category-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').attr('href', '/category/' + category.slug + '/products').text(category.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        if (brands != null) {
                            $('#brand-search-result').removeClass('d-none')
                            $('#brand-search-key').innerHTML = response.key
                            brands.map((brand) => {
                                $('#brand-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').text(brand.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        // $('#product-search-result').empty();

                    } else {
                        console.log(response.key)
                    }
                },
                error: function () {

                }
            })
        }

        // var timer = setTimeout(liveSearch, 2000)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/customer/home.blade.php ENDPATH**/ ?>