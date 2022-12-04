<main class="position-relative">
    <div class="col-12 row justify-content-center align-items-center mt-3 py-2">
        <div class="col-12 col-md-6 form-group search_box">
            <input
                type="text"
                class="form-control rounded_5 placeholder_gray shadow-sm h_2_5"
                placeholder="عنوان رو وارد کن"
                wire:model.debounce.1000ms="char"
            />
            <a href="#" class="fas fa-search search_btn"></a>
        </div>
        <div class="col-12 col-md-6 form-group search_box">
            <select name="category_id" class="rounded_5 outline_0 h_2_5 border-0 form-control" wire:model="categoryId">
                <option value="0">انتخاب بر اساس گروه</option>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-9 order-1 order-md-2">
                <div class="row mb-50">
                    <div class="col-lg-8 col-md-12">
                        <div class="latest-post mb-50">
                            <div class="loop-grid">
                                <div class="row">
                                    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <article class="col-lg-6 col-md-12 wow fadeIn animated">
                                            <div class="background-white border-radius-10 p-10 mb-30">
                                                <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                    <a href="<?php echo e(route('digital-world.livewire.post.detail', $post)); ?>">
                                                        <img class="border-radius-15 style-article-img"
                                                             alt="image article"
                                                             src="<?php echo e($post->imagePath()); ?>">
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
                                                        <a href="<?php echo e(route('digital-world.livewire.post.detail', $post)); ?>">
                                                            <?php echo e($post->limitedTitle()); ?>

                                                        </a>
                                                    </h5>
                                                    <p class="post-exerpt font-medium text-muted mb-30">
                                                        <?php echo $post->limitedSummary(); ?>

                                                    </p>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-by">توسط
                                                                <a href="<?php echo e($post->getAuthorPath()); ?>">
                                                                    <?php echo e($post->textAuthorName()); ?>

                                                                </a>
                                                            </span>
                                                        <span class="post-on"><?php echo e($post->getDiffCreatedDate()); ?></span>
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
                    <div class="col-lg-4 col-md-12 sidebar-right">
                        <div class="sidebar-widget mb-50">
                            <div class="widget-header mb-30 bg-white border-radius-10 p-15">
                                <h5 class="widget-title mb-0">پرطرفدارترین ها</h5>
                            </div>
                            <div class="post-aside-style-2">
                                <ul class="list-post">
                                    <?php $__currentLoopData = $viewsPosts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="mb-30 wow fadeIn  animated"
                                            style="visibility: visible; animation-name: fadeIn;">
                                            <div class="d-flex">
                                                <div class="post-thumb d-flex ml-15 border-radius-5 img-hover-scale">
                                                    <a class="color-white"
                                                       href="<?php echo e(route('digital-world.livewire.post.detail', $post)); ?>">
                                                        <img src="<?php echo e($post->imagePath()); ?>" alt="<?php echo e($post->title); ?>">
                                                    </a>
                                                </div>
                                                <div class="post-content media-body">
                                                    <h6 class="post-title mb-10 text-limit-2-row">
                                                        <a href="<?php echo e(route('digital-world.livewire.post.detail', $post)); ?>">
                                                            <?php echo e($post->limitedTitle()); ?>

                                                        </a>
                                                    </h6>
                                                    <div
                                                        class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                            <span class="post-by">توسط
                                                                <a href="<?php echo e($post->getAuthorPath()); ?>"><?php echo e($post->textAuthorName()); ?></a>
                                                            </span>
                                                        <span class="post-on"><?php echo e($post->getDiffCreatedDate()); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget widget_newsletter border-radius-10 p-20 bg-white mb-50">
                            <div class="widget-header widget-header-style-1 position-relative mb-15">
                                <h5 class="widget-title">خبرنامه</h5>
                            </div>
                            <div class="newsletter">
                                <p class="font-medium">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ</p>
                                <form target="_blank" action="#" method="get" class="subscribe_form relative mail_part">
                                    <div class="form-newsletter-cover">
                                        <div class="form-newsletter position-relative">
                                            <input type="email" name="EMAIL" placeholder="ایمیل خود را اینجا وارد کنید"
                                                   required="">
                                            <button type="submit">
                                                <i class="ti ti-email"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('digital-world.partials.comments')->html();
} elseif ($_instance->childHasBeenRendered('l1455133868-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1455133868-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1455133868-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1455133868-0');
} else {
    $response = \Livewire\Livewire::mount('digital-world.partials.comments');
    $html = $response->html();
    $_instance->logRenderedChild('l1455133868-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php /**PATH C:\CODEX\techzilla\resources\views/livewire/digital-world/post/search.blade.php ENDPATH**/ ?>