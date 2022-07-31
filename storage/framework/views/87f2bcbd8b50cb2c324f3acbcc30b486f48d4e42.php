<?php $__env->startSection('head-tag'); ?>
<title>کانفیگ سیستم</title>
<!--====== Google Font ======-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

<!--====== Vendor Css ======-->
<link rel="stylesheet" href="<?php echo e(asset('ludus-assets/css/vendor.css')); ?>">

<!--====== Utility-Spacing ======-->
<link rel="stylesheet" href="<?php echo e(asset('ludus-assets/css/utility.css')); ?>">

<!--====== App ======-->
<link rel="stylesheet" href="<?php echo e(asset('ludus-assets/css/app.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">سیستم پیشنهادی</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">کانفیگ سیستم</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    افزودن کانفیگ جدید برای <?php echo e($system->name); ?>

                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.smart-assemble.system.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="<?php echo e(route('admin.smart-assemble.system.components.store', $system->id)); ?>" method="post" enctype="multipart/form-data" id="form">
                    <?php echo csrf_field(); ?>
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="case">کیس</label>
                                <select name="case" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $case_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('case') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <?php $__errorArgs = ['case'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cpu">پردازنده</label>
                                <select name="cpu" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $cpu_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('cpu') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['cpu'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="motherboard">مادربرد</label>
                                <select name="motherboard" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $mb_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('motherboard') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['motherboard'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ram">حافظه رم</label>
                                <select name="ram" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $ram_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('ram') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['ram'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="psu">منبع تغذیه</label>
                                <select name="psu" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $psu_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('psu') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['psu'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hdd">هارد</label>
                                <select name="case" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $hdd_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('hdd') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['hdd'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ssd">حافظه جامد</label>
                                <select name="ssd" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $ssd_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('ssd') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['ssd'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="gpu">کارت گرافیک</label>
                                <select name="gpu" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $gpu_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('gpu') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['gpu'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cooler">خنک کننده پردازنده</label>
                                <select name="cooler" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $cooler_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('cooler') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['cooler'];
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

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="fan">فن های جانبی کیس</label>
                                <select name="fan" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $fan_category->products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($product->id); ?>"  <?php if(old('fan') == $product->id): ?> selected <?php endif; ?>><?php echo e($product->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['fan'];
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

                        <section class="col-12">
                            <button class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>
<!--====== Section Content ======-->
<div class="section__content text-align-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                <div class="table-responsive">
                    <table class="table-p">
                        <tbody>
                        <!--====== Row ======-->
                        <tr>
                            <td>
                                <div class="table-p__box">
                                    <div class="table-p__img-wrap">

                                        <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></div>
                                    <div class="table-p__info">

                                                            <span class="table-p__name">

                                                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>

                                        <span class="table-p__category">

                                                                <a href="shop-side-version-2.html">Electronics</a></span>
                                        <ul class="table-p__variant-list">
                                            <li>

                                                <span>Size: 22</span></li>
                                            <li>

                                                <span>Color: Red</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </td>
                            <td>

                                <span class="table-p__price">$125.00</span></td>
                            <td>
                                <div class="table-p__input-counter-wrap">

                                    <!--====== Input Counter ======-->
                                    <div class="input-counter">

                                        <span class="input-counter__minus fas fa-minus"></span>

                                        <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                        <span class="input-counter__plus fas fa-plus"></span></div>
                                    <!--====== End - Input Counter ======-->
                                </div>
                            </td>
                            <td>
                                <div class="table-p__del-wrap">

                                    <a class="far fa-trash-alt table-p__delete-link" href="#"></a></div>
                            </td>
                        </tr>
                        <!--====== End - Row ======-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Section Content ======-->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
    <script>
        window.ga = function() {
            ga.q.push(arguments)
        };
        ga.q = [];
        ga.l = +new Date;
        ga('create', 'UA-XXXXX-Y', 'auto');
        ga('send', 'pageview')
    </script>
    <script src="https://www.google-analytics.com/analytics.js" async defer></script>

    <!--====== Vendor Js ======-->
    <script src="<?php echo e(asset('ludus-assets/js/vendor.js')); ?>"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="<?php echo e(asset('ludus-assets/js/jquery.shopnav.js')); ?>"></script>

    <!--====== App ======-->
    <script src="<?php echo e(asset('ludus-assets/js/app.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/smart-assemble/system/components/create.blade.php ENDPATH**/ ?>