<?php $__env->startSection('head-tag'); ?>
    <title>داشبورد اصلی</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('permission-super-admin')): ?>

        <!-- Counters cards --->
        <section class="row">
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.user.customer.index')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-yellow text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->customersCount()); ?></h5>
                                    <p>تعداد مشتریان سیستم</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.content.post.index')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-green text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->postsCount()); ?></h5>
                                    <p>تعداد پست ها</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.market.comment.index')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-pink text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->commentsCount()); ?></h5>
                                    <p>تعداد نظرات</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.market.order.all')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-yellow text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->ordersCount()); ?></h5>
                                    <p>تعداد سفارشات</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.market.payment.index')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-danger text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->paymentsCount()); ?></h5>
                                    <p>تعداد پرداخت ها</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.market.discount.amazingSale')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-success text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->activeAmazingSalesCount()); ?></h5>
                                    <p>تعداد تخفیفات شگفت انگیز فعال</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.user.admin-user.index')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-warning text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->adminUsersCount()); ?></h5>
                                    <p>تعداد ادمین های سیستم</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="<?php echo e(route('admin.ticket.newTickets')); ?>" class="text-decoration-none d-block mb-4">
                    <section class="card bg-primary text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5><?php echo e($homeRepo->newTicketsCount()); ?></h5>
                                    <p>تعداد تیکت های جدید</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : <?php echo e(jalaliDate(now())); ?>

                        </section>
                    </section>
                </a>
            </section>

        </section>
        <hr>
        <!-- common discount alert --->
        <section class="row">
            <section class="col-12">
                <?php
                    $discount = $homeRepo->activeCommonDiscount();
                ?>
                <?php if(!is_null($discount)): ?>
                    <div class="alert alert-primary" role="alert">
                        یک تخفیف عمومی <strong><?php echo e($discount->percentage); ?></strong>درصدی با عنوان <strong><?php echo e($discount->title); ?></strong> تا تاریخ <strong><?php echo e(jalaliDate($discount->end_date)); ?></strong> فعال است. برای<a href="<?php echo e(route('admin.market.discount.commonDiscount.edit', $discount)); ?>" class="alert-link"> ویرایش </a>کلیک کن
                    </div>
                <?php else: ?>
                    <div class="alert alert-primary" role="alert">
                        هیچ تخفیف عمومی فعال نیست. برای افزودن <a href="<?php echo e(route('admin.market.discount.commonDiscount.create')); ?>" class="alert-link">تخفیف</a> کلیک کن
                    </div>
                <?php endif; ?>

            </section>
        </section>

        <!-- activity logs --->
        <section class="row">
            <section class="col-12">
                <section class="main-body-container">
                    <section class="main-body-container-header">
                        <h5>
                            بخش لاگ
                        </h5>
                        <p>
                            در این بخش اطلاعاتی در مورد عملیات CRUD به شما داده می شود
                        </p>
                    </section>
                    <section class="body-content">
                        <section class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>نام انجام دهنده</th>
                                    <th>اطلاعات کلی</th>
                                    <th>تاریخ ثبت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $homeRepo->logs(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $log): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <th><?php echo e($log->id); ?></th>
                                        <td><?php echo e($log->log_name); ?></td>
                                        <td><?php echo e($log->description()); ?></td>
                                        <td><?php echo e($log->causerName()); ?></td>
                                        <td dir="rtl">
                                            <?php if(empty($log->properties())): ?>
                                                <span class="text-danger">ویژگی ندارد</span>
                                            <?php else: ?>
                                                <?php $__currentLoopData = $log->properties(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e($key . ' => ' . $value); ?> <br>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($log->getFaUpdatedDate()); ?></td>
                                        <td class="width-22-rem text-left">
                                            <a href="<?php echo e($log->path()); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr><td>هیج عملیاتی صورت نگرفته است.</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                            <?php echo e($homeRepo->logs()->links()); ?>

                        </section>
                    </section>
                </section>
            </section>
        </section>
    <?php endif; ?>
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        بخش کاربران
                    </h5>
                    <p>
                        در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
                    </p>
                </section>
                <section class="body-content">
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                </section>
            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/index.blade.php ENDPATH**/ ?>