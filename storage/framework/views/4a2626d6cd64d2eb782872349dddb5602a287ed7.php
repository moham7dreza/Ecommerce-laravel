<?php $__env->startSection('head-tag'); ?>
    <title>سطوح دسترسی</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> سطوح دسترسی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        سطوح دسترسی
                    </h5>
                </section>
                <section class="d-flex flex-column">
                    <section class="d-flex justify-content-between align-items-center mt-2 mb-3 border-bottom pb-2">
                        <a href="#" class="btn btn-info btn-sm disabled">ایجاد دسترسی جدید</a>
                        <div class="max-width-16-rem">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                        </div>
                    </section>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام دسترسی</th>
                            <th>توضیحات</th>
                            <th>وضعیت</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($key + 1); ?></th>
                                <td><?php echo e($permission->name); ?></td>
                                <td><?php echo e($permission->description); ?></td>
                                <td><?php echo e($permission->status); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/user/permission/index.blade.php ENDPATH**/ ?>