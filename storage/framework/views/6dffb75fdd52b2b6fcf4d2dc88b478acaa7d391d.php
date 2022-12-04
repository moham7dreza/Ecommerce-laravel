<?php if(auth()->check()): ?>
<div class="comment-form" id="comment-form">
    <h3 class="mb-30">
        <?php echo e($isAnswer == 1 ? 'ارسال پاسخ' : 'ارسال نظر'); ?>

    </h3>
    <form class="form-contact comment_form" wire:submit.prevent="<?php echo e($isAnswer == 1 ? 'addAnswer' : 'addComment'); ?>"
          id="commentForm" method="POST">
        <?php echo csrf_field(); ?>


        <div class="row">
            <div class="col-12">
                <div class="form-group">

                    <span wire:dirty wire:target="body" class="mb-3">شما در حال نوشتن نظر برای پست <?php echo e($post->title); ?> هستین</span>
                    <textarea class="form-control w-100 <?php $__errorArgs = ['body'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <?php echo e($isAnswer == 1 ? 'alert-warning' :''); ?>" name="body"
                              id="body" cols="30" rows="9" placeholder="متن نظر و تایپ کن ..." wire:model.lazy="body"
                              wire:dirty.class="border-danger">
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
            <button type="submit" class="button button-contactForm" wire:dirty.class="d-none" wire:target="body">
                <?php echo e($isAnswer == 1 ? 'ارسال پاسخ' : 'ارسال نظر'); ?></button>
            <?php if($isAnswer == 1 ): ?>
                <button type="submit" class="button button-contactForm" wire:dirty.class="d-none"
                        wire:target="body" wire:click="canselAnswer">انصراف</button>
            <?php endif; ?>
            <div wire:loading wire:target="<?php echo e($isAnswer == 1 ? 'addAnswer' : 'addComment'); ?>">
                در حال ارسال نظر
            </div>
        </div>
    </form>
</div>
<?php else: ?>
    <p class="text-primary text-right">
        <a href="">لطفا جهت ثبت نظر وارد شوید</a>
    </p>
<?php endif; ?>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/post/partials/create-comment.blade.php ENDPATH**/ ?>