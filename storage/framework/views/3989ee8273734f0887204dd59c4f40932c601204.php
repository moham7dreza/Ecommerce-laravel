<?php $__env->startSection('head-tag'); ?>
    <title>لیست سرویس ها</title>
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
                                    <span class="lite-text">سرویس ها</span>
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
                            <a href="<?php echo e(route('panel.office.service.create')); ?>" class="btn main f-main btn-block fnt-xs" aria-expanded="false">
                                ایجاد سرویس جدید
                            </a>
                        </div>
                        <h5 class="mt-0 header-title">لیست تمامی سرویس ها</h5>

                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>عنوان سرویس</th>
                                    <th>توضیحات</th>
                                    <th>وضعیت</th>
                                    <th>در دسترس بودن</th>
                                    <th>سرویس والد</th>
                                    <th>قیمت</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td>
                                            <img src="<?php echo e($service->imagePath()); ?>" width="80" class="img-thumbnail" alt="">
                                        </td>
                                        <td><?php echo e($service->name); ?></td>
                                        <td><?php echo e($service->limitedDescription()); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($service->cssStatus()); ?>">
                                                <?php echo e($service->textStatus()); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php echo e($service->cssServiceAvailability()); ?>">
                                                <?php echo e($service->textServiceAvailability()); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($service->textParentName()); ?></td>
                                        <td><?php echo e($service->getFaPrice()); ?></td>
                                        <td><?php echo e($service->getFaCreatedDate()); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('panel.office.service.edit', $service->id)); ?>" class="btn outlined c-main o-main fnt-xxs ml-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('panel.office.service.change.status', $service->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('panel.office.service.destroy', $service->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger ml-1 delete">
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
                            <?php echo e($services->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/office/service/index.blade.php ENDPATH**/ ?>