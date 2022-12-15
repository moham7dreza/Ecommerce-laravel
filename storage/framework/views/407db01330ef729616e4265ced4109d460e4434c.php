<?php $__env->startSection('head-tag'); ?>
    <!-- MINIFIED -->
    <?php echo SEO::generate(); ?>

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
                            <a href="<?php echo e($author->path()); ?>"><img src="<?php echo e($author->image()); ?>"
                                                                 alt="<?php echo e($author->fullName); ?>" class="avatar"></a>
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
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, laudantium.
                            </div>
                            
                            <?php if(auth()->id() !== $author->id): ?>
                                <?php if(!auth()->user()->isFollowing($author)): ?>
                                    <a type="button"
                                       data-url="<?php echo e(route('digital-world.posts.author.follow', $author)); ?>"
                                       class="author-bio-link text-primary ml-5 font-x-small" id="follow-author">دنبال
                                        کردن نویسنده</a>
                                <?php else: ?>
                                    <a type="button"
                                       data-url="<?php echo e(route('digital-world.posts.author.follow', $author)); ?>"
                                       class="author-bio-link text-danger ml-5 font-x-small" id="follow-author">دنبال
                                        نکردن نویسنده</a>
                                <?php endif; ?>
                            <?php endif; ?>
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
                            <div class="position-relative">
                                <div
                                    class="position-absolute mt-2 p-1 entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">
                                                    <a href="<?php echo e(route('digital-world.posts.author.followers', $author)); ?>">دنبال کننده ها : </a><strong
                                                        id="followers-count"><?php echo e($author->followersCount()); ?></strong>
                                                </span>
                                    <span class="post-by">
                                                    <a href="<?php echo e(route('digital-world.posts.author.followers', $author)); ?>">دنبال شونده ها : </a><?php echo e($author->followingsCount()); ?>

                                                </span>
                                    <span
                                        class="post-on">تعداد لایک های زده شده روی پست های نویسنده : <strong
                                            id="likes-count"><?php echo e($author->likesCount()); ?></strong></span>
                                    <span
                                        class="post-on">تعداد لایک هایی که نویسنده کرده : <?php echo e($author->likedPostsCount()); ?></span>
                                    <span
                                        class="time-reading"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>همه پست های <?php echo e($author->fullName); ?></h2>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="latest-post mb-50">
                        <div class="loop-list-style-1">
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn  animated"
                                         style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-md-flex d-block">
                                        <div
                                            class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                            <a class="color-white" href="<?php echo e($post->path()); ?>">
                                                <img class="border-radius-15" src="<?php echo e($post->imagePath()); ?>"
                                                     alt="article image">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="<?php echo e($post->getCategoryPath()); ?>">
                                                    <span
                                                        class="post-in text-danger font-x-small"><?php echo e($post->textCategoryName()); ?></span>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-15 text-limit-2-row">
                                                <a href="<?php echo e($post->path()); ?>">
                                                    <?php echo e($post->limitedTitle()); ?>

                                                </a>
                                            </h5>
                                            <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                <?php echo $post->limitedSummary(); ?>

                                            </p>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط
                                                    <a href="#"><?php echo e($post->textAuthorName()); ?></a>
                                                </span>
                                                <span class="post-on">(<?php echo e($post->getDiffCreatedDate()); ?>)</span>
                                                <span
                                                    class="time-reading"><?php echo e($post->time_to_read); ?> دقیقه خوانده شد</span>
                                                <span
                                                    class="time-reading">تعداد لایک ها : <?php echo e($post->likers_count); ?></span>
                                            </div>
                                            <div class="entry-bottom mt-50 mb-10">
                                                <div class="overflow-hidden mt-30">
                                                    <div class="single-social-share float-left">

                                                        <ul class="d-inline-block list-inline">
                                                            <?php if(!auth()->user()->hasFavorited($post)): ?>
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="<?php echo e(route('digital-world.post.favorite', $post)); ?>"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="افزودن پست به علاقه مندی ها"
                                                                       id="post-favorite-btn-<?php echo e($post->id); ?>"><i
                                                                            class="ti-bookmark"></i></a></li>
                                                            <?php else: ?>
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="<?php echo e(route('digital-world.post.favorite', $post)); ?>"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="حذف پست از علاقه مندی ها"
                                                                       id="post-favorite-btn-<?php echo e($post->id); ?>"><i
                                                                            class="ti-bookmark text-danger"></i></a>
                                                                </li>
                                                            <?php endif; ?>
                                                            <li class="list-inline-item">
                                                                <a class="social-icon instagram-icon text-xs-center"
                                                                   href="#commentForm"><i
                                                                        class="ti-comment"></i></a></li>
                                                            <?php if(!auth()->user()->hasLiked($post)): ?>
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="<?php echo e(route('digital-world.post.like', $post)); ?>"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="لایک کردن پست"
                                                                       id="post-like-btn-<?php echo e($post->id); ?>"><i
                                                                            class="ti-heart"></i></a></li>
                                                            <?php else: ?>
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="<?php echo e(route('digital-world.post.like', $post)); ?>"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="آن لایک کردن پست"
                                                                       id="post-like-btn-<?php echo e($post->id); ?>"><i
                                                                            class="ti-heart text-danger"></i></a></li>
                                                            <?php endif; ?>

                                                        </ul>
                                                    </div>
                                                </div>
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
<?php $__env->startSection('script'); ?>

    <script>
        $(document).ready(function () {
            var posts = <?php echo $author->hasPosts; ?>;
            posts.map(function (post) {
                var id = post.id;
                var target = `#post-favorite-btn-${id}`;
                $(target).click(function () {
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
            });
        });

    </script>

    <script>
        $(document).ready(function () {
            var posts = <?php echo $author->hasPosts; ?>;
            posts.map(function (post) {
                var id = post.id;
                var target = `#post-like-btn-${id}`;
                $(target).click(function () {
                    var url = $(this).attr('data-url');
                    var element = $(this);
                    $.ajax({
                        url: url,
                        success: function (result) {
                            if (result.status == 1) {
                                $(element).children().first().addClass('text-danger');
                                $(element).attr('data-original-title', 'آن لایک کردن');
                                $(element).attr('data-bs-original-title', 'آن لایک کردن');
                                console.log(result.likesCount);
                                $('#likes-count').innerText = "";
                                $('#likes-count').text(result.likesCount);
                            } else if (result.status == 2) {
                                $(element).children().first().removeClass('text-danger')
                                $(element).attr('data-original-title', 'لایک کردن');
                                $(element).attr('data-bs-original-title', 'لایک کردن');
                                console.log(result.likesCount);
                                $('#likes-count').innerText = "";
                                $('#likes-count').text(result.likesCount);
                            } else if (result.status == 3) {
                                $('.toast').toast('show');
                            }
                        }
                    })
                })
            });
        });
    </script>

    <script>
        $('#follow-author').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status === 1) {
                        $(element).removeClass('text-primary').addClass('text-danger');
                        $(element).innerText = "";
                        $(element).text("دنبال نکردن نویسنده");
                        $('#followers-count').innerText = "";
                        $('#followers-count').text(result.followersCount);
                    } else if (result.status == 2) {
                        $(element).removeClass('text-danger').addClass('text-primary');
                        $(element).innerText = "";
                        $(element).text("دنبال کردن نویسنده");
                        $('#followers-count').innerText = "";
                        $('#followers-count').text(result.followersCount);
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('digital-world.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/digital-world/user/author.blade.php ENDPATH**/ ?>