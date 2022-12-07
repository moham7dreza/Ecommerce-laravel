<?php $__env->startSection('title', __('Forbidden')); ?>

<?php $__env->startSection('message', __($exception->getMessage() ?: 'Forbidden')); ?>

<?php echo $__env->make('errors::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/errors/403.blade.php ENDPATH**/ ?>