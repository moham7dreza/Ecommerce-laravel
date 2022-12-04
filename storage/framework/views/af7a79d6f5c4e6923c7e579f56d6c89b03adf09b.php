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
} elseif ($_instance->childHasBeenRendered('DgLkWEL')) {
    $componentId = $_instance->getRenderedChildComponentId('DgLkWEL');
    $componentTag = $_instance->getRenderedChildComponentTagName('DgLkWEL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DgLkWEL');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.sidebar');
    $html = $response->html();
    $_instance->logRenderedChild('DgLkWEL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Header -->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.header')->html();
} elseif ($_instance->childHasBeenRendered('jmEh1Cl')) {
    $componentId = $_instance->getRenderedChildComponentId('jmEh1Cl');
    $componentTag = $_instance->getRenderedChildComponentTagName('jmEh1Cl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jmEh1Cl');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.header');
    $html = $response->html();
    $_instance->logRenderedChild('jmEh1Cl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    <!-- Main Wrap Start -->
    <?php echo e($slot); ?>


    <!-- Footer Start-->
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.layouts.footer')->html();
} elseif ($_instance->childHasBeenRendered('FqfBMw7')) {
    $componentId = $_instance->getRenderedChildComponentId('FqfBMw7');
    $componentTag = $_instance->getRenderedChildComponentTagName('FqfBMw7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FqfBMw7');
} else {
    $response = \Livewire\Livewire::mount('digital-world.layouts.footer');
    $html = $response->html();
    $_instance->logRenderedChild('FqfBMw7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
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