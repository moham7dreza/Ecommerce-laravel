<main class="position-relative" style="transform: none;">
    <div class="container" style="transform: none;">
        <div class="entry-header entry-header-1 mb-30 mt-50">
            <div class="entry-meta meta-0 font-small mb-30">
                <a href="">
                    <span class="post-cat bg-success color-white">{{ $post->textCategoryName() }}</span>
                </a>
            </div>
            <h1 class="post-title mb-30">
                {{ $post->title }}
            </h1>
            <div class="entry-meta meta-1 font-x-small color-grey text-uppercase">
                <span class="post-by">توسط <a
                        href="{{ $post->getAuthorPath() }}"> {{ $post->textAuthorName() }}</a></span>
                <span class="post-on">تاریخ انتشار : {{ $post->getFaCreatedDate() }}</span>
                <span class="time-reading">زمان خواندن {{ $post->time_to_read }} دقیقه</span>
                <p class="font-x-small mt-10">
                    <span class="hit-count"><i class="ti-comment ml-5"></i>نظرات {{ $post->commentsCount() }}</span>
                    <span class="hit-count"><i class="ti-heart ml-5"></i>لایک {{ $post->like_count }}</span>
                    <span class="hit-count"><i class="ti-star ml-5"></i>امتیاز {{ $post->rating }}/10</span>
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
                    <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}">
                </figure>
                <div class="entry-main-content">
                    <h2>توضیحات</h2>
                    <hr class="wp-block-separator is-style-wide">
                    <p>
                        {!! $post->body !!}
                    </p>
                    @if (!is_null($banner))
                        <p class="text-center mt-30">
                            <a href="{{ $banner->link }}" title="{{ $banner->title }}">
                                <img class="d-inline border-radius-10" src="{{ $banner->imagePath() }}"
                                     alt="{{ $banner->title }}">
                            </a>
                        </p>
                    @endif
                </div>
                <div class="entry-bottom mt-50 mb-30">
                    <div class="overflow-hidden mt-30">
                        <div class="tags float-right text-muted mb-md-30">
                            <span class="font-small ml-10"><i class="fa fa-tag ml-5"></i>برچسب ها: </span>
                            <a href="category.html" rel="tag">فناوری</a>
                            <a href="category.html" rel="tag">جهان</a>
                            <a href="category.html" rel="tag">جهانی</a>
                        </div> {{-- TODO --}}
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
                            </ul>{{-- TODO --}}
                        </div>
                    </div>
                </div>
                <div class="author-bio border-radius-10 bg-white p-30 mb-40">
                    <div class="author-image mb-30">
                        <a href="{{ $post->getAuthorPath() }}">
                            <img src="{{ $post->authorImage() }}" alt="{{ $post->textAuthorName() }}" class="avatar">
                        </a>
                    </div>
                    <div class="author-info">
                        <h3>
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="{{ $post->getAuthorPath() }}"
                                           rel="author">{{ $post->textAuthorName() }}</a>
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
                        <a href="author.html" class="author-bio-link text-muted">مشاهده همه پست ها</a>
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
                @livewire('digital-world.post.partials.related-posts', ['post' => $post])
                <!--Comments-->
                @livewire('digital-world.post.partials.comments', ['post' => $post])
                <!--comment form-->
                @livewire('digital-world.post.partials.create-comment', ['post' => $post])
            </div>
            <!-- Sidebar -->
            @livewire('digital-world.partials.left-sidebar')
        </div>
    </div>
</main>
