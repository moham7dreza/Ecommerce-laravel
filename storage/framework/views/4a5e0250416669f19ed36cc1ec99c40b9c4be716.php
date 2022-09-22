<?php $__env->startSection('head-tag'); ?>
<title>افزودن سیستم پیشنهادی</title>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">افزودن سیستم پیشنهادی</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    افزودن سیستم پیشنهادی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.smart-assemble.system.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="<?php echo e(route('admin.smart-assemble.system.store')); ?>" method="post" enctype="multipart/form-data" id="form">
                    <?php echo csrf_field(); ?>
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="system_config_id">کانفیگ سیستم</label>
                                <select name="system_config_id" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $configs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $config): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($config->id); ?>"  <?php if(old('system_config_id') == $config->id): ?> selected <?php endif; ?>><?php echo e($config->name. ' - '.$config->ram_gen); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <?php $__errorArgs = ['system_config_id'];
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
                                <label for="system_gen_id">نسل سیستم</label>
                                <select name="system_gen_id" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $gens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gen): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($gen->id); ?>"  <?php if(old('system_gen_id') == $gen->id): ?> selected <?php endif; ?>><?php echo e($gen->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <?php $__errorArgs = ['system_gen_id'];
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
                                <label for="system_type_id">نوع سیستم</label>
                                <select name="system_type_id" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($type->id); ?>"  <?php if(old('system_type_id') == $type->id): ?> selected <?php endif; ?>><?php echo e($type->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <?php $__errorArgs = ['system_type_id'];
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
                                <label for="system_category_id">دسته بندی سیستم</label>
                                <select name="system_category_id" id="" class="form-control form-control-sm">
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"  <?php if(old('system_category_id') == $category->id): ?> selected <?php endif; ?>><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <?php $__errorArgs = ['system_category_id'];
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
                                <label for="system_user_type">نوع کاربری</label>
                                <input type="text" name="system_user_type" value="<?php echo e(old('system_user_type')); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['system_user_type'];
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
                                <label for="">تاریخ انتشار</label>
                                <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                                <input type="text" id="published_at_view" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['published_at'];
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
                                <label for="description">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">
                                    <?php echo e(old('description')); ?>

                                </textarea>
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

                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="image">تصویر</label>
                                <input type="file" class="form-control form-control-sm" name="image" id="image">
                            </div>
                            <?php $__errorArgs = ['image'];
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
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" <?php if(old('status') == 0): ?> selected <?php endif; ?>>غیرفعال</option>
                                    <option value="1" <?php if(old('status') == 1): ?> selected <?php endif; ?>>فعال</option>
                                </select>
                            </div>
                            <?php $__errorArgs = ['status'];
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
                                <label for="system_marketable">قابل فروش بودن</label>
                                <select name="system_marketable" class="form-control form-control-sm" id="marketable">
                                    <option value="0" <?php if(old('system_marketable') == 0): ?> selected <?php endif; ?>>غیرفعال</option>
                                    <option value="1" <?php if(old('system_marketable') == 1): ?> selected <?php endif; ?>>فعال</option>
                                </select>
                            </div>
                            <?php $__errorArgs = ['system_marketable'];
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
                                <label for="tags">تگ ها</label>
                                <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="<?php echo e(old('tags')); ?>">
                                <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                </select>
                            </div>
                            <?php $__errorArgs = ['tags'];
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

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset('admin-assets/ckeditor/ckeditor.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-assets/jalalidatepicker/persian-date.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.js')); ?>"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if(tags_input.val() !== null && tags_input.val().length > 0)
            {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder : 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function ( event ){
                if(select_tags.val() !== null && select_tags.val().length > 0){
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/admin/smart-assemble/system/create.blade.php ENDPATH**/ ?>