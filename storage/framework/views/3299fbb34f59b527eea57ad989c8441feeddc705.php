<?php $__env->startSection('head-tag'); ?>
    <title>
        لیست دنبال کننده ها
    </title>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
    <main class="position-relative">
        <div class="container">
            <div class="sidebar-widget mb-30">
                <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                        <h5 class="widget-title pl-5">فالوورها</h5>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $followers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $follower): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a class="red-tooltip active" href="#" data-toggle="tooltip"
                           data-placement="top"
                           data-original-title="<?php echo e($follower->fullName); ?> - <?php echo e($follower->getPostsCount()); ?> پست">
                            <img src="<?php echo e($follower->image()); ?>" alt="<?php echo e($follower->fullName); ?>">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>دنبال کننده ای ندارد</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="sidebar-widget mb-30">
                <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                        <h5 class="widget-title pl-5">دنبال شونده ها</h5>
                    </div>
                    <?php $__empty_1 = true; $__currentLoopData = $followings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $following): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <a class="red-tooltip active" href="#" data-toggle="tooltip"
                           data-placement="top"
                           data-original-title="<?php echo e($following->fullName); ?> - <?php echo e($following->getPostsCount()); ?> پست">
                            <img src="<?php echo e($following->image()); ?>" alt="<?php echo e($following->fullName); ?>">
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p>دنبال شونده ای ندارد</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/user/followers.blade.php ENDPATH**/ ?>