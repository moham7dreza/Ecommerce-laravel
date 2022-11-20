<div class="col-lg-8 col-md-12">
    <div class="latest-post mb-50">
        <div class="widget-header position-relative mb-30">
            <div class="row">
                <div class="col-7">
                    <h4 class="widget-title mb-0">جدیدترین <span>پست ها</span></h4>
                </div>
                <div class="col-5 text-left">
                    <h6 class="font-medium pl-15">
                        <a class="text-muted font-small" href="#">مشاهده همه</a>
                    </h6>
                </div>
            </div>
        </div>
        <div class="loop-list-style-1">
            <?php $__currentLoopData = $homeRepo->getNewPosts(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                    <div class="d-flex">
                        <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                            <a class="color-white" href="<?php echo e($post->path()); ?>">
                                <img class="border-radius-15" src="<?php echo e($post->imagePath()); ?>" alt="<?php echo e($post->title); ?>">
                            </a>
                        </div>
                        
                        <div class="post-content media-body">
                            <div class="entry-meta mb-15 mt-10">
                                <a class="entry-meta meta-2" href="<?php echo e($post->getCategoryPath()); ?>">
                                    <span class="post-in text-danger font-x-small"><?php echo e($post->textCategoryName()); ?></span>
                                </a>
                            </div>
                            <h5 class="post-title mb-15 text-limit-2-row">
                                <a href="<?php echo e($post->path()); ?>"><?php echo e($post->limitedTitle()); ?></a>
                            </h5>
                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                <span class="post-by">توسط <a href="<?php echo e($post->getAuthorPath()); ?>"><?php echo e($post->textAuthorName()); ?></a></span>
                                <span class="post-on"><?php echo e($post->getDiffCreatedDate()); ?></span>
                                <span class="time-reading">زمان خواندن <?php echo e($post->time_to_read); ?> دقیقه</span>
                            </div>
                        </div>
                    </div>
                </article>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
    <div class="pagination-area mb-30">
        
    </div>
    <?php echo $__env->make('digital-world.layouts.partials.bottom-banner', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/layouts/partials/news-posts.blade.php ENDPATH**/ ?>