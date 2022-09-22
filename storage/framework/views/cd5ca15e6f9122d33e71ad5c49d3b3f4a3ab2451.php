<?php $__env->startSection('head-tag'); ?>
    <title>
        <?php echo e($system->name); ?>

    </title>
<?php $__env->stopSection(); ?>







<?php $__env->startSection('content'); ?>

    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span><?php echo e($system->name); ?></span>
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
                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1">
                                            <img src="<?php echo e(asset($system_items[0]->product->image['indexArray']['medium'])); ?>"
                                                 alt="">
                                        </section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold"><?php echo e($system_items[0]->product->name); ?></p>
                                            <p>
                                                <?php if(!empty($system_items[0]->color)): ?>
                                                    <span style="background-color: <?php echo e($cartItem->color->color); ?>;"
                                                          class="cart-product-selected-color me-1"></span>
                                                    <span> <?php echo e($system_items[0]->color->color_name); ?></span>
                                                <?php else: ?>
                                                    <span>رنگ منتخب وجود ندارد</span>
                                                <?php endif; ?>
                                            </p>
                                            <p>
                                                <?php if(!empty($system_items[0]->guarantee)): ?>
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> <?php echo e($system_items[0]->guarantee->name); ?></span>
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
                                                    <input class="number" name="number[<?php echo e($system_items[0]->id); ?>]"
                                                           type="number"
                                                           min="1" max="5" step="1" value="0"
                                                           readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                                <a class="text-decoration-none ms-4 cart-delete"
                                                   href="<?php echo e(route('customer.sales-process.remove-from-cart', $system_items[0])); ?>"><i
                                                        class="fa fa-trash-alt"></i> حذف از سبد</a>
                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            <p>
                                                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                                   تغییر
                                                </button>
                                            </p>
                                            <?php if(!empty($system_items[0]->product->activeAmazingSales())): ?>
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">
                                                    تخفیف <?php echo e(100); ?></section>
                                            <?php endif; ?>
                                            <section
                                                class="text-nowrap fw-bold">100
                                                تومان
                                            </section>
                                        </section>
                                    </section>
                                <section class="collapse" id="collapseExample">
                                <section class="cart-item d-md-flex py-3">
                                    <section class="cart-img align-self-start flex-shrink-1">
                                        <img src="<?php echo e(asset($system_items[0]->product->image['indexArray']['medium'])); ?>"
                                             alt="">
                                    </section>
                                    <section class="align-self-start w-100">
                                        <p class="fw-bold"><?php echo e($system_items[0]->product->name); ?></p>
                                        <p>
                                            <?php if(!empty($system_items[0]->color)): ?>
                                                <span style="background-color: <?php echo e($cartItem->color->color); ?>;"
                                                      class="cart-product-selected-color me-1"></span>
                                                <span> <?php echo e($system_items[0]->color->color_name); ?></span>
                                            <?php else: ?>
                                                <span>رنگ منتخب وجود ندارد</span>
                                            <?php endif; ?>
                                        </p>
                                        <p>
                                            <?php if(!empty($system_items[0]->guarantee)): ?>
                                                <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                <span> <?php echo e($system_items[0]->guarantee->name); ?></span>
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
                                                <input class="number" name="number[<?php echo e($system_items[0]->id); ?>]"
                                                       type="number"
                                                       min="1" max="5" step="1" value="0"
                                                       readonly="readonly">
                                                <button class="cart-number cart-number-up" type="button">+</button>
                                            </section>
                                            <a class="text-decoration-none ms-4 cart-delete"
                                               href="<?php echo e(route('customer.sales-process.remove-from-cart', $system_items[0])); ?>"><i
                                                    class="fa fa-trash-alt"></i> حذف از سبد</a>
                                        </section>
                                    </section>
                                    <section class="align-self-end flex-shrink-1">
                                        <?php if(!empty($system_items[0]->product->activeAmazingSales())): ?>
                                            <section class="cart-item-discount text-danger text-nowrap mb-1">
                                                تخفیف <?php echo e(100); ?></section>
                                        <?php endif; ?>
                                        <section
                                            class="text-nowrap fw-bold">100
                                            تومان
                                        </section>
                                    </section>
                                </section>
                                </section>
                            </form>

                        </section>

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت کالا</p>
                                    <p class="text-muted"><span id="product_price" data-product-original-price=<?php echo e(0); ?>><?php echo e(priceFormat(1)); ?></span> <span class="small">تومان</span></p>
                                </section>

                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder" id="product-discount-price" data-product-discount-price="<?php echo e(1); ?>"><?php echo e(0); ?> <span class="small">تومان</span></p>
                                    </section>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-end align-items-center">
                                    <p class="fw-bolder"><span  id="final-price"></span> <span class="small">تومان</span></p>
                                </section>

                                <section class="">
                                    <?php if($system->marketable_number > 0): ?>
                                        <button id="next-level" class="btn btn-danger d-block w-100" onclick="document.getElementById('add_to_cart').submit();">افزودن به سبد خرید</button>
                                    <?php else: ?>
                                        <button id="next-level" class="btn btn-secondary disabled d-block">محصول نا موجود میباشد</button>
                                    <?php endif; ?>
                                </section>
                                </form>

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
                        <!-- start content header -->
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

<?php echo $__env->make('customer.layouts.master-one-col', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\1 - laravel-shop-project\resources\views/smart-assemble/build.blade.php ENDPATH**/ ?>