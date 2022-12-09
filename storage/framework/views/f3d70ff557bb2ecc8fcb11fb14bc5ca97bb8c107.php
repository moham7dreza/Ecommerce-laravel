<?php $__env->startSection('head-tag'); ?>
    <title>جزئیات سفارش</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> جزئیات سفارش</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        جزئیات سفارش
                    </h5>
                </section>


                <section class="table-responsive">
                    <table class="table table-striped table-hover h-150px">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>درصد فروش فوق العاده</th>
                            <th>مبلغ فروش فوق العاده</th>
                            <th>تعداد</th>
                            <th>جمع قیمت محصول</th>
                            <th>مبلغ نهایی</th>
                            <th>رنگ</th>
                            <th>گارانتی</th>
                            <th>ویژگی</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($item->singleProduct->name ?? '-'); ?></td>
                                <td><?php echo e($item->amazingSale->percentage ?? '-'); ?></td>
                                <td><?php echo e($item->amazing_sale_discount_amount ?? '-'); ?> تومان</td>
                                <td><?php echo e($item->number); ?> </td>
                                <td><?php echo e($item->final_product_price ?? '-'); ?></td>
                                تومان</td>
                                <td><?php echo e($item->final_total_price ?? '-'); ?></td>
                                <td><?php echo e($item->color->color_name ?? '-'); ?></td>
                                <td><?php echo e($item->guarantee->name ?? '-'); ?></td>
                                <td>
                                    <?php $__empty_1 = true; $__currentLoopData = $item->orderItemAttributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attribute): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <?php echo e($attribute->categoryAttribute->name ?? '-'); ?>

                                        :
                                        <?php echo e($attribute->categoryAttributeValue->value ?? '-'); ?>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/market/order/detail.blade.php ENDPATH**/ ?>