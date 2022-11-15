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
            @foreach ($homeRepo->getNewPosts() as $post)
                <article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
                    <div class="d-flex">
                        <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
                            <a class="color-white" href="{{ $post->path() }}">
                                <img class="border-radius-15" src="{{ $post->imagePath() }}" alt="{{ $post->title }}">
                            </a>
                        </div>
                        {{--                        {{ \Illuminate\Support\Str::limit($post->title, 25) }}--}}
                        <div class="post-content media-body">
                            <div class="entry-meta mb-15 mt-10">
                                <a class="entry-meta meta-2" href="category.html">
                                    <span class="post-in text-danger font-x-small">{{ $post->category->name }}</span>
                                </a>
                            </div>
                            <h5 class="post-title mb-15 text-limit-2-row">
                                <a href="{{ $post->path() }}">{{ $post->title }}</a>
                            </h5>
                            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                                <span class="post-by">توسط <a href="author.html">{{ $post->author->fullName }}</a></span>
                                <span class="post-on">{{ $post->created_at->diffForHumans() }}</span>
                                <span class="time-reading">زمان خواندن {{ $post->time_to_read }} دقیقه</span>
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
    <div class="pagination-area mb-30">
        {{--        {{ $news_posts->links() }}--}}
    </div>
    @include('digital-world.layouts.partials.bottom-banner')
</div>
