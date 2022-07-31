<?php $__env->startSection('head-tag'); ?>
<title>ایجاد رنگ</title>
<link rel="stylesheet" href="<?php echo e(asset('admin-assets/jalalidatepicker/persian-datepicker.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">بخش فروش</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">کالا </a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد رنگ</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                  ایجاد رنگ
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
            </section>

            <section>
                <form action="<?php echo e(route('admin.market.color.store', $product->id)); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <section class="row">



                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="color_name">نام رنگ</label>
                                <input type="text" name="color_name" value="<?php echo e(old('color_name')); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['color_name'];
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
                                <label for="color">رنگ</label>
                                <input type="color" name="color" value="<?php echo e(old('color')); ?>" class="form-control form-control-sm form-control-color">
                            </div>
                            <?php $__errorArgs = ['color'];
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
                                <label for="price_increase">افزایش قیمت</label>
                                <input type="text" name="price_increase" value="<?php echo e(old('price_increase')); ?>" class="form-control form-control-sm">
                            </div>
                            <?php $__errorArgs = ['price_increase'];
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
        CKEDITOR.replace('introduction');
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

<script>
    $(function(){
        $("#btn-copy").on('click', function(){
          var ele = $(this).parent().prev().clone(true);
          $(this).before(ele);
        })
      })
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\project-toplearn\resources\views/admin/market/product/color/create.blade.php ENDPATH**/ ?>