<?php $__env->startSection('head-tag'); ?>
    <title>منو</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> منو</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        منو
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="<?php echo e(route('admin.smart-assemble.menu.create')); ?>" class="btn btn-info btn-sm">ایجاد منوی
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام منو</th>
                            <th>خلاصه</th>
                            <th>منوی والد</th>

                            <th>عکس</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($loop->iteration); ?></th>
                                <td><?php echo e($menu->name); ?></td>
                                <td><?php echo e($menu->brief); ?></td>
                                <td><?php echo e($menu->parent_id ? $menu->parent->name : 'منوی اصلی'); ?></td>

                                <td>
                                    <img <?php if(!empty($menu->image)): ?> src="<?php echo e(asset($menu->image['indexArray'][$menu->image['currentImage']])); ?>" <?php else: ?> src="#" <?php endif; ?>
                                         alt="" width="100" height="50">
                                </td>
                                <td>
                                    <label>
                                        <input id="<?php echo e($menu->id); ?>" onchange="changeStatus(<?php echo e($menu->id); ?>)"
                                               data-url="<?php echo e(route('admin.smart-assemble.menu.status', $menu->id)); ?>"
                                               type="checkbox" <?php if($menu->status === 1): ?>
                                                   checked
                                            <?php endif; ?>>
                                    </label>
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="<?php echo e(route('admin.smart-assemble.menu.edit', $menu->id)); ?>"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>ویرایش</a>
                                    <form class="d-inline"
                                          action="<?php echo e(route('admin.smart-assemble.menu.destroy', $menu->id)); ?>"
                                          method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('delete')); ?>

                                        <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                class="fa fa-trash-alt"></i> حذف
                                        </button>
                                    </form>
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
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('منو  با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('منو  با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }
        }
    </script>


    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\mars-shop\resources\views/admin/smart-assemble/menu/index.blade.php ENDPATH**/ ?>