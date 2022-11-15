<?php $__env->startSection('head-tag'); ?>
    <title>لیست تبلیغات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="<?php echo e(route('adminto.banner.create')); ?>" class="arrow-none btn btn-primary text-white" aria-expanded="false">
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
                                            <img src="<?php echo e($banner->imagePath()); ?>" width="80" class="img-thumbnail">
                                        </td>
                                        <td><?php echo e($banner->title); ?></td>
                                        <td>
                                            <span class="badge badge-info">
                                                <?php echo app('translator')->get($banner->position); ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?php echo e($banner->url); ?>" target="_blank"><?php echo e($banner->url); ?></a>
                                        </td>

                                        <td><?php echo e(jdate($banner->created_at)->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('adminto.banner.edit', $banner->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('adminto.banner.destroy', $banner->id)); ?>" method="POST">
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
                        <?php echo e($banners->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/banner/index.blade.php ENDPATH**/ ?>