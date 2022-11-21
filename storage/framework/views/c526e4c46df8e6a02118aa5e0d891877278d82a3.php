<?php $__env->startSection('head-tag'); ?>
    <title>
        آیتی سیتی
    </title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('it-city.layouts.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('it-city.layouts.partials.system-categories', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('it-city.layouts.partials.hardware', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('it-city.layouts.partials.system', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('it-city.layouts.partials.post', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if (isset($component)) { $__componentOriginalfda11a45add480a82c068aa7b131435ab1fe3306 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Personnel::class, ['personnel' => $homeRepo->personnel()]); ?>
<?php $component->withName('personnel'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalfda11a45add480a82c068aa7b131435ab1fe3306)): ?>
<?php $component = $__componentOriginalfda11a45add480a82c068aa7b131435ab1fe3306; ?>
<?php unset($__componentOriginalfda11a45add480a82c068aa7b131435ab1fe3306); ?>
<?php endif; ?>

    <?php echo $__env->make('it-city.layouts.partials.brand', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('it-city.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/it-city/home.blade.php ENDPATH**/ ?>