<div class="post-carausel-1-items mb-50">
    <?php $__currentLoopData = $homeRepo->vip_posts()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col">
            <div class="slider-single bg-white p-10 border-radius-15">
                <div class="img-hover-scale border-radius-10">
                    <a href="<?php echo e($post->path()); ?>">
                        <img class="border-radius-10 style-article-img-small" src="<?php echo e($post->imagePath()); ?>"
                             alt="<?php echo e($post->title); ?>">
                    </a>
                </div>
                <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                    <a href="<?php echo e($post->path()); ?>"><?php echo e($post->title); ?></a>
                </h6>
                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase pr-5 pb-15">
                    <span class="post-by">توسط <a href="<?php echo e($post->getAuthorPath()); ?>"><?php echo e($post->textAuthorName()); ?></a></span>
                    <span class="post-on"><?php echo e($post->getDiffCreatedDate()); ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/partials/vip-posts.blade.php ENDPATH**/ ?>