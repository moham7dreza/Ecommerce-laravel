<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <?php echo $__env->make('livewire.digital-world.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>


    <title><?php echo e($title); ?></title>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>

<div class="main-wrap">
    <!--Offcanvas sidebar-->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.sidebar')->html();
} elseif ($_instance->childHasBeenRendered('dOgooTw')) {
    $componentId = $_instance->getRenderedChildComponentId('dOgooTw');
    $componentTag = $_instance->getRenderedChildComponentTagName('dOgooTw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dOgooTw');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('dOgooTw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Header -->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.header')->html();
} elseif ($_instance->childHasBeenRendered('Mx5rt4T')) {
    $componentId = $_instance->getRenderedChildComponentId('Mx5rt4T');
    $componentTag = $_instance->getRenderedChildComponentTagName('Mx5rt4T');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Mx5rt4T');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.header');
    $html = $response->html();
    $_instance->logRenderedChild('Mx5rt4T', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Wrap Start -->
    <?php echo e($slot); ?>


    <!-- Footer Start-->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.footer')->html();
} elseif ($_instance->childHasBeenRendered('MrPh53K')) {
    $componentId = $_instance->getRenderedChildComponentId('MrPh53K');
    $componentTag = $_instance->getRenderedChildComponentTagName('MrPh53K');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('MrPh53K');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.footer');
    $html = $response->html();
    $_instance->logRenderedChild('MrPh53K', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</div>

<div class="dark-mark"></div>

<?php echo $__env->make('livewire.digital-world.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('script'); ?>

<?php echo \Livewire\Livewire::scripts(); ?>


<script>
    window.livewire.on('showAlert', function (message) {
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
</script>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/layouts/master.blade.php ENDPATH**/ ?>