<section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
    <a href="<?php echo e(route('admin.user.admin-user.create')); ?>" class="btn btn-info btn-sm">ایجاد ادمین جدید</a>
    <div class="max-width-16-rem">
        <input type="text" wire:model.debounce.900ms="search" class="form-control form-control-sm form-text" placeholder="جستجو">
    </div>
</section>
<section class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th>#</th>
            <th>ایمیل</th>
            <th>شماره موبایل</th>
            <th>نام</th>
            <th>نام خانوادگی</th>
            <th>فعال سازی</th>
            <th>وضعیت</th>
            <th>نقش</th>
            <th>دسترسی ها</th>
            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
        </tr>
        </thead>
        <tbody>

        <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>
                <th><?php echo e($key + 1); ?></th>
                <td><?php echo e($admin->email); ?></td>
                <td><?php echo e($admin->mobile); ?></td>
                <td><?php echo e($admin->first_name); ?></td>
                <td><?php echo e($admin->last_name); ?></td>
                <td>
                    <label>
                        <input id="<?php echo e($admin->id); ?>-active" onchange="changeActive(<?php echo e($admin->id); ?>)" data-url="<?php echo e(route('admin.user.admin-user.activation', $admin->id)); ?>" type="checkbox" <?php if($admin->activation === 1): ?>
                            checked
                            <?php endif; ?>>
                    </label>
                </td>
                <td>
                    <label>
                        <input id="<?php echo e($admin->id); ?>" onchange="changeStatus(<?php echo e($admin->id); ?>)" data-url="<?php echo e(route('admin.user.admin-user.status', $admin->id)); ?>" type="checkbox" <?php if($admin->status === 1): ?>
                            checked
                            <?php endif; ?>>
                    </label>
                </td>
                <td>
                    <?php if(empty($admin->roles()->get()->toArray())): ?>
                        <span class="text-danger">برای این کاربر هیچ نقشی تعریف نشده است</span>
                    <?php else: ?>
                        <?php $__currentLoopData = $admin->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($role->name); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </td>
                <td>
                    <?php if(count($admin->permissions()->get()->toArray()) == 0): ?>
                        <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                    <?php else: ?>
                        <?php $__currentLoopData = $admin->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($permission->name); ?> <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </td>
                <td class="width-8-rem text-left">
                    <div class="dropdown">
                        <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-tools"></i> عملیات
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a href="<?php echo e(route('admin.user.admin-user.role-form', $admin->id)); ?>" class="dropdown-item text-right"><i class="fa fa-edit"></i>نقش ها</a>
                            <a href="<?php echo e(route('admin.user.admin-user.edit', $admin->id)); ?>" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                            <form class="d-inline" action="<?php echo e(route('admin.user.admin-user.destroy', $admin->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo e(method_field('delete')); ?>

                                <button class="delete dropdown-item text-right" type="submit"><i class="fa fa-trash-alt"></i> حذف</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        </tbody>
    </table>
</section>
<?php /**PATH C:\CODEX\mars-shop\resources\views/livewire/admin/user/admin-user.blade.php ENDPATH**/ ?>