<?php $__env->startSection('head-tag'); ?>
    <title>سبد خرید شما</title>
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
                                <span>سبد خرید شما</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>

                    <section class="row mt-4">
                        <section class="col-md-9 mb-3">
                            <form action="" id="cart_items" method="post"
                                  class="content-wrapper bg-white p-3 rounded-2">
                                <?php echo csrf_field(); ?>
                                <?php
                                    $totalProductPrice = 0;
                                    $totalDiscount = 0;
                                ?>

                                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $totalProductPrice += $cartItem->cartItemProductPrice();
                                        $totalDiscount += $cartItem->cartItemProductDiscount();
                                    ?>

                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1">
                                            <img src="<?php echo e(asset($cartItem->product->image['indexArray']['medium'])); ?>"
                                                 alt="">
                                        </section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold"><?php echo e($cartItem->product->name); ?></p>
                                            <p>
                                                <?php if(!empty($cartItem->color)): ?>
                                                    <span style="background-color: <?php echo e($cartItem->color->color); ?>;"
                                                          class="cart-product-selected-color me-1"></span>
                                                    <span> <?php echo e($cartItem->color->color_name); ?></span>
                                                <?php else: ?>
                                                    <span>رنگ منتخب وجود ندارد</span>
                                                <?php endif; ?>
                                            </p>
                                            <p>
                                                <?php if(!empty($cartItem->guarantee)): ?>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> <?php echo e($cartItem->guarantee->name); ?></span>
                                                <?php else: ?>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> گارانتی ندارد</span>
                                                <?php endif; ?>
                                            </p>
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                                            </p>
                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-
                                                    </button>
                                                    <input class="number" name="number[<?php echo e($cartItem->id); ?>]"
                                                           data-product-price=<?php echo e($cartItem->cartItemProductPrice()); ?> data-product-discount=<?php echo e($cartItem->cartItemProductDiscount()); ?>  type="number"
                                                           min="1" max="5" step="1" value="<?php echo e($cartItem->number); ?>"
                                                           readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                                <a class="text-decoration-none ms-4 cart-delete"
                                                   href="<?php echo e(route('customer.sales-process.remove-from-cart', $cartItem)); ?>"><i
                                                        class="fa fa-trash-alt"></i> حذف از سبد</a>
                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            <?php if(!empty($cartItem->product->activeAmazingSales())): ?>
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">
                                                    تخفیف <?php echo e(priceFormat($cartItem->cartItemProductDiscount())); ?></section>
                                            <?php endif; ?>
                                            <section
                                                class="text-nowrap fw-bold"><?php echo e(priceFormat($cartItem->cartItemProductPrice())); ?>

                                                تومان
                                            </section>
                                        </section>
                                    </section>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </form>

                        </section>
                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالاها (<?php echo e($cartItem->count()); ?>)</p>
                                    <p class="text-muted" id="total_product_price"><?php echo e(priceFormat($totalProductPrice)); ?>

                                        تومان</p>
                                </section>

                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">تخفیف کالاها</p>
                                    <p class="text-danger fw-bolder"
                                       id="total_discount"><?php echo e(priceFormat($totalDiscount)); ?> تومان</p>
                                </section>
                                <section class="border-bottom mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">جمع سبد خرید</p>
                                    <p class="fw-bolder"
                                       id="total_price"><?php echo e(priceFormat($totalProductPrice - $totalDiscount)); ?> تومان</p>
                                </section>

                                <p class="my-3">
                                    <i class="fa fa-info-circle me-1"></i>کاربر گرامی خرید شما هنوز نهایی نشده است. برای
                                    ثبت سفارش و تکمیل خرید باید ابتدا آدرس خود را انتخاب کنید و سپس نحوه ارسال را انتخاب
                                    کنید. نحوه ارسال انتخابی شما محاسبه و به این مبلغ اضافه شده خواهد شد. و در نهایت
                                    پرداخت این سفارش صورت میگیرد.
                                </p>


                                <section class="">
                                    <button onclick="document.getElementById('cart_items').submit();" class="btn btn-danger d-block">تکمیل فرآیند خرید</button>
                                </section>

                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->






    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start vontent header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">


                                <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $relatedProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="left"
                                                                                        title="افزودن به سبد خرید"><i
                                                            class="fa fa-cart-plus"></i></a></section>
                                                <?php if(auth()->guard()->guest()): ?>
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="<?php echo e(route('customer.market.add-to-favorite', $relatedProduct)); ?>"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                <?php endif; ?>
                                                <?php if(auth()->guard()->check()): ?>
                                                    <?php if($relatedProduct->user->contains(auth()->user()->id)): ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $relatedProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    <?php else: ?>
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="<?php echo e(route('customer.market.add-to-favorite', $relatedProduct)); ?>"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="<?php echo e(asset($relatedProduct->image['indexArray']['medium'])); ?>"
                                                             alt="">
                                                    </section>
                                                    <section class="product-name"><h3><?php echo e($relatedProduct->name); ?></h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section
                                                            class="product-price"><?php echo e(priceFormat($relatedProduct->price)); ?>

                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        <?php $__currentLoopData = $relatedProduct->colors()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <section class="product-colors-item"
                                                                     style="background-color: <?php echo e($color->color); ?>;"></section>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function () {
            bill();

            $('.cart-number').click(function () {
                bill();
            })
        })


        function bill() {
            var total_product_price = 0;
            var total_discount = 0;
            var total_price = 0;

            $('.number').each(function () {
                var productPrice = parseFloat($(this).data('product-price'));
                var productDiscount = parseFloat($(this).data('product-discount'));
                var number = parseFloat($(this).val());

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            })

            total_price = total_product_price - total_discount;

            $('#total_product_price').html(toFarsiNumber(total_product_price));
            $('#total_discount').html(toFarsiNumber(total_discount));
            $('#total_price').html(toFarsiNumber(total_price));


            function toFarsiNumber(number) {
                const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                // add comma
                number = new Intl.NumberFormat().format(number);
                //convert to persian
                return number.toString().replace(/\d/g, x => farsiDigits[x]);
            }

        }

    </script>


    <script>
        $('.product-add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('customer.layouts.master-two-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/customer/sales-process/cart.blade.php ENDPATH**/ ?>