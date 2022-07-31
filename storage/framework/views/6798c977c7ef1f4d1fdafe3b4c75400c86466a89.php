<?php $__env->startSection('head-tag'); ?>
<title>برند</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">برند ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 برند ها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.brand.create')); ?>" class="btn btn-info btn-sm">ایجاد برند </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام فارسی برند</th>
                            <th>نام اصلی برند</th>
                            <th>لوگو</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($brand->persian_name); ?></td>
                            <td><?php echo e($brand->original_name); ?></td>
                            <td>
                                <img src="<?php echo e(asset($brand->logo['indexArray'][$brand->logo['currentImage']] )); ?>" alt="" width="100" height="50">
                            </td>
                            <td class="width-16-rem text-left">
                                <a href="<?php echo e(route('admin.market.brand.edit', $brand->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="<?php echo e(route('admin.market.brand.destroy', $brand->id)); ?>" method="post">
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/market/brand/index.blade.php ENDPATH**/ ?>