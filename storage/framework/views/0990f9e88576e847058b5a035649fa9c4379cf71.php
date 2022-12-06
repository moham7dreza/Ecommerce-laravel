<?php $__env->startSection('head-tag'); ?>
<title>دسترسی های نقش</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش کاربران</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">ادمین</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">نقش ها</li>
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

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3  pb-2">
                <a href="<?php echo e(route('admin.user.admin-user.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="<?php echo e(route('admin.user.admin-user.role-update', $user->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <section class="row">

                        <section class="col-12">
                            <section class="row border-top mt-3 py-3">

                                <section class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="">نام ادمین</label>
                                        <section><?php echo e($user->fullName); ?></section>
                                    </div>
                                </section>
                                <section class="col-12 col-md-5">
                                    <div class="form-group">
                                        <label for="">آیا ادمین در سامانه اکتیو کرده است؟</label>
                                        <section><?php echo e($user->activation ? 'فعال است': 'فعال نیست'); ?></section>
                                    </div>
                                </section>
                                <?php
                                    $userRolesArray = $user->roles->pluck('id')->toArray();
                                ?>
                                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                <section class="col-md-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" name="roles[]" value="<?php echo e($role->id); ?>" id="<?php echo e($role->id); ?>" <?php if(in_array($role->id, $userRolesArray)): ?> checked <?php endif; ?>/>
                                        <label for="<?php echo e($role->id); ?>" class="form-check-label mr-3 mt-1"><?php echo e($role->name); ?></label>
                                    </div>
                                    <div class="mt-2">
                                        <?php $__errorArgs = ['roles.' . $key];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                            <strong>
                                                <?php echo e($message); ?>

                                            </strong>
                                        </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                </section>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                <section class="col-12 col-md-2">
                                    <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                                </section>

                            </section>
                        </section>

                    </section>
                </form>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/user/admin-user/set-role.blade.php ENDPATH**/ ?>