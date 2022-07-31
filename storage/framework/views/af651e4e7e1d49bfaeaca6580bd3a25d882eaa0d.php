<?php $__env->startSection('head-tag'); ?>
    <title>
        سیستم اسمبل هوشمند
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
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">PC Pick</h1>
                                <ol class="breadcrumb">
                                    <li>سیستم اسمبل هوشمند</li>
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    
                                    <li class="active">سیستم پیشنهادی</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <div class="section padding_layout_1 checkout_section text-right">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="full">
                        <div class="tab-info login-section">
                            <p>Returning customer? <a href="#login" class="" data-toggle="collapse">Click here to
                                    login</a></p>
                        </div>
                        <div id="login" class="collapse">
                            <div class="login-form-checkout">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                    you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="username">Username or email <span class="required">*</span></label>
                                                <input class="input-text" name="username" id="username" required=""
                                                       type="text">
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                <label for="password">Password <span class="required">*</span></label>
                                                <input class="input-text" name="password" id="password" required=""
                                                       type="password">
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 btn-login">
                                                <button class="bt_main">Login</button>
                                                <span class="remeber">
                    <input type="checkbox">
                    Remember me</span></div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                        <div class="tab-info coupon-section">
                            <p>Have a coupon? <a href="#cupon" class="" data-toggle="collapse">Click here to enter your
                                    code</a></p>
                        </div>
                        <div id="cupon" class="collapse">
                            <div class="coupen-form">
                                <form action="#">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-12">
                                                <input class="input-text" name="coupon" placeholder="Coupon code"
                                                       id="coupon" required="" type="text">
                                            </div>
                                            <div class="col-md-4 col-sm-4 col-xs-12">
                                                <button class="bt_main">Login</button>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <div class="product-table">
                        <table class="table">
                            <thead class="text-center">
                            <tr>
                                <th>کیس</th>
                            </tr>
                            <thead>
                            <tr>
                                <th>کیس</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($case_category->products[0]->image['indexArray']['small'])); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($case_category->products[0]->name); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($case_category->products[0]->status); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($case_category->products[0]->price)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>

                            </tbody>
                            <thead class="text-center">
                            <tr>
                                <th>قطعات اصلی</th>
                            </tr>
                            </thead>
                            <thead>
                            <tr>
                                <th>پردازنده</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($cpu_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($cpu_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($cpu_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($cpu_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>

                            <thead>
                            <tr>
                                <th>مادربرد</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($mb_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($mb_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($mb_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($mb_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>

                            <thead>
                            <tr>
                                <th>حافظه رم</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($ram_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($ram_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($ram_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($ram_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>

                            <thead>
                            <tr>
                                <th>منبع تغذیه</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($psu_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($psu_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($psu_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($psu_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                            <thead class="text-center">
                            <tr>
                                <th>تجهیزات ذخیره سازی و شبکه</th>
                            </tr>
                            <thead>
                            <thead>
                            <tr>
                                <th>هارد</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($hdd_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($hdd_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($hdd_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($hdd_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>

                            <thead>
                            <tr>
                                <th>حافظه جامد</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($ssd_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($ssd_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($ssd_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($ssd_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                            <thead class="text-center">
                            <tr>
                                <th>مولتی مدیا</th>
                            </tr>
                            <thead>
                            <thead>
                            <tr>
                                <th>کارت گرافیک</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($gpu_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($gpu_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($gpu_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($gpu_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                            <thead class="text-center">
                            <tr>
                                <th>مهندسی و طراحی</th>
                            </tr>
                            <thead>
                            <thead>
                            <tr>
                                <th>خنک کننده پردازنده</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($cooler_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($cooler_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($cooler_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($cooler_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                            <thead>
                            <tr>
                                <th>فن های جانبی کیس</th>
                                <th>تعداد</th>
                                <th class="text-center">قیمت</th>
                                <th class="text-center">مجموع</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="<?php echo e(asset($fan_category->products[0]->image['indexArray']['small']) ?? '#'); ?>" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#"><?php echo e($fan_category->products[0]->name ?? '-'); ?></a></h4>
                                            <span>Status: </span><span class="text-success"><?php echo e($fan_category->products[0]->status ?? 0); ?></span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="1" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($fan_category->products[0]->price) ?? priceFormat(0)); ?></p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="shopping-cart-cart">
                        <table>
                            <tbody>
                            <tr class="head-table">
                                <td><h5>Cart Totals</h5></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td><h4>Subtotal</h4></td>
                                <td class="text-right"><h4>$42.00</h4></td>
                            </tr>
                            <tr>
                                <td><h5>Estimated shipping</h5></td>
                                <td class="text-right"><h4>$6.00</h4></td>
                            </tr>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h4>$48.00</h4></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">انتخاب کیس</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                        <div class="col-md-12">
                            <div class="product-table">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>کیس</th>
                                        <th>تعداد</th>
                                        <th class="text-center">قیمت</th>
                                        <th class="text-center">مجموع</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="col-sm-8 col-md-6">
                                            <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                        class="media-object" src="<?php echo e(asset($case_category->products[0]->image['indexArray']['small'])); ?>" alt="#"></a>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><a href="#"><?php echo e($case_category->products[0]->name); ?></a></h4>
                                                    <span>Status: </span><span class="text-success"><?php echo e($case_category->products[0]->status); ?></span></div>
                                            </div>
                                        </td>
                                        <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                        value="1" type="email">
                                        </td>
                                        <td class="col-sm-1 col-md-1 text-center"><p class="price_table"><?php echo e(priceFormat($case_category->products[0]->price)); ?></p></td>
                                        <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                        <td class="col-sm-1 col-md-1">
                                            <button type="button" class="bt_main" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-edit"></i>تغییر</button>
                                        </td>
                                    </tr>

                                    </tbody>
                                    <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th class="text-center">Price</th>
                                        <th class="text-center">Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                </table>
                            </div>

                    </div>
                </div>




            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('smart-assemble.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\###amazon\resources\views/smart-assemble/index.blade.php ENDPATH**/ ?>