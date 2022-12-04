<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body class="container mx-auto px-4 flex items-center justify-center h-full bg-gradient-to-r from-red-500 to-indigo-600">
<section dir="rtl" class="">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.user.admin-user-table')->html();
} elseif ($_instance->childHasBeenRendered('d4AmjQB')) {
    $componentId = $_instance->getRenderedChildComponentId('d4AmjQB');
    $componentTag = $_instance->getRenderedChildComponentTagName('d4AmjQB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('d4AmjQB');
} else {
    $response = \Livewire\Livewire::mount('admin.user.admin-user-table');
    $html = $response->html();
    $_instance->logRenderedChild('d4AmjQB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</section>

<script src="<?php echo e(asset('js/app.js')); ?>"></script>
<?php echo \Livewire\Livewire::scripts(); ?>

</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/test.blade.php ENDPATH**/ ?>