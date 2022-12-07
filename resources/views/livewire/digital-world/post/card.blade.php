<article class="p-10 background-white border-radius-10 mb-30 wow fadeIn animated">
    <div class="d-flex">
        <div class="post-thumb d-flex ml-15 border-radius-15 img-hover-scale">
            <a class="color-white" href="{{ route('digital-world.livewire.post.detail', $post) }}">
                <img class="border-radius-15" src="{{ $post->imagePath() }}" alt="{{ $post->title }}">
            </a>
        </div>
        {{--                        {{ \Illuminate\Support\Str::limit($post->title, 25) }}--}}
        <div class="post-content media-body">
            <div class="entry-meta mb-15 mt-10">
                <a class="entry-meta meta-2" href="{{ $post->getCategoryPath() }}">
                    <span class="post-in text-danger font-x-small">{{ $post->textCategoryName() }}</span>
                </a>
            </div>
            <h5 class="post-title mb-15 text-limit-2-row">
                <a href="{{ route('digital-world.livewire.post.detail', $post) }}">{{ $post->limitedTitle() }}</a>
            </h5>
            <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase">
                <span class="post-by">توسط <a
                        href="{{ $post->getAuthorPath() }}">{{ $post->textAuthorName() }}</a></span>
                <span class="post-on">{{ $post->getDiffCreatedDate() }}</span>
                <span class="time-reading">زمان خواندن {{ $post->time_to_read }} دقیقه</span>
            </div>
        </div>
    </div>
</article>
