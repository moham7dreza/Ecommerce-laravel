<!-- section brand -->
<div class="section padding_layout_1" style="padding: 50px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <ul class="brand_list">
                        <?php $__currentLoopData = $homeRepo->brands(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><img src="<?php echo e(asset('it-next-assets/nvidia-white-logo.png')); ?>" alt="#"/></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end section -->
<?php /**PATH C:\CODEX\techzilla\resources\views/it-city/layouts/partials/brand.blade.php ENDPATH**/ ?>