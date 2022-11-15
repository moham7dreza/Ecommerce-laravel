<div class="related-posts">
    <h3 class="mb-30">مقالات مرتبط</h3>
    <div class="row">
        <?php $__currentLoopData = $relatedPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <article class="col-lg-4">
                <div class="background-white border-radius-10 p-10 mb-30">
                    <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                        <a href="<?php echo e($post->path()); ?>">
                            <img class="border-radius-15 style-article-img-small" src="<?php echo e($post->imagePath()); ?>" alt="article image">
                        </a>
                    </div>
                    <div class="pl-10 pr-10">
                        <div class="entry-meta mb-15 mt-10">
                            <a class="entry-meta meta-2" href="category.html">
                                <span class="post-in text-primary font-x-small"><?php echo e($post->category->name); ?></span>
                            </a>
                        </div>
                        <h5 class="post-title mb-15">
                            <a href="<?php echo e($post->path()); ?>"><?php echo e(Illuminate\Support\Str::limit($post->title, 25)); ?></a>
                        </h5>
                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                            <span class="post-by">توسط <a href="<?php echo e($post->author->path()); ?>"><?php echo e($post->author->fullName); ?></a></span>
                            <span class="post-on"><?php echo e($post->created_at->diffForHumans()); ?></span>
                        </div>
                    </div>
                </div>
            </article>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/post/partials/related-posts.blade.php ENDPATH**/ ?>