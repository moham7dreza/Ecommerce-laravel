<div class="comment-form">
    <h3 class="mb-30">ارسال نظرات</h3>
    <form class="form-contact comment_form" action="<?php echo e(route('digital-world.post.add-comments', $post)); ?>" id="commentForm" method="POST">
        <?php echo csrf_field(); ?>
        <input type="hidden" name="commentable_id" value="<?php echo e($post->id); ?>">
        <input type="hidden" name="commentable_type" value="<?php echo e(get_class($post)); ?>">
        <div class="row">
            <div class="col-12">
                <div class="form-group">
                    <textarea class="form-control w-100 <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="body"
                              id="body" cols="30" rows="9" placeholder="نظر"><?php echo e(old('body')); ?></textarea>
                    <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <br>
                    <div class="alert alert-danger"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="button button-contactForm">ارسال نظر</button>
        </div>
    </form>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/post/partials/create-comments.blade.php ENDPATH**/ ?>