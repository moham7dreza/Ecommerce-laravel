<?php $__env->startSection('head-tag'); ?>
    <title>لیست قطعات سخت افزاری</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="row m-1 pb-2 mb-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="page-header breadcrumb-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text">داشبورد</h3>
                                    <span class="lite-text">دسته بندی قطعات سخت افزاری</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="float-left cart-title">
                        <a href="<?php echo e(route('panel.hardware.create')); ?>" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت سخت‌افزار جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی قطعات سخت افزاری</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>قیمت</th>
                                    <th>دسته بندی</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $hardwares; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hardware): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td>
                                            <img src="<?php echo e($hardware->imagePath()); ?>" width="80">
                                        </td>
                                        <td><?php echo e($hardware->limitedName()); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($hardware->cssStatus()); ?>">
                                                <?php echo e($hardware->textStatus()); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($hardware->getFaPrice()); ?></td>
                                        <td><?php echo e($hardware->textCategoryName()); ?></td>
                                        <td><?php echo e($hardware->getFaCreatedDate()); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('panel.hardware.edit', $hardware->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('panel.hardware.change.status', $hardware->id)); ?>" method="hardware">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('panel.hardware.destroy', $hardware->id)); ?>" method="hardware">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>
                        <?php echo e($hardwares->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/hardware/index.blade.php ENDPATH**/ ?>