<?php $__env->startSection('head-tag'); ?>
    <title>
        پروفایل کاربری
    </title>
<?php $__env->stopSection(); ?>
<?php
    $user = auth()->user();
?>
<?php $__env->startSection('content'); ?>
    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

        <!-- start vontent header -->
        <section class="content-header mb-4">
            <section class="d-flex justify-content-between align-items-center">
                <h2 class="content-header-title">
                    <span>اطلاعات حساب</span>
                </h2>
                <section class="content-header-link">
                    <!--<a href="#">مشاهده همه</a>-->
                </section>
            </section>
        </section>
        <!-- end vontent header -->

        <section class="d-flex justify-content-end my-4">
            <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="#"><i class="fa fa-edit px-1"></i>ویرایش حساب</a>
        </section>


        <section class="row">
            <section class="col-6 border-bottom mb-2 py-2">
                <section class="field-title">نام</section>
                <section class="field-value overflow-auto"><?php echo e($user->first_name); ?></section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">نام خانوادگی</section>
                <section class="field-value overflow-auto"><?php echo e($user->last_name); ?></section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">شماره تلفن همراه</section>
                <section class="field-value overflow-auto"><?php echo e($user->mobile); ?></section>
            </section>

            <section class="col-6 border-bottom my-2 py-2">
                <section class="field-title">ایمیل</section>
                <section class="field-value overflow-auto"><?php echo e($user->email); ?></section>
            </section>

            <section class="col-6 my-2 py-2">
                <section class="field-title">کد ملی</section>
                <section class="field-value overflow-auto"><?php echo e($user->national_code); ?></section>
            </section>

            <section class="col-6 my-2 py-2">
                <section class="field-title">رمز عبور</section>
                <section class="field-value overflow-auto"> --- </section>
            </section>

        </section>




    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.main-two-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/customer/user/profile.blade.php ENDPATH**/ ?>