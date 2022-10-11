<?php $__env->startSection('head-tag'); ?>
    <title>
        سفارش های من
    </title>
<?php $__env->stopSection(); ?>
<?php
    $user = auth()->user();
?>
<?php $__env->startSection('content'); ?>
    <section id="main-body-two-col" class="container-xxl body-container mb-5">
        <section class="row">

            <?php echo $__env->make('customer.layouts.partials.profile-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start content header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>تاریخچه سفارشات</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->


                    <section class="d-flex justify-content-center my-4">
                        <a class="btn btn-outline-primary btn-sm mx-1"
                           href="<?php echo e(route('customer.profile.orders')); ?>">همه</a>
                        <a class="btn btn-info btn-sm mx-1" href="<?php echo e(route('customer.profile.orders', 'type=0')); ?>">بررسی
                            نشده</a>
                        <a class="btn btn-warning btn-sm mx-1" href="<?php echo e(route('customer.profile.orders', 'type=1')); ?>">در
                            انتظار
                            تایید</a>
                        <a class="btn btn-success btn-sm mx-1" href="<?php echo e(route('customer.profile.orders', 'type=2')); ?>">تایید
                            نشده</a>
                        <a class="btn btn-danger btn-sm mx-1" href="<?php echo e(route('customer.profile.orders', 'type=3')); ?>">تایید
                            شده</a>
                        <a class="btn btn-outline-danger btn-sm mx-1"
                           href="<?php echo e(route('customer.profile.orders', 'type=4')); ?>">باطل
                            شده</a>
                        <a class="btn btn-dark btn-sm mx-1" href="<?php echo e(route('customer.profile.orders', 'type=5')); ?>">مرجوع
                            شده</a>
                    </section>


                    <!-- start content header -->
                    <section class="content-header mb-3">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title content-header-title-small">
                                در انتظار پرداخت
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->

                    <section class="order-wrapper">
                        <?php $__empty_1 = true; $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <section class="order-item">
                                <section class="d-flex justify-content-between">
                                    <section>
                                        <section class="order-item-date"><i class="fa fa-calendar-alt"></i>
                                            <?php echo e(jalaliDate($order->updated_at)); ?>

                                        </section>
                                        <section class="order-item-id"><i class="fa fa-id-card-alt"></i>
                                            کد سفارش : <?php echo e($order->id); ?>

                                        </section>
                                        <section class="order-item-status"><i class="fa fa-clock"></i>
                                            <?php echo e($order->paymentStatusValue); ?>

                                        </section>
                                        <section class="order-item-products">
                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orderItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e(route('customer.market.product', $orderItem->singleProduct)); ?>"><img
                                                        src="<?php echo e(asset($orderItem->singleProduct->image['indexArray']['small'])); ?>"
                                                        alt="<?php echo e(asset($orderItem->singleProduct->image['indexArray']['small'])); ?>"></a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </section>
                                    </section>
                                    <section class="order-item-link"><a href="#">پرداخت سفارش</a></section>
                                </section>
                            </section>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <section class="order-item">
                                <section class="d-flex justify-content-between">
                                    <p>سفارشی یافت نشد</p>
                                </section>
                            </section>
                        <?php endif; ?>
                    </section>
                </section>
            </main>
        </section>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/customer/user/orders.blade.php ENDPATH**/ ?>