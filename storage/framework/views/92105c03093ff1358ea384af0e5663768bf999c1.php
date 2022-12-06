<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Document</title>
    <style>
        [x-cloak] { display: none !important; }
    </style>


</head>
<body class="">
<section dir="rtl" class="">
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('admin.user.admin-user-table')->html();
} elseif ($_instance->childHasBeenRendered('DcHnI25')) {
    $componentId = $_instance->getRenderedChildComponentId('DcHnI25');
    $componentTag = $_instance->getRenderedChildComponentTagName('DcHnI25');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DcHnI25');
} else {
    $response = \Livewire\Livewire::mount('admin.user.admin-user-table');
    $html = $response->html();
    $_instance->logRenderedChild('DcHnI25', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
</section>


<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/test.blade.php ENDPATH**/ ?>