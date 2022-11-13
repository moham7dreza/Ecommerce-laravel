<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <?php echo $__env->make('adminto.layouts.head-tag', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->yieldContent('head-tag'); ?>
</head>
<body>
<div id="wrapper">
    <?php echo $__env->make('adminto.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <?php echo $__env->make('adminto.layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    <div class="content-page">
        <div class="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
        <?php echo $__env->make('adminto.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
</div>
<div class="rightbar-overlay"></div>
<?php echo $__env->make('adminto.layouts.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>
<?php /**PATH C:\CODEX\techzilla\resources\views/adminto/layouts/master.blade.php ENDPATH**/ ?>