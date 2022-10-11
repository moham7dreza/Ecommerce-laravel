<?php $__env->startSection('head-tag'); ?>
    <title>
        لیست علاقه مندی ها
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <section id="main-body-two-col" class="container-xxl body-container mb-5">
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <section class="row">

            <?php echo $__env->make('customer.layouts.partials.profile-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start content header -->
                    <section class="content-header mb-4">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>لیست علاقه های من</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->

                    <?php $__empty_1 = true; $__currentLoopData = auth()->user()->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <section class="cart-item d-flex py-3">
                            <section class="cart-img align-self-start flex-shrink-1"><img
                                    src="<?php echo e(asset($product->image['indexArray']['medium'])); ?>" alt=""></section>
                            <section class="align-self-start w-100">
                                <p class="fw-bold"><?php echo e($product->name); ?></p>
                                <?php
                                    $colors = $product->colors()->get();
                                ?>

                                <?php if($colors->count() != 0): ?>
                                    <p>
                                        
                                        
                                        
                                        
                                        
                                        <span style="background-color: <?php echo e($colors->first()->color); ?>;" --}}
                                              class="cart-product-selected-color me-1"></span>
                                        <span><?php echo e($colors->first()->color_name); ?></span>
                                    </p>
                                <?php else: ?>
                                    <p><span>رنگ منتخب وجود ندارد</span></p>
                                <?php endif; ?>

                                <?php
                                    $guarantees = $product->guarantees()->get();
                                ?>
                                <?php if($guarantees->count() != 0): ?>
                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                        <span><?php echo e($guarantees->first()->name); ?></span>
                                    </p>
                                <?php else: ?>
                                    <p><span>گارانتی منتخب وجود ندارد</span></p>
                                <?php endif; ?>


                                <p>
                                    <?php if($product->marketable_number > 0): ?>
                                        <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                                    <?php else: ?>
                                        <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span>
                                    <?php endif; ?>
                                </p>

                                <section class="remove_product_from_favorite">
                                    <a href="<?php echo e(route('customer.profile.favorites.delete', $product)); ?>"
                                        class="text-decoration-none cart-delete"><i
                                            class="fa fa-trash-alt"></i> حذف
                                        از لیست علاقه ها
                                    </a>
                                </section>
                            </section>
                            <section class="align-self-end flex-shrink-1">
                                <section class="text-nowrap fw-bold"><span><?php echo e(priceFormat($product->price)); ?></span>
                                    <span class="small">تومان</span></section>
                            </section>
                        </section>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <section class="order-item">
                            <section class="d-flex justify-content-between">
                                <p>محصولی یافت نشد</p>
                            </section>
                        </section>
                    <?php endif; ?>
                </section>
            </main>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        $('.remove_product_from_favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);

            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {

                    } else if (result.status == 2) {

                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/customer/user/favorites.blade.php ENDPATH**/ ?>