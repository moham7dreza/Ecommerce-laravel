<?php $__env->startSection('head-tag'); ?>
<title>کالاها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> کالاها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                 کالاها
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.product.create')); ?>" class="btn btn-info btn-sm">ایجاد کالای جدید </a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover h-150px">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام کالا</th>
                            <th> تصویر کالا</th>
                            <th> قیمت</th>
                            <th>وزن </th>
                            <th>دسته </th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($product->name); ?></td>
                            <td>
                                <img src="<?php echo e(asset($product->image['indexArray'][$product->image['currentImage']] )); ?>" alt="" width="100" height="50">
                            </td>
                            <td><?php echo e($product->price); ?> تومان</td>
                            <td><?php echo e($product->weight); ?> کیلو</td>
                            <td><?php echo e($product->category->name); ?></td>
                            <td class="width-8-rem text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i> عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="<?php echo e(route('admin.market.gallery.index', $product->id)); ?>" class="dropdown-item text-right"><i class="fa fa-images"></i> گالری</a>
                                           <a href="<?php echo e(route('admin.market.color.index', $product->id)); ?>" class="dropdown-item text-right"><i class="fa fa-images"></i> مدیریت رنگ ها</a>
                                           <a href="<?php echo e(route('admin.market.guarantee.index', $product->id)); ?>" class="dropdown-item text-right"><i class="fa fa-shield-alt"></i> گارانتی</a>
                                        <a href="<?php echo e(route('admin.market.product.edit', $product->id)); ?>" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline" action="<?php echo e(route('admin.market.product.destroy', $product->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('Delete'); ?>
                                            <button type="submit" class="dropdown-item text-right"><i class="fa fa-window-close"></i> حذف</button>
                                        </form>
                                    </div>
                                </div>
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\1 - laravel-shop-project\resources\views/admin/market/product/index.blade.php ENDPATH**/ ?>