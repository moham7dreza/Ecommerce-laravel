<?php $__env->startSection('head-tag'); ?>
<title> ویرایش روش ارسال</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">روش های ارسال</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش روش ارسال</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ویرایش روش ارسال
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.delivery.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="<?php echo e(route('admin.market.delivery.update', $delivery->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">نام روش ارسال</label>
                                <input type="text" name="name" value="<?php echo e(old('name', $delivery->name)); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    <?php echo e($message); ?>

                                </strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">هزینه روش ارسال</label>
                                <input type="text" name="amount"  value="<?php echo e(old('amount', $delivery->amount)); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['amount'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    <?php echo e($message); ?>

                                </strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </section>
                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">زمان ارسال</label>
                                <input type="text" name="delivery_time" value="<?php echo e(old('delivery_time', $delivery->delivery_time)); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['delivery_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    <?php echo e($message); ?>

                                </strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">واحد زمان ارسال</label>
                                <input type="text" name="delivery_time_unit" value="<?php echo e(old('delivery_time_unit', $delivery->delivery_time_unit)); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['delivery_time_unit'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    <?php echo e($message); ?>

                                </strong>
                            </span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </section>

                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\###amazon\resources\views/admin/market/delivery/edit.blade.php ENDPATH**/ ?>