<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <?php echo $__env->make('livewire.digital-world.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent('head-tag'); ?>


    <title>دنیای دیجیتالی</title>
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>

<div class="main-wrap">
    <!--Offcanvas sidebar-->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.sidebar')->html();
} elseif ($_instance->childHasBeenRendered('9rRXEPA')) {
    $componentId = $_instance->getRenderedChildComponentId('9rRXEPA');
    $componentTag = $_instance->getRenderedChildComponentTagName('9rRXEPA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('9rRXEPA');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('9rRXEPA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Header -->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.header')->html();
} elseif ($_instance->childHasBeenRendered('94p3CHd')) {
    $componentId = $_instance->getRenderedChildComponentId('94p3CHd');
    $componentTag = $_instance->getRenderedChildComponentTagName('94p3CHd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('94p3CHd');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.header');
    $html = $response->html();
    $_instance->logRenderedChild('94p3CHd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Wrap Start -->
    <?php echo e($slot); ?>


    <!-- Footer Start-->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.footer')->html();
} elseif ($_instance->childHasBeenRendered('uF7mILa')) {
    $componentId = $_instance->getRenderedChildComponentId('uF7mILa');
    $componentTag = $_instance->getRenderedChildComponentTagName('uF7mILa');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('uF7mILa');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.footer');
    $html = $response->html();
    $_instance->logRenderedChild('uF7mILa', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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
<?php /**PATH C:\CODEX\techzilla\resources\views/layouts/master.blade.php ENDPATH**/ ?>