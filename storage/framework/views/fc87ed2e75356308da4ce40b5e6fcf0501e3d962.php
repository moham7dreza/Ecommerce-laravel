<?php if(!is_null($topBanner)): ?>
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="<?php echo e($topBanner->link); ?>" title="<?php echo e($topBanner->title); ?>">
                <img class="border-radius-10 d-inline" src="<?php echo e($topBanner->imagePath()); ?>"
                     alt="<?php echo e($topBanner->title); ?>">
            </a>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/partials/top-banner.blade.php ENDPATH**/ ?>