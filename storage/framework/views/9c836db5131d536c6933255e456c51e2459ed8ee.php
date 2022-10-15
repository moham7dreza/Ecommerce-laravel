<?php $__env->startSection('head-tag'); ?>
    <title>
        ثبت قرار ملاقات
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-right">
                                <h1 class="page-title">ثبت قرار ملاقات</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="<?php echo e(route('it-city.home')); ?>">آیتی سیتی</a></li>
                                    <li><a href="<?php echo e(route('it-city.service.index')); ?>">سرویس ها</a></li>
                                    <li class="active">ثبت قرار ملاقات</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <div class="section padding_layout_1 rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="main_heading text_align_center">
                                    <h3>ثبت قرار ملاقات</h3>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 appointment_form">
                                <div class="form_section">
                                    <form class="form_section" action="index.html">
                                        <fieldset class="row">
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="نام*" type="text" required>
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="نام خانوادگی" type="text" required>
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="ایمیل" type="email" required>
                                            </div>
                                            <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="موبایل" type="text" required>
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <input class="field_custom" placeholder="عنوان ملاقات" type="text" required>
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="field_custom" placeholder="توضیحات" required></textarea>
                                            </div>
                                            <div class="center">
                                                <button class="btn main_bt">ثبت</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/pages/make-appointment.blade.php ENDPATH**/ ?>