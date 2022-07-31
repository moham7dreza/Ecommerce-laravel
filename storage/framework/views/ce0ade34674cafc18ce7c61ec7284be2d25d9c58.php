<?php $__env->startSection('head-tag'); ?>
<title>پرداخت ها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">پرداخت ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 پرداخت ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="#" class="btn btn-info btn-sm disabled">پرداخت جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>کد تراکنش</th>
                            <th>بانک </th>
                            <th>پرداخت کننده</th>
                            <th>وضعیت پرداخت</th>
                            <th>نوع پرداخت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($payment->paymentable->transaction_id ?? '-'); ?></td>
                            <td><?php echo e($payment->paymentable->gateway ?? '-'); ?></td>
                            <td><?php echo e($payment->user->fullname); ?></td>
                            <td><?php if($payment->status == 0): ?> پرداخت نشده  <?php elseif($payment->status == 1): ?> پرداخت شده <?php elseif($payment->status == 2): ?> باطل شده <?php else: ?> برگشت داده شده <?php endif; ?></td>
                            <td> <?php if($payment->type == 0): ?> آنلاین  <?php elseif($payment->type == 1): ?> آفلاین <?php else: ?> در محل <?php endif; ?>  </td>
                            <td class="width-22-rem text-left">
                                <a href="<?php echo e(route('admin.market.payment.show', $payment->id)); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> مشاهده</a>
                                <a href="<?php echo e(route('admin.market.payment.canceled', $payment->id)); ?>" class="btn btn-warning btn-sm"><i class="fa fa-close"></i> باطل کردن</a>
                                <a href="<?php echo e(route('admin.market.payment.returned', $payment->id)); ?>" class="btn btn-danger btn-sm"><i class="fa fa-reply"></i> برگرداندن</a>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/market/payment/index.blade.php ENDPATH**/ ?>