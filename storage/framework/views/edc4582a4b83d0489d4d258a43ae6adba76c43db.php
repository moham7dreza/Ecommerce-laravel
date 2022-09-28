<?php $__env->startSection('head-tag'); ?>
    <title>تکمیل اطلاعات حساب کاربری</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>تکمیل اطلاعات حساب کاربری</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9">
                            <form id="profile_completion"
                                  action="<?php echo e(route('customer.sales-process.profile-completion-update')); ?>" method="post"
                                  class="content-wrapper bg-white p-3 rounded-2 mb-4">
                                <?php echo csrf_field(); ?>

                                <section class="payment-alert alert alert-primary d-flex align-items-center p-2"
                                         role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <section>
                                        اطلاعات حساب کاربری خود را (فقط یک بار، برای همیشه) وارد کنید. از این پس کالاها
                                        برای شخصی با این مشخصات ارسال می شود.
                                    </section>
                                </section>

                                <section class="row pb-3">

                                    <?php if(empty($user->first_name)): ?>
                                        <section class="col-12 col-md-6 my-2">
                                            <div class="form-group">
                                                <label for="first_name">نام</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="first_name" id="first_name"
                                                       value="<?php echo e(old('first_name')); ?>">
                                            </div>
                                            <?php $__errorArgs = ['first_name'];
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
                                        </section>
                                    <?php endif; ?>


                                    <?php if(empty($user->last_name)): ?>
                                        <section class="col-12 col-md-6 my-2">
                                            <div class="form-group">
                                                <label for="last_name">نام خانوادگی</label>
                                                <input type="text" class="form-control form-control-sm" name="last_name"
                                                       id="last_name" value="<?php echo e(old('last_name')); ?>">
                                            </div>
                                            <?php $__errorArgs = ['last_name'];
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
                                        </section>
                                    <?php endif; ?>


                                    <?php if(empty($user->mobile)): ?>
                                        <section class="col-12 col-md-6 my-2">
                                            <div class="form-group">
                                                <label for="mobile">موبایل</label>
                                                <input type="text" class="form-control form-control-sm" name="mobile"
                                                       id="mobile" value="<?php echo e(old('mobile')); ?>">
                                            </div>
                                            <?php $__errorArgs = ['mobile'];
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
                                        </section>
                                    <?php endif; ?>


                                    <?php if(empty($user->national_code)): ?>
                                        <section class="col-12 col-md-6 my-2">
                                            <div class="form-group">
                                                <label for="national_code">کد ملی</label>
                                                <input type="text" class="form-control form-control-sm"
                                                       name="national_code" id="national_code"
                                                       value="<?php echo e(old('national_code')); ?>">
                                            </div>
                                            <?php $__errorArgs = ['national_code'];
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
                                        </section>
                                    <?php endif; ?>

                                    <?php if(empty($user->email)): ?>
                                        <section class="col-12 col-md-6 my-2">
                                            <div class="form-group">
                                                <label for="email">ایمیل (اختیاری)</label>
                                                <input type="text" class="form-control form-control-sm" name="email"
                                                       id="email" value="<?php echo e(old('email')); ?>">
                                            </div>
                                            <?php $__errorArgs = ['email'];
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
                                        </section>
                                    <?php endif; ?>


                                </section>
                            </form>

                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <?php
                                    $totalProductPrice = 0;
                                    $totalDiscount = 0;
                                ?>

                                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $totalProductPrice += $cartItem->cartItemProductPrice() * $cartItem->number;
                                        $totalDiscount += $cartItem->cartItemProductDiscount() * $cartItem->number;
                                    ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها (<?php echo e($cartItems->count()); ?>)</p>
                                    <p class="text-muted"><span
                                            id="total_product_price"><?php echo e(priceFormat($totalProductPrice)); ?></span> تومان
                                    </p>
                                </section>

                                <?php if($totalDiscount != 0): ?>
                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالاها</p>
                                        <p class="text-danger fw-bolder"><span
                                                id="total_discount"><?php echo e(priceFormat($totalDiscount)); ?></span> تومان</p>
                                    </section>
                                <?php endif; ?>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"><span
                                            id="total_price"><?php echo e(priceFormat($totalProductPrice - $totalDiscount)); ?></span>
                                        تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای
                                    ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب
                                    کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت
                                    پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <button type="button"
                                            onclick="document.getElementById('profile_completion').submit();"
                                            class="btn btn-danger d-block w-100">تکمیل فرآیند خرید
                                    </button>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('customer.layouts.master-two-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/customer/sales-process/profile-completion.blade.php ENDPATH**/ ?>