@extends('digital-world.layouts.master')
@section('head-tag')
    <title>
        {{ $user->fullName }}
    </title>
@endsection

@php
    $author = $user;
@endphp
@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="row mb-50">
                <div class="col-lg-2 d-none d-lg-block"></div>
                <div class="col-lg-8 col-md-12">
                    <div class="author-bio border-radius-10 bg-white p-30 mb-50">
                        <div class="author-image mb-30">
                            <a href="{{ $author->path() }}"><img src="{{ $author->image() }}"
                                                                 alt="{{ $author->fullName }}" class="avatar"></a>
                        </div>
                        <div class="author-info">
                            <h3>
                                <span class="vcard author">
                                    <span class="fn">
                                        <a href="#" rel="author">{{ $author->fullName }}</a>
                                    </span>
                                </span>
                            </h3>
                            <div class="author-description">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, laudantium.
                            </div>
                            {{-- TODO --}}
                            @if(auth()->id() !== $author->id)
                                @if(!auth()->user()->isFollowing($author))
                                    <a type="button"
                                       data-url="{{ route('digital-world.posts.author.follow', $author) }}"
                                       class="author-bio-link text-primary ml-5 font-x-small" id="follow-author">دنبال
                                        کردن نویسنده</a>
                                @else
                                    <a type="button"
                                       data-url="{{ route('digital-world.posts.author.follow', $author) }}"
                                       class="author-bio-link text-danger ml-5 font-x-small" id="follow-author">دنبال
                                        نکردن نویسنده</a>
                                @endif
                            @endif
                            <div class="author-social">
                                <ul class="author-social-icons">
                                    <li class="author-social-link-facebook">
                                        <a href="" target="_blank">
                                            <img src="{{ asset('home/imgs/telegra.png') }}" alt="telegram">
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
                                                    <a href="{{ route('digital-world.posts.author.followers', $author) }}">دنبال کننده ها : </a><strong id="followers-count">{{ $author->followersCount() }}</strong>
                                                </span>
                                    <span class="post-by">
                                                    <a href="{{ route('digital-world.posts.author.followers', $author) }}">دنبال شونده ها : </a>{{ $author->followingsCount() }}
                                                </span>
                                    <span
                                        class="post-on">تعداد لایک های زده شده روی پست های نویسنده : <strong id="likes-count">{{ $author->likesCount() }}</strong></span>
                                    <span
                                        class="post-on">تعداد لایک هایی که نویسنده کرده : {{ $author->likedPostsCount() }}</span>
                                    <span
                                        class="time-reading"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2>همه پست های {{ $author->fullName }}</h2>
                    <hr class="wp-block-separator is-style-wide">
                    <div class="latest-post mb-50">
                        <div class="loop-list-style-1">
                            @foreach ($posts as $post)
                                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn  animated"
                                         style="visibility: visible; animation-name: fadeIn;">
                                    <div class="d-md-flex d-block">
                                        <div
                                            class="post-thumb post-thumb-big d-flex ml-15 border-radius-15 img-hover-scale">
                                            <a class="color-white" href="{{ $post->path() }}">
                                                <img class="border-radius-15" src="{{ $post->imagePath() }}"
                                                     alt="article image">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <div class="entry-meta mb-15 mt-10">
                                                <a class="entry-meta meta-2" href="{{ $post->getCategoryPath() }}">
                                                    <span
                                                        class="post-in text-danger font-x-small">{{ $post->textCategoryName() }}</span>
                                                </a>
                                            </div>
                                            <h5 class="post-title mb-15 text-limit-2-row">
                                                <a href="{{ $post->path() }}">
                                                    {{ $post->limitedTitle() }}
                                                </a>
                                            </h5>
                                            <p class="post-exerpt font-medium text-muted mb-30 d-none d-lg-block">
                                                {!! $post->limitedSummary() !!}
                                            </p>
                                            <div
                                                class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                                <span class="post-by">توسط
                                                    <a href="#">{{ $post->textAuthorName() }}</a>
                                                </span>
                                                <span class="post-on">({{ $post->getDiffCreatedDate() }})</span>
                                                <span
                                                    class="time-reading">{{ $post->time_to_read }} دقیقه خوانده شد</span>
                                                <span
                                                    class="time-reading">تعداد لایک ها : {{ $post->likers_count }}</span>
                                            </div>
                                            <div class="entry-bottom mt-50 mb-10">
                                                <div class="overflow-hidden mt-30">
                                                    <div class="single-social-share float-left">

                                                        <ul class="d-inline-block list-inline">
                                                            @if(!auth()->user()->hasFavorited($post))
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="{{ route('digital-world.post.favorite', $post) }}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="افزودن پست به علاقه مندی ها"
                                                                       id="post-favorite-btn"><i
                                                                            class="ti-bookmark"></i></a></li>
                                                            @else
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="{{ route('digital-world.post.favorite', $post) }}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="حذف پست از علاقه مندی ها"
                                                                       id="post-favorite-btn"><i
                                                                            class="ti-bookmark text-danger"></i></a>
                                                                </li>
                                                            @endif
                                                            <li class="list-inline-item">
                                                                <a class="social-icon instagram-icon text-xs-center"
                                                                   href="#commentForm"><i
                                                                        class="ti-comment"></i></a></li>
                                                            @if(!auth()->user()->hasLiked($post))
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="{{ route('digital-world.post.like', $post) }}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="لایک کردن پست" id="post-like-btn"><i
                                                                            class="ti-heart"></i></a></li>
                                                            @else
                                                                <li class="list-inline-item">
                                                                    <a type="button"
                                                                       class="social-icon instagram-icon text-xs-center"
                                                                       data-url="{{ route('digital-world.post.like', $post) }}"
                                                                       data-bs-toggle="tooltip" data-bs-placement="left"
                                                                       title="آن لایک کردن پست" id="post-like-btn"><i
                                                                            class="ti-heart text-danger"></i></a></li>
                                                            @endif

                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </article>
                            @endforeach
                        </div>
                    </div>
                    <div class="pagination-area mb-30">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')

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
@endsection
