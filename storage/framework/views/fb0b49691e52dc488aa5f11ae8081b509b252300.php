<?php if(!is_null($bottomBanner)): ?>
    <div class="sidebar-widget widget-ads mb-30 text-center">
        <a href="<?php echo e($bottomBanner->link); ?>" title="<?php echo e($bottomBanner->title); ?>">
            <img class="border-radius-10" src="<?php echo e($bottomBanner->imagePath()); ?>" alt="<?php echo e($bottomBanner->title); ?>">
        </a>
    </div>
<?php endif; ?>

<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/partials/bottom-banner.blade.php ENDPATH**/ ?>