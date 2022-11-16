<?php $__env->startSection('head-tag'); ?>
    <title>تنظیمات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <h4 class="mt-0 header-title">تنظیمات سایت</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>کلمات کلیدی</th>
                                    <th>لوگو</th>
                                    <th>آیکون</th>
                                    <th>تاریخ ویرایش</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>

                                    <tr class="text-center">
                                        <th scope="row">

                                            3
                                        </th>
                                        <td><?php echo e($setting->title); ?></td>
                                        <td><?php echo e($setting->description); ?></td>
                                        <td><?php echo e($setting->keywords); ?></td>
                                        <td>
                                            <img src="<?php echo e($setting->logo()); ?>" width="80">
                                        </td>
                                        <td>
                                            <img src="<?php echo e($setting->icon()); ?>" width="80">
                                        </td>

                                        <td><?php echo e(jdate($setting->updated_at)->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('adminto.setting.edit', $setting->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>

                                            </div>
                                        </td>
                                    </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/setting/index.blade.php ENDPATH**/ ?>