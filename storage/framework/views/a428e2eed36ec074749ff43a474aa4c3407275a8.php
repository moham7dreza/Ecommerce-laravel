<div class="row">
    <div class="col-xl-12">
        <div class="card-box">
            <h4 class="header-title mt-0 mb-3">آخرین پست ها</h4>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>عکس پست ها</th>
                        <th>عنوان پست ها</th>
                        <th>وضعیت</th>

                        <th>زمان خوندن</th>
                        <th>امتیاز</th>
                        <th>دسته بندی</th>
                        <th>نویسنده</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $dashboardRepo->getLatestPosts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-center">
                            <th scope="row"><?php echo e($loop->iteration); ?></th>
                            <td>
                                <img src="<?php echo e($post->imagePath()); ?>" width="80">
                            </td>
                            <td><?php echo e($post->title); ?></td>
                            <td>
                                    <span class="badge badge-<?php echo e($post->cssStatus()); ?>">
                                        <?php echo app('translator')->get($post->status); ?>
                                    </span>
                            </td>

                            <td><?php echo e($post->time_to_read); ?> دقیقه </td>
                            <td><?php echo e($post->rating); ?> امتیاز </td>
                            <td><?php echo e($post->category->name); ?></td>
                            <td><?php echo e($post->author->fullName); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/adminto/layouts/partials/latest-posts.blade.php ENDPATH**/ ?>