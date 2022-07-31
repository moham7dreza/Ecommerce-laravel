<?php $__env->startSection('head-tag'); ?>
<title>مقدار فرم کالا</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> مقدار فرم کالا</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    مقدار فرم کالا
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.value.create', $categoryAttribute->id)); ?>" class="btn btn-info btn-sm">ایجاد مقدار فرم کالا جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام فرم</th>
                            <th>نام محصول</th>
                            <th>مقدار</th>
                            <th>افزایش قیمت</th>
                            <th>نوع</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $categoryAttribute->values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($categoryAttribute->name); ?></td>
                            <td><?php echo e($value->product->name); ?></td>
                            <td><?php echo e(json_decode($value->value)->value); ?></td>
                            <td><?php echo e(json_decode($value->value)->price_increase); ?></td>
                            <td><?php echo e($value->type == 0 ? 'ساده' : 'انتخابی'); ?></td>
                            <td class="width-22-rem text-left">
                                <a href="<?php echo e(route('admin.market.value.edit', ['categoryAttribute' => $categoryAttribute->id , 'value' => $value->id] )); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="<?php echo e(route('admin.market.value.destroy', ['categoryAttribute' => $categoryAttribute->id , 'value' => $value->id] )); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo e(method_field('delete')); ?>

                                <button class="btn btn-danger btn-sm delete" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                            </form>
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


<?php $__env->startSection('script'); ?>

<?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/market/property/value/index.blade.php ENDPATH**/ ?>