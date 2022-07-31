<?php $__env->startSection('head-tag'); ?>
<title>کانفیگ سیستم</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">سیستم پیشنهادی</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    سیستم پیشنهادی
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="<?php echo e(route('admin.smart-assemble.system.create')); ?>" class="btn btn-info btn-sm">افزودن سیستم پیشنهادی</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام سیستم</th>
                            <th>توضیحات</th>
                            <th>قیمت</th>
                            <th>نوع کاربری</th>
                            <th>تگ ها</th>
                            <th>محبوبیت</th>
                            <th>عکس</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $systems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $system): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($loop->iteration); ?></th>
                            <td><?php echo e($system->name); ?></td>
                            <td><?php echo e($system->description); ?></td>
                            <td><?php echo e(priceFormat($system->system_price)); ?></td>
                            <td><?php echo e($system->system_user_type); ?></td>
                            <td><?php echo e($system->tags); ?></td>
                            <td><?php echo e($system->system_rating); ?></td>
                            <td>
                                <img src="<?php echo e(asset($system->image['indexArray'][$system->image['currentImage']] )); ?>" alt="" width="100" height="50">
                            </td>

                            <td>
                                <label>
                                    <input id="<?php echo e($system->id); ?>" onchange="changeStatus(<?php echo e($system->id); ?>)" data-url="<?php echo e(route('admin.smart-assemble.system.status', $system->id)); ?>" type="checkbox" <?php if($system->status === 1): ?>
                                        checked
                                        <?php endif; ?>>
                                </label>
                            </td>

                            <td class="width-8-rem text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i> عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <?php if($system->system_price != 0): ?>
                                        <a href="<?php echo e(route('admin.smart-assemble.system.components.index', $system->id)); ?>" class="dropdown-item text-right"><i class="fa fa-shield-alt"></i>مشاهده کانفیگ فعلی</a>
                                            <a href="<?php echo e(route('admin.smart-assemble.system.components.edit', $system->id)); ?>" class="dropdown-item text-right"><i class="fa fa-shield-alt"></i>ویرایش کانفیگ فعلی</a>
                                        <?php else: ?>
                                        <a href="<?php echo e(route('admin.smart-assemble.system.components.create', $system->id)); ?>" class="dropdown-item text-right"><i class="fa fa-shield-alt"></i>افزودن کانفیگ جدید</a>
                                        <?php endif; ?>
                                        <a href="<?php echo e(route('admin.smart-assemble.system.edit', $system->id)); ?>" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline" action="<?php echo e(route('admin.smart-assemble.system.destroy', $system->id)); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('Delete'); ?>
                                            <button type="submit" class="dropdown-item text-right"><i class="fa fa-window-close"></i> حذف</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </section>

        </section>
    </section>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>

    <script type="text/javascript">
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>


    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\###amazon\resources\views/admin/smart-assemble/system/index.blade.php ENDPATH**/ ?>