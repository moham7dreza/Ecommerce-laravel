<?php $__env->startSection('head-tag'); ?>
    <title>مدیریت آدرس ها</title>
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
                                <span>تکمیل اطلاعات ارسال کالا (آدرس گیرنده، مشخصات گیرنده، نحوه ارسال) </span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">

                        <?php if($errors->any()): ?>
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>

                        <section class="col-md-9">
                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب آدرس و مشخصات گیرنده
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>

                                <section class="address-alert alert alert-primary d-flex align-items-center p-2"
                                    role="alert">
                                    <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                    <secrion>
                                        پس از ایجاد آدرس، آدرس را انتخاب کنید.
                                    </secrion>
                                </section>


                                <section class="address-select">

                                    <?php $__currentLoopData = auth()->user()->addresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <input type="radio" form="myForm" name="address_id" value="<?php echo e($address->id); ?>" id="a-<?php echo e($address->id); ?>" />
                                        <!--checked="checked"-->
                                            <label for="a-<?php echo e($address->id); ?>" class="address-wrapper mb-2 p-2">
                                                <section class="mb-2">
                                                    <i class="fa fa-map-marker-alt mx-1"></i>
                                                    آدرس : <?php echo e($address->address ?? '-'); ?>

                                                </section>
                                                <section class="mb-2">
                                                    <i class="fa fa-user-tag mx-1"></i>
                                                    گیرنده : <?php echo e($address->recipient_first_name ?? '-'); ?>

                                                    <?php echo e($address->recipient_last_name ?? '-'); ?>

                                                </section>
                                                <section class="mb-2">
                                                    <i class="fa fa-mobile-alt mx-1"></i>
                                                    موبایل گیرنده : <?php echo e($address->mobile ?? '-'); ?>

                                                </section>
                                                <a class="" data-bs-toggle="modal"
                                                data-bs-target="#edit-address-<?php echo e($address->id); ?>"><i class="fa fa-edit"></i> ویرایش آدرس</a>
                                                <span class="address-selected">کالاها به این آدرس ارسال می شوند</span>
                                            </label>


                                                 <!-- start edit address Modal -->
                                        <section class="modal fade" id="edit-address-<?php echo e($address->id); ?>" tabindex="-1"
                                        aria-labelledby="add-address-label" aria-hidden="true">
                                        <section class="modal-dialog">
                                            <section class="modal-content">
                                                <section class="modal-header">
                                                    <h5 class="modal-title" id="add-address-label"><i
                                                            class="fa fa-plus"></i> ویرایش آدرس </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </section>
                                                <section class="modal-body">
                                                    <form class="row" method="post"
                                                        action="<?php echo e(route('customer.sales-process.update-address', $address->id)); ?>">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('PUT'); ?>
                                                        <section class="col-6 mb-2">
                                                            <label for="province" class="form-label mb-1">استان</label>
                                                            <select name="province_id"
                                                                class="form-select form-select-sm" id="province-<?php echo e($address->id); ?>">
                                                                <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option <?php echo e($address->province_id == $province->id ? 'selected' : ''); ?> value="<?php echo e($province->id); ?>"
                                                                        data-url="<?php echo e(route('customer.sales-process.get-cities', $province->id)); ?>">
                                                                        <?php echo e($province->name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="city" class="form-label mb-1">شهر</label>
                                                            <select name="city_id" class="form-select form-select-sm"
                                                                id="city-<?php echo e($address->id); ?>">
                                                                <option selected>شهر را انتخاب کنید</option>
                                                            </select>
                                                        </section>
                                                        <section class="col-12 mb-2">
                                                            <label for="address" class="form-label mb-1">نشانی</label>
                                                            <textarea name="address" class="form-control form-control-sm" id="address" placeholder="نشانی"><?php echo e($address->address); ?></textarea>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="postal_code" class="form-label mb-1">کد
                                                                پستی</label>
                                                            <input value="<?php echo e($address->postal_code); ?>" type="text" name="postal_code"
                                                                class="form-control form-control-sm" id="postal_code"
                                                                placeholder="کد پستی">
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="no" class="form-label mb-1">پلاک</label>
                                                            <input type="text" value="<?php echo e($address->no); ?>" name="no"
                                                                class="form-control form-control-sm" id="no"
                                                                placeholder="پلاک">
                                                        </section>

                                                        <section class="col-3 mb-2">
                                                            <label for="unit" class="form-label mb-1">واحد</label>
                                                            <input type="text" value="<?php echo e($address->unit); ?>" name="unit"
                                                                class="form-control form-control-sm" id="unit"
                                                                placeholder="واحد">
                                                        </section>

                                                        <section class="border-bottom mt-2 mb-3"></section>

                                                        <section class="col-12 mb-2">
                                                            <section class="form-check">
                                                                <input <?php echo e($address->recipient_first_name ? 'checked' : ''); ?> class="form-check-input" name="receiver"
                                                                    type="checkbox" id="receiver">
                                                                <label class="form-check-label" for="receiver">
                                                                    گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                </label>
                                                            </section>
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="first_name" class="form-label mb-1">نام
                                                                گیرنده</label>
                                                            <input value="<?php echo e($address->recipient_first_name ?? $address->recipient_first_name); ?>" type="text" name="recipient_first_name"
                                                                class="form-control form-control-sm" id="first_name"
                                                                placeholder="نام گیرنده">
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="last_name" class="form-label mb-1">نام
                                                                خانوادگی گیرنده</label>
                                                            <input value="<?php echo e($address->recipient_last_name ?? $address->recipient_last_name); ?>" type="text" name="recipient_last_name"
                                                                class="form-control form-control-sm" id="last_name"
                                                                placeholder="نام خانوادگی گیرنده">
                                                        </section>

                                                        <section class="col-6 mb-2">
                                                            <label for="mobile" class="form-label mb-1">شماره
                                                                موبایل</label>
                                                            <input value="<?php echo e($address->mobile ?? $address->mobile); ?>" type="text" name="mobile"
                                                                class="form-control form-control-sm" id="mobile"
                                                                placeholder="شماره موبایل">
                                                        </section>


                                                </section>
                                                <section class="modal-footer py-1">
                                                    <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                        آدرس</button>
                                                    <button type="button" class="btn btn-sm btn-danger"
                                                        data-bs-dismiss="modal">بستن</button>
                                                </section>
                                            </form>

                                            </section>
                                        </section>
                                    </section>
                                    <!-- end add address Modal -->
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>





                                    <section class="address-add-wrapper">
                                        <button class="address-add-button" type="button" data-bs-toggle="modal"
                                            data-bs-target="#add-address"><i class="fa fa-plus"></i> ایجاد آدرس
                                            جدید</button>
                                        <!-- start add address Modal -->
                                        <section class="modal fade" id="add-address" tabindex="-1"
                                            aria-labelledby="add-address-label" aria-hidden="true">
                                            <section class="modal-dialog">
                                                <section class="modal-content">
                                                    <section class="modal-header">
                                                        <h5 class="modal-title" id="add-address-label"><i
                                                                class="fa fa-plus"></i> ایجاد آدرس جدید</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </section>
                                                    <section class="modal-body">
                                                        <form class="row" method="post"
                                                            action="<?php echo e(route('customer.sales-process.add-address')); ?>">
                                                            <?php echo csrf_field(); ?>
                                                            <section class="col-6 mb-2">
                                                                <label for="province" class="form-label mb-1">استان</label>
                                                                <select name="province_id"
                                                                    class="form-select form-select-sm" id="province">
                                                                    <option selected>استان را انتخاب کنید</option>
                                                                    <?php $__currentLoopData = $provinces; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $province): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($province->id); ?>"
                                                                            data-url="<?php echo e(route('customer.sales-process.get-cities', $province->id)); ?>">
                                                                            <?php echo e($province->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                </select>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="city" class="form-label mb-1">شهر</label>
                                                                <select name="city_id" class="form-select form-select-sm"
                                                                    id="city">
                                                                    <option selected>شهر را انتخاب کنید</option>
                                                                </select>
                                                            </section>
                                                            <section class="col-12 mb-2">
                                                                <label for="address" class="form-label mb-1">نشانی</label>
                                                                <textarea name="address" class="form-control form-control-sm" id="address" placeholder="نشانی"></textarea>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="postal_code" class="form-label mb-1">کد
                                                                    پستی</label>
                                                                <input type="text" name="postal_code"
                                                                    class="form-control form-control-sm" id="postal_code"
                                                                    placeholder="کد پستی">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="no" class="form-label mb-1">پلاک</label>
                                                                <input type="text" name="no"
                                                                    class="form-control form-control-sm" id="no"
                                                                    placeholder="پلاک">
                                                            </section>

                                                            <section class="col-3 mb-2">
                                                                <label for="unit" class="form-label mb-1">واحد</label>
                                                                <input type="text" name="unit"
                                                                    class="form-control form-control-sm" id="unit"
                                                                    placeholder="واحد">
                                                            </section>

                                                            <section class="border-bottom mt-2 mb-3"></section>

                                                            <section class="col-12 mb-2">
                                                                <section class="form-check">
                                                                    <input class="form-check-input" name="receiver"
                                                                        type="checkbox" id="receiver">
                                                                    <label class="form-check-label" for="receiver">
                                                                        گیرنده سفارش خودم نیستم (اطلاعات زیر تکمیل شود)
                                                                    </label>
                                                                </section>
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="first_name" class="form-label mb-1">نام
                                                                    گیرنده</label>
                                                                <input type="text" name="recipient_first_name"
                                                                    class="form-control form-control-sm" id="first_name"
                                                                    placeholder="نام گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="last_name" class="form-label mb-1">نام
                                                                    خانوادگی گیرنده</label>
                                                                <input type="text" name="recipient_last_name"
                                                                    class="form-control form-control-sm" id="last_name"
                                                                    placeholder="نام خانوادگی گیرنده">
                                                            </section>

                                                            <section class="col-6 mb-2">
                                                                <label for="mobile" class="form-label mb-1">شماره
                                                                    موبایل</label>
                                                                <input type="text" name="mobile"
                                                                    class="form-control form-control-sm" id="mobile"
                                                                    placeholder="شماره موبایل">
                                                            </section>


                                                    </section>
                                                    <section class="modal-footer py-1">
                                                        <button type="submit" class="btn btn-sm btn-primary">ثبت
                                                            آدرس</button>
                                                        <button type="button" class="btn btn-sm btn-danger"
                                                            data-bs-dismiss="modal">بستن</button>
                                                    </section>
                                                </form>

                                                </section>
                                            </section>
                                        </section>
                                        <!-- end add address Modal -->
                                    </section>

                                </section>
                            </section>


                            <section class="content-wrapper bg-white p-3 rounded-2 mb-4">

                                <!-- start vontent header -->
                                <section class="content-header mb-3">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title content-header-title-small">
                                            انتخاب نحوه ارسال
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>
                                <section class="delivery-select ">

                                    <section class="address-alert alert alert-primary d-flex align-items-center p-2"
                                        role="alert">
                                        <i class="fa fa-info-circle flex-shrink-0 me-2"></i>
                                        <secrion>
                                            نحوه ارسال کالا را انتخاب کنید. هنگام انتخاب لطفا مدت زمان ارسال را در نظر
                                            بگیرید.
                                        </secrion>
                                    </section>

                                    <?php $__currentLoopData = $deliveryMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deliveryMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <input type="radio" form="myForm" name="delivery_id" value="<?php echo e($deliveryMethod->id); ?>" id="d-<?php echo e($deliveryMethod->id); ?>" />
                                    <label for="d-<?php echo e($deliveryMethod->id); ?>" class="col-12 col-md-4 delivery-wrapper mb-2 pt-2">
                                        <section class="mb-2">
                                            <i class="fa fa-shipping-fast mx-1"></i>
                                            <?php echo e($deliveryMethod->name); ?>

                                        </section>
                                        <section class="mb-2">
                                            <i class="fa fa-calendar-alt mx-1"></i>
                                            تامین کالا از <?php echo e($deliveryMethod->delivery_time); ?> <?php echo e($deliveryMethod->delivery_time_unit); ?> کاری آینده
                                        </section>
                                    </label>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                                </section>
                            </section>




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
                                    کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت پرداخت
                                    این سفارش صورت میگیرد.
                                </p>

                                <form action="<?php echo e(route('customer.sales-process.choose-address-and-delivery')); ?>" method="post" id="myForm">
                                <?php echo csrf_field(); ?>
                                </form>


                                <section class="">
                                    <button type="button"
                                        onclick="document.getElementById('myForm').submit();"
                                        class="btn btn-danger d-block w-100">تکمیل فرآیند خرید</button>
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


<?php $__env->startSection('script'); ?>
    <script>
        $(document).ready(function() {
            $('#province').change(function() {
                var element = $('#province option:selected');
                var url = element.attr('data-url');

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        if (response.status) {
                            let cities = response.cities;
                            $('#city').empty();
                            cities.map((city) => {
                                $('#city').append($('<option/>').val(city.id).text(city
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function() {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })


            // edit
            var addresses = <?php echo auth()->user()->addresses; ?>

            // console.log(addresses);
            addresses.map(function(address) {
                var id = address.id;
                var target = `#province-${id}`;
                var selected = `${target} option:selected`
            $(target).change(function() {
                var element = $(selected);
                var url = element.attr('data-url');

                $.ajax({
                    url: url,
                    type: "GET",
                    success: function(response) {
                        if (response.status) {
                            let cities = response.cities;
                            $(`#city-${id}`).empty();
                            cities.map((city) => {
                                $(`#city-${id}`).append($('<option/>').val(city.id).text(city
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function() {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })

        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-two-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\1 - laravel-shop-project\resources\views/customer/sales-process/address-and-delivery.blade.php ENDPATH**/ ?>