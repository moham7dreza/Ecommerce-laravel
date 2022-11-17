<?php $__env->startSection('head-tag'); ?>
    <title>لیست پست ها</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="<?php echo e(route('adminto.post.create')); ?>" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت پست جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی پست ها</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس پست</th>
                                    <th>عنوان پست</th>
                                    <th>وضعیت</th>

                                    <th>زمان خوندن</th>
                                    <th>امتیاز</th>
                                    <th>دسته بندی</th>
                                    <th>کاربر</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td>
                                            <img src="<?php echo e($post->imagePath()); ?>" width="80">
                                        </td>
                                        <td><?php echo e($post->title); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($post->cssStatus()); ?>">
                                                <?php echo e($post->textStatus()); ?>

                                            </span>
                                        </td>

                                        <td><?php echo e($post->time_to_read); ?> دقیقه </td>
                                        <td><?php echo e($post->rating); ?> امتیاز </td>
                                        <td><?php echo e($post->category->name); ?></td>
                                        <td><?php echo e($post->author->fullName); ?></td>
                                        <td><?php echo e(jdate($post->created_at)->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="row">
                                                <a href="<?php echo e(route('adminto.post.edit', $post->id)); ?>" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="<?php echo e(route('adminto.post.change.status', $post->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="<?php echo e(route('adminto.post.destroy', $post->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <hr>
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/post/index.blade.php ENDPATH**/ ?>