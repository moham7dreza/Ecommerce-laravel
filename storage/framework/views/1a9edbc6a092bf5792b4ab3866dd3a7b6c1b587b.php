<div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
    <div class="widget-header mb-30">
        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
    </div>
    <div class="post-block-list post-module-6">
        <?php $__currentLoopData = $latestComments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="<?php echo e($comment->getAuthorPath()); ?>"
                                                   data-toggle="tooltip" data-placement="top"
                                                   data-original-title="<?php echo e($comment->textAuthorName()); ?> - <?php echo e($comment->getAuthorPostsCount()); ?> پست">
                                                    <img src="<?php echo e($comment->authorImage()); ?>" alt="<?php echo e($comment->textAuthorName()); ?>">
                                                </a>
                                            </span>
                <div class="alith_post_title_small">
                    <p class="font-medium mb-10">
                        <a href="<?php echo e($comment->getCommentablePath()); ?>">
                            <?php echo e($comment->limitedBody()); ?>

                        </a>
                    </p>
                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by">توسط
                                                        <a href="<?php echo e($comment->getAuthorPath()); ?>"><?php echo e($comment->textAuthorName()); ?></a>
                                                    </span>
                        <span class="post-on"><?php echo e($comment->getDiffCreatedDate()); ?></span>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/partials/comments.blade.php ENDPATH**/ ?>