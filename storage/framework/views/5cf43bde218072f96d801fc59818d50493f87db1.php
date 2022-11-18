<?php $__env->startSection('head-tag'); ?>
    <title>تنظیمات</title>
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

                                        <td><?php echo e(jalaliDate($setting->updated_at)); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('panel.setting.edit', $setting->id)); ?>" class="btn btn-warning">
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

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/setting/index.blade.php ENDPATH**/ ?>