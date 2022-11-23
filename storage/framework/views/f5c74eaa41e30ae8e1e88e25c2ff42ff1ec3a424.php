<?php $__env->startSection('head-tag'); ?>
    <title>لیست تبلیغات</title>
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
                            <a href="<?php echo e(route('panel.content.banner.create')); ?>" class="arrow-none btn btn-primary text-white"
                               aria-expanded="false">
                                ساخت تبلیغات جدید
                            </a>
                        </div>
                        <h4 class="mt-0 header-title">لیست تمامی تبلیغات</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس تبلیغات</th>
                                    <th>عنوان تبلیغات</th>
                                    <th>وضعیت</th>
                                    <th>مکان</th>
                                    <th>لینک</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td>
                                            <img src="<?php echo e($banner->imagePath()); ?>" width="80" class="img-thumbnail" alt="">
                                        </td>
                                        <td><?php echo e($banner->title); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($banner->cssStatus()); ?>">
                                                <?php echo e($banner->textStatus()); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">
                                                <?php echo e($banner->textPosition()); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($banner->url); ?>" target="_blank"><?php echo e($banner->url); ?></a>
                                        </td>

                                        <td><?php echo e($banner->getFaCreatedDate()); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('panel.content.banner.edit', $banner->id)); ?>"
                                                   class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('panel.content.banner.change.status', $banner->id)); ?>"
                                                      method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('panel.content.banner.destroy', $banner->id)); ?>"
                                                      method="POST">
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
                            <?php echo e($banners->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/content/banner/index.blade.php ENDPATH**/ ?>