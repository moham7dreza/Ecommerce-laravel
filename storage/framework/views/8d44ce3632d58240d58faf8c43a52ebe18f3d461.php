<?php $__env->startSection('head-tag'); ?>
    <title>لیست نظرات</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="row m-1 pb-2 mb-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="page-header breadcrumb-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text">داشبورد</h3>
                                    <span class="lite-text">لیست نظرات</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">لیست تمامی نظرات</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>نظر</th>
                                    <th>وضعیت</th>
                                    <th>تایید</th>
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
                                        <td><?php echo $comment->limitedBody(); ?></td>
                                        <td>
                                            <span class="badge badge-<?php echo e($comment->cssStatus()); ?>">
                                                <?php echo e($comment->textStatus()); ?>

                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-<?php echo e($comment->cssApprove()); ?>">
                                                <?php echo e($comment->textApprove()); ?>

                                            </span>
                                        </td>
                                        <td><?php echo e($comment->getCommentableName()); ?></td>
                                        <td><?php echo e($comment->answersCount()); ?></td>
                                        <td><?php echo e($comment->textAuthorName()); ?></td>
                                        
                                        <td><?php echo e($comment->getFaCreatedDate()); ?></td>
                                        <td>
                                            <div class="row">
                                                <form
                                                    action="<?php echo e(route('panel.office.comment.change.status', $comment->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit"
                                                            class="btn btn-<?php echo e($comment->btnCssStatus()); ?> ml-1">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </form>

                                                <form
                                                    action="<?php echo e(route('panel.office.comment.change.approve', $comment->id)); ?>"
                                                    method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('PATCH'); ?>
                                                    <button type="submit"
                                                            class="btn btn-<?php echo e($comment->btnCssApprove()); ?> ml-1">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </form>

                                                <form action="<?php echo e(route('panel.office.comment.destroy', $comment->id)); ?>"
                                                      method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-dark ml-1 delete">
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
                            <?php echo e($comments->links()); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/office/comment/index.blade.php ENDPATH**/ ?>