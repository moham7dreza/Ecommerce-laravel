<div class="col-md-3">
    <div class="side_bar">
        <div class="side_bar_blog">
            <h5>جست و جو</h5>
            <div class="side_bar_search">
                <div class="input-group stylish-input-group">
                    <input class="form-control" placeholder="Search" type="text">
                    <span class="input-group-addon">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span></div>
            </div>
        </div>
        <div class="side_bar_blog">
            <h5>سرویس</h5>
            <p>سرویس</p>
            <a class="btn sqaure_bt" href="<?php echo e(route('it-city.service.index')); ?>">مشاهده</a></div>
        <div class="side_bar_blog">
            <h4>سرویس های اصلی مجموعه</h4>
            <div class="categary">
                <ul>
                    <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('it-city.service.service', $service)); ?>"><?php echo e($service->name); ?>

                                <i class="fa fa-angle-left mr-2"></i></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>آخرین پست ها</h4>
            <div class="categary">
                <ul>
                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><a href="<?php echo e(route('it-city.blog.post.detail', $post)); ?>"><?php echo e($post->title); ?>

                                <i class="fa fa-angle-left mr-2"></i></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>برچسب ها</h4>
            <div class="tags">
                <ul>





                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/it-city/layouts/partials/sidebar.blade.php ENDPATH**/ ?>