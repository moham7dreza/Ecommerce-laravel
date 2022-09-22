<?php $__env->startSection('head-tag'); ?>
<title>دسته بندی</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">دسته بندی</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش دسته بندی</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد دسته بندی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.market.category.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="<?php echo e(route('admin.market.category.update', $productCategory->id)); ?>" method="post" enctype="multipart/form-data" id="form">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>
                    <section class="row">

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="">نام دسته</label>
                                <input type="text" name="name" value="<?php echo e(old('name', $productCategory->name)); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['name'];
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
                                <label for="">منو والد</label>
                                <select name="parent_id" id="" class="form-control form-control-sm">
                                    <option value="">منوی اصلی</option>
                                    <?php $__currentLoopData = $parent_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                    <option value="<?php echo e($parent_category->id); ?>"  <?php if(old('parent_id', $productCategory->parent_id) == $parent_category->id): ?> selected <?php endif; ?>><?php echo e($parent_category->name); ?></option>

                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </select>
                            </div>
                            <?php $__errorArgs = ['parent_id'];
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
                                <label for="">توضیحات</label>
                                <textarea name="description" id="description"  class="form-control form-control-sm" rows="6">
                                    <?php echo e(old('description', $productCategory->description)); ?>

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

                        <section class="row">
                            <?php
                                $number = 1;
                                ?>
                            <?php $__currentLoopData = $productCategory->image['indexArray']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <section class="col-md-<?php echo e(6 / $number); ?>">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" name="currentImage" value="<?php echo e($key); ?>" id="<?php echo e($number); ?>" <?php if($productCategory->image['currentImage'] == $key): ?> checked <?php endif; ?>>
                                    <label for="<?php echo e($number); ?>" class="form-check-label mx-2">
                                        <img src="<?php echo e(asset($value)); ?>" class="w-100" alt="">
                                    </label>
                                </div>
                            </section>
                            <?php
                            $number++;
                        ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </section>


                        <section class="col-12 col-md-6 my-2">
                            <div class="form-group">
                                <label for="status">وضعیت</label>
                                <select name="status" id="" class="form-control form-control-sm" id="status">
                                    <option value="0" <?php if(old('status', $productCategory->status) == 0): ?> selected <?php endif; ?>>غیرفعال</option>
                                    <option value="1" <?php if(old('status', $productCategory->status) == 1): ?> selected <?php endif; ?>>فعال</option>
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
                                <label for="show_in_menu">وضعیت نمایش در منو</label>
                                <select name="show_in_menu" id="" class="form-control form-control-sm" id="show_in_menu">
                                    <option value="0" <?php if(old('show_in_menu', $productCategory->status) == 0): ?> selected <?php endif; ?>>غیرفعال</option>
                                    <option value="1" <?php if(old('show_in_menu', $productCategory->status) == 1): ?> selected <?php endif; ?>>فعال</option>
                                </select>
                            </div>
                            <?php $__errorArgs = ['show_in_menu'];
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
                                <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                    value="<?php echo e(old('tags', $productCategory->tags)); ?>">
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
    <script>
        CKEDITOR.replace('description');
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


<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/admin/market/category/edit.blade.php ENDPATH**/ ?>