<?php $__env->startSection('head-tag'); ?>
    <title>لیست کاربران</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="<?php echo e(route('adminto.user.create')); ?>" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت کاربر جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی کاربران</h4>
                    <?php if(session()->has('success_delete')): ?>
                        <br>
                        <div class="alert alert-success"><?php echo e(session()->get('success_delete')); ?></div>
                    <?php endif; ?>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>مقام ها</th>
                                    <th>وضعیت تایید ایمیل</th>
                                    <th>تاریخ عضویت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td><?php echo e($user->fullName); ?></td>
                                        <td><?php echo e($user->email); ?></td>
                                        <td>
                                            <ul style="list-style: none;">
                                                <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <li>
                                                        <?php echo e($role->name); ?>

                                                        <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-role-<?php echo e($role->id); ?>').submit()">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </a>
                                                    </li>
                                                    <form method="POST" id="delete-role-<?php echo e($role->id); ?>"
                                                    action="<?php echo e(route('adminto.user.role-remove', ['userId' => $user->id, 'roleId' => $role->id])); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                    </form>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </td>
                                        <td>

                                            <span class="badge badge-<?php echo e($user->cssStatusEmailVerifiedAt()); ?>">
                                                <?php echo e($user->textStatusEmailVerifiedAt()); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e(jalaliDate($user->created_at)); ?></td>
                                        <td>
                                            <div class="row">


                                                <a href="<?php echo e(route('adminto.user.edit', $user->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="<?php echo e(route('adminto.user.add-roles', $user->id)); ?>" class="btn btn-success ml-1">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <form action="<?php echo e(route('adminto.user.destroy', $user->id)); ?>" method="POST">
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
                        <?php echo e($users->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/user/index.blade.php ENDPATH**/ ?>