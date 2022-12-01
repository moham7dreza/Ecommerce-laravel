<?php if(auth()->check()): ?>
<div class="comment-form">
    <h3 class="mb-30">ارسال نظرات</h3>
    <form class="form-contact comment_form" wire:submit.prevent="addComment" id="commentForm" method="POST">
        <?php echo csrf_field(); ?>


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
                              id="body" cols="30" rows="9" placeholder="نظر" wire:model="body">
                        <?php echo e(old('body')); ?>

                    </textarea>
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
<?php else: ?>
    <p class="text-primary text-right">
        <a href="">لطفا جهت ثبت نظر وارد شوید</a>
    </p>
<?php endif; ?>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/post/partials/create-comment.blade.php ENDPATH**/ ?>