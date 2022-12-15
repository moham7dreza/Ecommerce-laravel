<?php $__env->startSection('head-tag'); ?>
    <!-- MINIFIED -->
    <?php echo SEO::generate(true); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="position-relative">
        <div class="archive-header text-center mb-50">
            <div class="container">
                <h2><span class="text-danger">دسته بندی <?php echo e($postCategory->name); ?></span></h2>
                <div class="breadcrumb">
                    <span class="no-arrow">شما الان اینجا هستید::</span>
                    <a href="<?php echo e(route('digital-world.home')); ?>" rel="nofollow">خانه</a>
                    <span></span>
                    <?php echo e($postCategory->name); ?>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                    <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                        <div class="widget-header position-relative mb-15">
                            <h5 class="widget-title"><strong>دسته بندی ها</strong></h5>
                        </div>
                        <ul class="font-small text-muted">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="cat-item cat-item-2">
                                    <a href="<?php echo e($category->path()); ?>"><?php echo e($category->name); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row mb-50">
                        <div class="col-lg-12 col-md-12">
                            <div class="latest-post mb-50">
                                <div class="loop-grid">
                                    <div class="row">
                                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <article class="col-lg-4 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div
                                                        class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="<?php echo e($post->path()); ?>">
                                                            <img class="border-radius-15 style-article-img"
                                                                 src="<?php echo e($post->imagePath()); ?>"
                                                                 alt="<?php echo e($post->title); ?>">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2"
                                                               href="<?php echo e($post->getCategoryPath()); ?>">
                                                                <span class="post-in text-primary font-x-small">
                                                                    <?php echo e($post->textCategoryName()); ?>

                                                                </span>
                                                            </a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <a href="<?php echo e($post->path()); ?>">
                                                                <?php echo e($post->limitedTitle()); ?>

                                                            </a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">
                                                            <?php echo $post->limitedSummary(); ?>

                                                        </p>
                                                        <div
                                                            class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-by">توسط
                                                                <a href="<?php echo e($post->getAuthorPath()); ?>"><?php echo e($post->textAuthorName()); ?></a>
                                                            </span>
                                                            <span
                                                                class="post-on"><?php echo e($post->getDiffCreatedDate()); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-area mb-30">
                                <?php echo e($posts->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/category.blade.php ENDPATH**/ ?>