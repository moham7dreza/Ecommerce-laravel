<?php $__env->startSection('head-tag'); ?>
    <!-- MINIFIED -->
    <?php echo SEO::generate(true); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main class="position-relative" style="transform: none;">
        <div class="container" style="transform: none;">
            <div class="entry-header entry-header-1 mb-30 mt-50">
                <div class="entry-meta meta-0 font-small mb-30">
                    <a href="">
                        <span class="post-cat bg-success color-white"><?php echo e($post->textCategoryName()); ?></span>
                    </a>
                </div>
                <h1 class="post-title mb-30">
                    <?php echo e($post->title); ?>

                </h1>
                <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                    <span class="post-by">توسط <a href="<?php echo e($post->getAuthorPath()); ?>"> <?php echo e($post->textAuthorName()); ?></a></span>
                    <span class="post-on">تاریخ انتشار : <?php echo e($post->getFaCreatedDate()); ?></span>
                    <span class="time-reading">زمان خواندن <?php echo e($post->time_to_read); ?> دقیقه</span>
                    <p class="font-x-small mt-10">
                        <span class="hit-count"><i class="ti-comment ml-5"></i>نظرات <?php echo e($post->commentsCount()); ?></span>
                        <span class="hit-count"><i class="ti-heart ml-5"></i>لایک <?php echo e($post->likers()->count()); ?></span>
                        <span class="hit-count"><i class="ti-star ml-5"></i>امتیاز <?php echo e($post->rating); ?>/10</span>
                        <span class="hit-count"><i class="ti-eye ml-5"></i>بازدید <?php echo e(views($post)->unique()->count()); ?></span>
                    </p>
                </div>
            </div>
            <div class="row mb-50" style="transform: none;">
                <div class="col-lg-8 col-md-12">
                    <div class="single-social-share single-sidebar-share mt-30">
                        <ul>
                            <li><a class="social-icon facebook-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-facebook"></i></a></li>
                            <li><a class="social-icon twitter-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-twitter-alt"></i></a></li>
                            <li><a class="social-icon pinterest-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-pinterest"></i></a></li>
                            <li><a class="social-icon instagram-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-instagram"></i></a></li>
                            <li><a class="social-icon linkedin-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-linkedin"></i></a></li>
                            <li><a class="social-icon email-icon text-xs-center" target="_blank" href="#"><i
                                        class="ti-email"></i></a></li>
                        </ul>
                    </div>
                    <div class="bt-1 border-color-1 mb-30"></div>
                    <figure class="single-thumnail mb-30">
                        <img src="<?php echo e($post->imagePath()); ?>" alt="<?php echo e($post->title); ?>">
                    </figure>
                    <div class="entry-main-content">
                        <h2>توضیحات</h2>
                        <hr class="wp-block-separator is-style-wide">
                        <p>
                            <?php echo $post->body; ?>

                        </p>
                        <?php if(!is_null($banner)): ?>
                            <p class="text-center mt-30">
                                <a href="<?php echo e($banner->link); ?>" title="<?php echo e($banner->title); ?>">
                                    <img class="d-inline border-radius-10" src="<?php echo e($banner->imagePath()); ?>"
                                         alt="<?php echo e($banner->title); ?>">
                                </a>
                            </p>
                        <?php endif; ?>
                    </div>
                    <div class="entry-bottom mt-50 mb-10">
                        <div class="overflow-hidden mt-30">
                            <div class="single-social-share float-left">

                                <ul class="d-inline-block list-inline">
                                    <?php if(!auth()->user()->hasFavorited($post)): ?>
                                        <li class="list-inline-item">
                                            <a type="button" class="social-icon instagram-icon text-xs-center"
                                               data-url="<?php echo e(route('digital-world.post.favorite', $post)); ?>"
                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                               title="افزودن پست به علاقه مندی ها" id="post-favorite-btn"><i
                                                    class="ti-bookmark"></i></a></li>
                                    <?php else: ?>
                                        <li class="list-inline-item">
                                            <a type="button" class="social-icon instagram-icon text-xs-center"
                                               data-url="<?php echo e(route('digital-world.post.favorite', $post)); ?>"
                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                               title="حذف پست از علاقه مندی ها" id="post-favorite-btn"><i
                                                    class="ti-bookmark text-danger"></i></a></li>
                                    <?php endif; ?>
                                    <li class="list-inline-item">
                                        <a class="social-icon instagram-icon text-xs-center" href="#commentForm"><i
                                                class="ti-comment"></i></a></li>
                                    <?php if(!auth()->user()->hasLiked($post)): ?>
                                        <li class="list-inline-item">
                                            <a type="button" class="social-icon instagram-icon text-xs-center"
                                               data-url="<?php echo e(route('digital-world.post.like', $post)); ?>"
                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                               title="لایک کردن پست" id="post-like-btn"><i
                                                    class="ti-heart"></i></a></li>
                                    <?php else: ?>
                                        <li class="list-inline-item">
                                            <a type="button" class="social-icon instagram-icon text-xs-center"
                                               data-url="<?php echo e(route('digital-world.post.like', $post)); ?>"
                                               data-bs-toggle="tooltip" data-bs-placement="left"
                                               title="آن لایک کردن پست" id="post-like-btn"><i
                                                    class="ti-heart text-danger"></i></a></li>
                                    <?php endif; ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="entry-bottom mt-10 mb-30">
                        <div class="overflow-hidden mt-30">
                            <div class="tags float-right text-muted mb-md-30">
                                <span class="font-small ml-10"><i class="fa fa-tag ml-5"></i>برچسب ها: </span>
                                <?php $__currentLoopData = explode(',', $post->tags); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <a href="#" rel="tag"><?php echo e($tag); ?></a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div> 
                            <div class="single-social-share float-left">
                                <ul class="d-inline-block list-inline">
                                    <li class="list-inline-item"><span class="font-small text-muted"><i
                                                class="ti-sharethis ml-5"></i>اشتراک: </span></li>
                                    <li class="list-inline-item"><a class="social-icon facebook-icon text-xs-center"
                                                                    target="_blank" href="#"><i class="ti-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item"><a class="social-icon twitter-icon text-xs-center"
                                                                    target="_blank" href="#"><i
                                                class="ti-twitter-alt"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon pinterest-icon text-xs-center"
                                                                    target="_blank" href="#"><i
                                                class="ti-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon instagram-icon text-xs-center"
                                                                    target="_blank" href="#"><i
                                                class="ti-instagram"></i></a></li>
                                    <li class="list-inline-item"><a class="social-icon linkedin-icon text-xs-center"
                                                                    target="_blank" href="#"><i class="ti-linkedin"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="author-bio border-radius-10 bg-white p-30 mb-40">
                        <div class="author-image mb-30">
                            <a href="<?php echo e($post->getAuthorPath()); ?>">
                                <img src="<?php echo e($post->authorImage()); ?>" alt="<?php echo e($post->textAuthorName()); ?>"
                                     class="avatar">
                            </a>
                        </div>
                        <div class="author-info">
                            <h3>
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="<?php echo e($post->getAuthorPath()); ?>"
                                           rel="author"><?php echo e($post->textAuthorName()); ?></a>
                                    </span>
                                </span>
                            </h3>
                            <h5 class="text-muted">
                                <span class="ml-15">نویسنده نخبه</span>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                                <i class="ti-star"></i>
                            </h5>
                            <div class="author-description">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و
                                با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان
                                که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز.
                            </div>
                            <a href="<?php echo e($post->getAuthorPath()); ?>" class="author-bio-link text-muted">مشاهده همه پست
                                ها</a>

                            <?php if(auth()->id() !== $post->author->id): ?>
                                <?php if(!auth()->user()->isFollowing($post->author)): ?>
                                    <a type="button"
                                       data-url="<?php echo e(route('digital-world.posts.author.follow', $post->author)); ?>"
                                       class="author-bio-link text-primary" id="follow-author">دنبال کردن نویسنده</a>
                                <?php else: ?>
                                    <a type="button"
                                       data-url="<?php echo e(route('digital-world.posts.author.follow', $post->author)); ?>"
                                       class="author-bio-link text-danger" id="follow-author">دنبال نکردن نویسنده</a>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook"><a href="#" target="_blank"><i
                                                class="ti-facebook"></i></a></li>
                                    <li class="author-social-link-twitter"><a href="#" target="_blank"><i
                                                class="ti-twitter-alt"></i></a></li>
                                    <li class="author-social-link-pinterest"><a href="#" target="_blank"><i
                                                class="ti-pinterest"></i></a></li>
                                    <li class="author-social-link-instagram"><a href="#" target="_blank"><i
                                                class="ti-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!--related posts-->
                    <?php echo $__env->make('digital-world.post.partials.related-posts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--Comments-->
                    <?php echo $__env->make('digital-world.post.partials.comments', ['post' => $post], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <!--comment form-->
                    <?php echo $__env->make('digital-world.post.partials.create-comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <!-- Sidebar -->
                <?php echo $__env->make('digital-world.post.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        $('#post-favorite-btn').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف پست از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف پست از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن پست به علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن پست به علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#post-like-btn').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'آن لایک کردن');
                        $(element).attr('data-bs-original-title', 'آن لایک کردن');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'لایک کردن');
                        $(element).attr('data-bs-original-title', 'لایک کردن');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#follow-author').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).removeClass('text-primary').addClass('text-danger');
                        $(element).innerText = "";
                        $(element).text("دنبال نکردن نویسنده");
                    } else if (result.status == 2) {
                        $(element).removeClass('text-danger').addClass('text-primary');
                        $(element).innerText = "";
                        $(element).text("دنبال کردن نویسنده");
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/post/details.blade.php ENDPATH**/ ?>