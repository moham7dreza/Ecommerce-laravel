<?php $__env->startSection('head-tag'); ?>
    <title>
        لیست نویسندگان
    </title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <main class="position-relative">
        <div class="container">
            <div class="sidebar-widget mb-30">
                <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                        <h5 class="widget-title pl-5">نویسندگان <span>برتر</span></h5>
                    </div>
                    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="red-tooltip active" href="<?php echo e($author->path()); ?>" data-toggle="tooltip"
                           data-placement="top"
                           data-original-title="<?php echo e($author->fullName); ?> - <?php echo e($author->getPostsCount()); ?> پست">
                            <img src="<?php echo e($author->image()); ?>" alt="<?php echo e($author->fullName); ?>">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/user/authors.blade.php ENDPATH**/ ?>