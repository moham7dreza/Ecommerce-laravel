<?php $__env->startSection('head-tag'); ?>
<title>نقش ها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    نقش ها
                </h5>
            </section>
            <section class="d-flex flex-column">
                <section class="d-flex justify-content-between align-items-center mt-2 mb-3 border-bottom pb-2">
                    <a href="<?php echo e(route('admin.user.role.create')); ?>" class="btn btn-info btn-sm">ایجاد نقش جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-2 mb-3 border-bottom pb-2">
                    <div class="mt-5">
                        <form class="d-flex justify-content-between align-items-center"
                              action="<?php echo e(route('admin.user.permissions.import')); ?>"
                              enctype="multipart/form-data" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label for="">سطوح دسترسی</label>
                                <input type="file" name="permissions" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm mr-3">بارگذاری</button>
                        </form>
                    </div>
                    <div class="mt-3">
                        <a href="<?php echo e(route('admin.user.permissions.export')); ?>" class="btn btn-primary btn-sm">خروجی فایل اکسل</a>
                    </div>
                </section>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام نقش	</th>
                            <th>دسترسی ها</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <th><?php echo e($key + 1); ?></th>
                            <td><?php echo e($role->name); ?></td>
                            <td>
                                <?php if(empty($role->permissions()->get()->toArray())): ?>
                                <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                                <?php else: ?>
                                <?php $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($permission->name); ?> <br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                </td>
                            <td class="width-22-rem text-left">
                                <a href="<?php echo e(route('admin.user.role.permission-form', $role->id)); ?>" class="btn btn-success btn-sm"><i class="fa fa-user-graduate"></i> دسترسی ها</a>
                                <a href="<?php echo e(route('admin.user.role.edit', $role->id)); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                <form class="d-inline" action="<?php echo e(route('admin.user.role.destroy', $role->id)); ?>" method="post">
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/user/role/index.blade.php ENDPATH**/ ?>