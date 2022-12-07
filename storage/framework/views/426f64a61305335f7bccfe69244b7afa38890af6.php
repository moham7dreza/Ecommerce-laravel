<?php $__env->startSection('head-tag'); ?>
    <title>اطلاعیه ایمیلی</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">اطلاع رسانی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> اطلاعیه ایمیلی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        اطلاعیه ایمیلی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="<?php echo e(route('admin.notify.email.create')); ?>" class="btn btn-info btn-sm">ایجاد اطلاعیه
                        ایمیلی</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان اطلاعیه</th>
                            <th>متن ایمیل</th>
                            <th>تاریخ ارسال</th>
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $emails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $email): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                <th><?php echo e($key + 1); ?></th>
                                <td><?php echo e($email->subject); ?></td>
                                <td><?php echo \Illuminate\Support\Str::limit($email->body); ?></td>
                                <td><?php echo e(jalaliDate($email->published_at, 'H:i:s Y-m-d')); ?></td>
                                <td>
                                    <label>
                                        <input id="<?php echo e($email->id); ?>" onchange="changeStatus(<?php echo e($email->id); ?>)"
                                               data-url="<?php echo e(route('admin.notify.email.status', $email->id)); ?>"
                                               type="checkbox" <?php if($email->status === 1): ?>
                                                   checked
                                            <?php endif; ?>>
                                    </label>
                                </td>
                                <td class="width-8-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-tools"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="<?php echo e(route('admin.notify.email-file.index', $email->id)); ?>"
                                               class="dropdown-item text-right"><i class="fa fa-file"></i> فایل های ضمیمه
                                                شده</a>
                                            <a href="<?php echo e(route('admin.notify.email.edit', $email->id)); ?>"
                                               class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                            <form class="d-inline"
                                                  action="<?php echo e(route('admin.notify.email.destroy', $email->id)); ?>"
                                                  method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo e(method_field('delete')); ?>

                                                <button class="dropdown-item text-right delete" type="submit"><i
                                                        class="fa fa-trash-alt"></i> حذف
                                                </button>
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
                            successToast('ایمیل  با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('ایمیل  با موفقیت غیر فعال شد')
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

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/notify/email/index.blade.php ENDPATH**/ ?>