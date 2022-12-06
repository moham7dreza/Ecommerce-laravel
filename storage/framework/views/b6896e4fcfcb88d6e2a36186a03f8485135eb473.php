<?php $__env->startSection('head-tag'); ?>
<title>نمایش پرداخت</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#"> خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> پرداخت</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمایش پرداخت</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                نمایش پرداخت
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.payment.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section class="card mb-3">
                <section class="card-header text-white bg-custom-yellow">
                    <?php echo e($payment->user->fullName); ?> - <?php echo e($payment->user->id); ?>

                </section>
                <section class="card-body">
                    <h5 class="card-title"> مبلغ : <?php echo e($payment->paymentable->amount); ?></h5>
                    <p class="card-text"> بانک : <?php echo e($payment->paymentable->gateway ?? '-'); ?></p>
                    <p class="card-text"> شماره پرداخت : <?php echo e($payment->paymentable->transaction_id ?? '-'); ?></p>
                    <p class="card-text"> تاریخ پرداخت : <?php echo e(jalaliDate($payment->paymentable->pay_date) ?? '-'); ?></p>
                    <p class="card-text">  دریافت کننده : <?php echo e($payment->paymentable->cash_receiver ?? '-'); ?></p>
                </section>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/market/payment/show.blade.php ENDPATH**/ ?>