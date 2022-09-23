<?php $__env->startSection('head-tag'); ?>
<title>ایجاد عکس</title>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">اسمبل هوشمند</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">سیستم ها</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد عکس</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    ایجاد عکس برای <?php echo e($system->name); ?>

                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            </section>

            <section>
                <form action="<?php echo e(route('admin.smart-assemble.system.gallery.store', $system)); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <section class="row">


                        <section class="col-12">
                            <div class="form-group">
                                <label for="">تصویر </label>
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['image'];
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


                        </section>

                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>

                </form>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/admin/smart-assemble/system/gallery/create.blade.php ENDPATH**/ ?>