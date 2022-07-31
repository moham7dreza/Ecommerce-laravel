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

    <div class="section padding_layout_1 Shopping_cart_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="shopping-cart-cart">
                        <table>
                            <tbody>
                            <tr class="head-table">
                                <td><h5>Cart Totals</h5></td>
                                <td class="text-right"></td>
                            </tr>
                            <tr>
                                <td><h4>Subtotal</h4></td>
                                <td class="text-right"><h4>$50.00</h4></td>
                            </tr>
                            <tr>
                                <td><h5>Estimated shipping</h5></td>
                                <td class="text-right"><h4>$5.00</h4></td>
                            </tr>
                            <tr>
                                <td><h3>Total</h3></td>
                                <td class="text-right"><h4>$55.00</h4></td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="button" class="button">Continue Shopping</button>
                                </td>
                                <td>
                                    <button class="button">Checkout</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="product-table">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Total</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="col-sm-8 col-md-6">
                                    <div class="media"><a class="thumbnail pull-left" href="#"> <img
                                                class="media-object" src="images/it_service/1.jpg" alt="#"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading"><a href="#">کیس</a></h4>
                                            <span>Status: </span><span class="text-success">In Stock</span></div>
                                    </div>
                                </td>
                                <td class="col-sm-1 col-md-1" style="text-align: center"><input class="form-control"
                                                                                                value="3" type="email">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1 text-center"><p class="price_table">$25.00</p></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button" class="bt_main" data-toggle="modal" data-target="#search_bar"><i class="fa fa-trash"></i> تغییر</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <table class="table">
                            <tbody>
                            <tr class="cart-form">
                                <td class="actions">
                                    <div class="coupon">
                                        <input name="coupon_code" class="input-text" id="coupon_code"
                                               placeholder="Coupon code" type="text">
                                        <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                    </div>
                                    <input class="button" name="update_cart" value="Update cart" disabled=""
                                           type="submit">
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="search_bar" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="fa fa-close"></i></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-8 col-md-8 col-sm-8 offset-lg-2 offset-md-2 offset-sm-2 col-xs-10 col-xs-offset-1">
                            <div class="navbar-search">
                                <form action="#" method="get" id="search-global-form" class="search-global">
                                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <img src="<?php echo e(asset($product->image['indexArray']['small'])); ?>" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title"><?php echo e($product->name); ?></h5>
                                                    <p class="card-text"><?php echo e($product->introduction); ?></p>
                                                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Model search bar -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('smart-assemble.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/smart-assemble/index.blade.php ENDPATH**/ ?>