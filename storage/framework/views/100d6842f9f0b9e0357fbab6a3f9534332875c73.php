<?php $__env->startSection('head-tag'); ?>
    <title>لیست نظرات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">لیست تمامی نظرات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عنوان نظرات</th>
                                    <th>وضعیت</th>
                                    <th>برای</th>
                                    <th>تعداد پاسخ ها</th>
                                    <th>کاربر</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="text-center">
                                        <th scope="row"><?php echo e($loop->iteration); ?></th>
                                        <td><?php echo \Illuminate\Support\Str::limit($comment->body, 50); ?></td>
                                        <td>
                                            <span class="badge badge-dark">
                                                <?php echo app('translator')->get($comment->status); ?>
                                            </span>
                                        </td>
                                        <td><?php echo e($comment->commentable->title); ?></td>
                                        <td><?php echo e($comment->answers->count()); ?></td>
                                        <td><?php echo e($comment->user->fullName); ?></td>
                                        <td><?php echo e(jdate($comment->created_at)->format('Y-m-d')); ?></td>
                                        <td>
                                            <div class="row">
                                                <form action="<?php echo e(route('adminto.comment.change.status', $comment->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </form>

                                                <form action="<?php echo e(route('adminto.comment.destroy', $comment->id)); ?>" method="POST">
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
                        <?php echo e($comments->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminto.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/adminto/comment/index.blade.php ENDPATH**/ ?>