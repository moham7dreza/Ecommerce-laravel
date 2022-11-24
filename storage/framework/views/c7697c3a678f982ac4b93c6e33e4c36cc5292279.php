<?php $__env->startSection('head-tag'); ?>
    <title>ایجاد منو</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">منو</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ایجاد منو</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد منو
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="<?php echo e(route('admin.content.menu.index')); ?>" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="<?php echo e(route('admin.content.menu.store')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">جایگاه منو</label>
                                    <select name="location" id="location" class="form-control form-control-sm">
                                        <option value="">جایگاه منو را انتخاب کنید.</option>
                                        <?php $__currentLoopData = \App\Models\Content\Menu::$locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($location); ?>"
                                                    <?php if(old('menu_location') == $value): ?> selected <?php endif; ?>
                                                    data-url="<?php echo e(route('admin.content.menu.get-menus', $location)); ?>">
                                                <?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['location'];
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
                                    <label for="name">عنوان منو</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                           value="<?php echo e(old('name')); ?>">
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
                                    <label for="level">سطوح منو</label>
                                    <select name="level" id="level" class="form-control form-control-sm">
                                        <?php $__currentLoopData = \App\Models\Content\Menu::$levels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $level => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($level); ?>"
                                                    <?php if(old('level') == $level): ?> selected <?php endif; ?>><?php echo e($value); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['level'];
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
                                    <label for="parent_id">منو والد</label>
                                    <select name="parent_id" id="main-menus" class="form-control form-control-sm"
                                            disabled>
                                        <option value="" selected> منوی اصلی را انتخاب کنید.</option>
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

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="url">آدرس URL</label>
                                    <input type="text" name="url" value="<?php echo e(old('url')); ?>"
                                           class="form-control form-control-sm text-left">
                                </div>
                                <?php $__errorArgs = ['url'];
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
                                    <label for="sub_menu_id">زیر منو</label>
                                    <select name="sub_menu_id" class="form-control form-control-sm" id="sub-menus"
                                            disabled>
                                        <option value="" selected>زیر منو را انتخاب کنید</option>
                                    </select>
                                </div>
                                <?php $__errorArgs = ['sub_menu_id'];
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
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control form-control-sm" id="status">
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
    <script>
        $(document).ready(function () {
            $('#location').change(function () {
                var element = $('#location option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            let menus = response.menus;
                            $('#main-menus').empty();
                            menus.map((menu) => {
                                const menu_id = menu.id;

                                var data_url = "<?php echo e(route('admin.content.menu.get-sub-menus', 1)); ?>"
                                $('#main-menus').append($('<option/>').val(menu.id).text(menu.name)
                                    .attr('data-url', data_url)
                                )
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function () {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#main-menus').change(function () {
                var element = $('#main-menus option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                        if (response.status) {
                            let subMenus = response.subMenus;
                            console.log(subMenus);
                            $('#sub-menus').empty();
                            subMenus.map((subMenu) => {
                                $('#sub-menus').append($('<option/>').val(subMenu.id).text(subMenu
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function () {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })
    </script>

    <script>
        $("#level").change(function () {

            if ($('#level').find(':selected').val() == '2') {
                $('#main-menus').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '3') {
                $('#main-menus').removeAttr('disabled');
                $('#sub-menus').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '1') {
                $('#main-menus').attr('disabled', 'disabled');
                $('#sub-menus').attr('disabled', 'disabled');
            }
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/content/menu/create.blade.php ENDPATH**/ ?>