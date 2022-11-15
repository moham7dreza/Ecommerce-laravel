<?php $__env->startSection('head-tag'); ?>
    <title>لیست منوها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="<?php echo e(route('adminto.menu.create')); ?>" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت منوی جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی منوها</h4>

                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عنوان منو</th>
                                    <th>وضعیت</th>
                                    <th>زیر منو</th>

                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td><?php echo e($menu->name); ?></td>
                                        <td>
                                            <span class="badge badge-primary">
                                                <?php echo app('translator')->get($menu->status); ?>
                                            </span>
                                        </td>
                                        <td><?php echo e($menu->getParent()); ?></td>

                                        <td><?php echo e(jdate($menu->created_at)->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('adminto.menu.edit', $menu->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('adminto.menu.change.status', $menu->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('adminto.menu.destroy', $menu->id)); ?>" method="POST">
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
                        <?php echo e($menus->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/menu/index.blade.php ENDPATH**/ ?>