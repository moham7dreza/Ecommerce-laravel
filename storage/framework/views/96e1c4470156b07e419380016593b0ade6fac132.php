<div class="comments-area">
    <h3 class="mb-30"><?php echo e($post->commentsCount()); ?> نظرات</h3>
    <?php $__currentLoopData = $post->activeComments()->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="<?php echo e($comment->authorImage()); ?>" alt="user img">
                </div>
                <div class="desc">
                    <p class="comment">
                        <?php echo $comment->body; ?>

                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5>
                                <a href="<?php echo e($comment->getAuthorPath()); ?>"><?php echo e($comment->textAuthorName()); ?></a>
                            </h5>
                            <p class="date"> <?php echo e($comment->getFaCreatedDate()); ?></p>
                        </div>
                        <div class="reply-btn">
                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php $__currentLoopData = $comment->answers(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commentReply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="comment-list">
        <div class="single-comment justify-content-between d-flex">
            <div class="user justify-content-between d-flex">
                <div class="thumb">
                    <img src="<?php echo e($commentReply->authorImage()); ?>" alt="user img">
                </div>
                <div class="desc">
                    <p class="comment">
                        <?php echo $commentReply->body; ?>

                    </p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5>
                                <a href="<?php echo e($commentReply->getAuthorPath()); ?>"><?php echo e($commentReply->textAuthorName); ?></a>
                            </h5>
                            <p class="date"> <?php echo e($commentReply->getFaCreatedDate()); ?></p>
                        </div>
                        <div class="reply-btn">
                            <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/post/partials/comments.blade.php ENDPATH**/ ?>