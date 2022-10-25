<?php $__env->startSection('head-tag'); ?>
    <title>تنظیمات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تنظیمات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="<?php echo e(route('admin.setting.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="<?php echo e(route('admin.setting.update', $setting->id)); ?>" method="post"
                          enctype="multipart/form-data" id="form">
                        <?php echo csrf_field(); ?>
                        <?php echo e(method_field('put')); ?>

                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">عنوان سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="name"
                                           value="<?php echo e(old('title', $setting->title)); ?>">
                                </div>
                                <?php $__errorArgs = ['title'];
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
                                <div class="form-group">
                                    <label for="name">توضیحات سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="description" id="name"
                                           value="<?php echo e(old('description', $setting->description)); ?>">
                                </div>
                                <?php $__errorArgs = ['description'];
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
                                <div class="form-group">
                                    <label for="name">کلمات کلیدی سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="keywords" id="name"
                                           value="<?php echo e(old('keywords', $setting->keywords)); ?>">
                                </div>
                                <?php $__errorArgs = ['keywords'];
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


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">لوگو</label>
                                    <input type="file" class="form-control form-control-sm" name="logo" id="image">
                                </div>
                                <?php $__errorArgs = ['logo'];
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


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                                </div>
                                <?php $__errorArgs = ['icon'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">شماره تماس</label>
                                    <input type="text" class="form-control form-control-sm" name="mobile" id="mobile"
                                           value="<?php echo e(old('mobile', json_decode($setting->mobile, true)['mobile'])); ?>">
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="office_telephone">شماره دفتر</label>
                                    <input type="text" class="form-control form-control-sm" name="office_telephone" id="office_telephone"
                                           value="<?php echo e(old('office_telephone', json_decode($setting->mobile, true)['office_telephone'])); ?>">
                                </div>
                                <?php $__errorArgs = ['office_telephone'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm" name="email" id="email"
                                           value="<?php echo e(old('email', json_decode($setting->email, true)['office_mail'])); ?>">
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">اینستاگرام</label>
                                    <input type="text" class="form-control form-control-sm" name="instagram"
                                           id="instagram"
                                           value="<?php echo e(old('instagram',json_decode($setting->social_media, true)['instagram'])); ?>">
                                </div>
                                <?php $__errorArgs = ['instagram'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="telegram">تلگرام</label>
                                    <input type="text" class="form-control form-control-sm" name="telegram"
                                           id="telegram"
                                           value="<?php echo e(old('telegram',json_decode($setting->social_media, true)['telegram'])); ?>">
                                </div>
                                <?php $__errorArgs = ['telegram'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp">واتس اپ</label>
                                    <input type="text" class="form-control form-control-sm" name="whatsapp"
                                           id="whatsapp"
                                           value="<?php echo e(old('whatsapp',json_decode($setting->social_media, true)['whatsapp'])); ?>">
                                </div>
                                <?php $__errorArgs = ['whatsapp'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube">یوتیوب</label>
                                    <input type="text" class="form-control form-control-sm" name="youtube" id="youtube"
                                           value="<?php echo e(old('youtube',json_decode($setting->social_media, true)['youtube'])); ?>">
                                </div>
                                <?php $__errorArgs = ['youtube'];
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
                                <div class="form-group">
                                    <label for="address">آدرس</label>
                                    <textarea name="address" id="address" class="form-control form-control-sm"
                                              rows="6"><?php echo e(old('address',json_decode($setting->address, true)['addresses']['central_office'])); ?></textarea>
                                </div>
                                <?php $__errorArgs = ['address'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="postal_code">کد پستی</label>
                                    <input type="text" class="form-control form-control-sm" name="postal_code"
                                           id="postal_code"
                                           value="<?php echo e(old('postal_code', json_decode($setting->address, true)['postal_code'])); ?>">
                                </div>
                                <?php $__errorArgs = ['postal_code'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">شماره حساب</label>
                                    <input type="text" class="form-control form-control-sm" name="account_number"
                                           id="account_number"
                                           value="<?php echo e(old('account_number',json_decode($setting->bank_account, true)['number'])); ?>">
                                </div>
                                <?php $__errorArgs = ['account_number'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="shaba_number">شماره شبا</label>
                                    <input type="text" class="form-control form-control-sm" name="shaba_number"
                                           id="shaba_number"
                                           value="<?php echo e(old('shaba_number',json_decode($setting->bank_account, true)['shaba'])); ?>">
                                </div>
                                <?php $__errorArgs = ['shaba_number'];
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

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_name">نام بانک</label>
                                    <input type="text" class="form-control form-control-sm" name="bank_name"
                                           id="bank_name"
                                           value="<?php echo e(old('bank_name',json_decode($setting->bank_account, true)['name'])); ?>">
                                </div>
                                <?php $__errorArgs = ['bank_name'];
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


                            <section class="col-12 my-3">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>

                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('admin-assets/ckeditor/ckeditor.js')); ?>"></script>

    <script>
        CKEDITOR.replace('address');
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/setting/edit.blade.php ENDPATH**/ ?>