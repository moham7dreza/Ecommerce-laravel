<?php $__env->startSection('head-tag'); ?>
    <title>
        دنیای دیجیتالی
    </title>
<?php $__env->stopSection(); ?>

<?php
    $author = $user;
?>
<?php $__env->startSection('content'); ?>
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <div class="col-lg-8 col-md-12">
                    <div class="author-bio border-radius-10 bg-white p-30 mb-50">
                        <div class="author-image mb-30">
                            <a href="<?php echo e($author->path()); ?>"><img src="<?php echo e($author->image()); ?>" alt="<?php echo e($author->fullName); ?>" class="avatar"></a>
                        </div>
                        <div class="author-info">
                            <h3>
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="#" rel="author"><?php echo e($author->fullName); ?></a>
                                    </span>
                                </span>
                            </h3>
                            <div class="author-description">

                            </div>
                            
                            <a href="author.html" class="author-bio-link text-muted"><span class="ml-5 font-x-small"><ion-icon name="person-add"></ion-icon></span>این نویسنده را دنبال کنید</a>
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook">
                                        <a href="" target="_blank">
                                            <img src="<?php echo e(asset('home/imgs/telegra.png')); ?>" alt="telegram">
                                        </a>
                                    </li>
                                    <li class="author-social-link-twitter">
                                        <a href="" target="_blank"><i class="ti-twitter-alt"></i></a>
                                    </li>
                                    <li class="author-social-link-pinterest">
                                        <a href="" target="_blank"><i class="ti-linkedin"></i></a>
                                    </li>
                                    <li class="author-social-link-instagram">
                                        <a href="" target="_blank"><i class="ti-instagram"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <h2>همه پست های <?php echo e($author->fullName); ?></h2>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="latest-post mb-50">
                        <div class="loop-list-style-1">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn  animated" style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-md-flex d-block">
                                        <div class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                            <a class="color-white" href="<?php echo e($post->path()); ?>">
                                                <img class="border-radius-15" src="<?php echo e($post->imagePath()); ?>" alt="article image">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="<?php echo e($post->category->path()); ?>">
                                                    <span class="post-in text-danger font-x-small"><?php echo e($post->category->title); ?></span>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-15 text-limit-2-row">
                                                <a href="<?php echo e($post->path()); ?>">
                                                    <?php echo e(Illuminate\Support\Str::limit($post->title)); ?>

                                                </a>
                                            </h5>
                                            <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                <?php echo $post->summary; ?>

                                            </p>
                                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط
                                                    <a href="#"><?php echo e($post->author->fullName); ?></a>
                                                </span>
                                                <span class="post-on">(<?php echo e($post->created_at->diffForHumans()); ?>)</span>
                                                <span class="time-reading"><?php echo e($post->time_to_read); ?> دقیقه خوانده شد</span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    <div class="pagination-area mb-30">
                        <?php echo e($posts->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/user/author.blade.php ENDPATH**/ ?>