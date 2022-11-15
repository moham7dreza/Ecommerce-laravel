<div class="row">
    <?php $__currentLoopData = $dashboardRepo->getLatestAuthorUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div>
                    <div class="avatar-lg float-left mr-3">
                        <img src="/admin/images/users/user-3.jpg" class="img-fluid rounded-circle" alt="<?php echo e($author->name); ?>">
                    </div>
                    <div class="wid-u-info">
                        <h5 class="mt-0"><?php echo e($author->name); ?></h5>
                        <p class="text-muted mb-1 font-13 text-truncate"><?php echo e($author->email); ?></p>
                        <small class="text-warning"><b>نویسنده</b></small>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/adminto/layouts/partials/latest-authors.blade.php ENDPATH**/ ?>