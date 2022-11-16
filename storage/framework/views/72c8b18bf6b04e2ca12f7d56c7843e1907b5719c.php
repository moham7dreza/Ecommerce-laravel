<div class="row">
    <?php $__currentLoopData = $dashboardRepo->getLatestAuthorUsers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div>
                    <div class="avatar-lg float-left mr-3">
                        <img src="<?php echo e($author->image()); ?>" class="img-fluid rounded-circle" alt="<?php echo e($author->fullName); ?>">
                    </div>
                    <div class="wid-u-info">
                        <h5 class="mt-0"><?php echo e($author->fullName); ?></h5>
                        <p class="text-muted mb-1 font-13 text-truncate"><?php echo e($author->email); ?></p>
                        <small class="text-warning"><b><?php echo e($author->roles[0]->name ?? 'نقش تعریف نشده'); ?></b></small>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/adminto/layouts/partials/latest-authors.blade.php ENDPATH**/ ?>