<?php $__env->startSection('head-tag'); ?>
    <title>لیست ادمین های سیستم</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.user.admin-user-table')->html();
} elseif ($_instance->childHasBeenRendered('NEWffGZ')) {
    $componentId = $_instance->getRenderedChildComponentId('NEWffGZ');
    $componentTag = $_instance->getRenderedChildComponentTagName('NEWffGZ');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('NEWffGZ');
} else {
    $response = \Livewire\Livewire::mount('admin.user.admin-user-table');
    $html = $response->html();
    $_instance->logRenderedChild('NEWffGZ', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo \Livewire\Livewire::scripts(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/admin/index.blade.php ENDPATH**/ ?>