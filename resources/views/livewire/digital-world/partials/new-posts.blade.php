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
            @foreach ($newPosts as $post)
                @livewire('digital-world.post.card', ['post' => $post])
            @endforeach
        </div>
    </div>
    <div class="pagination-area mb-30">
        {{--        {{ $news_posts->links() }}--}}
    </div>
    @livewire('digital-world.partials.bottom-banner')
</div>
