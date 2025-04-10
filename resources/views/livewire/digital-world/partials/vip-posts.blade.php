<div class="post-carausel-1-items mb-50">
    @foreach ($vipPosts as $post)
        <div class="col">
            <div class="slider-single bg-white p-10 border-radius-15">
                <div class="img-hover-scale border-radius-10">
                    <a href="{{ route('digital-world.livewire.post.detail', $post) }}">
                        <img class="border-radius-10 style-article-img-small" src="{{ $post->imagePath() }}"
                             alt="{{ $post->title }}">
                    </a>
                </div>
                <h6 class="post-title pr-5 pl-5 mb-10 mt-15 text-limit-2-row">
                    <a href="{{ route('digital-world.livewire.post.detail', $post) }}">{{ $post->title }}</a>
                </h6>
                <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase pr-5 pb-15">
                    <span class="post-by">توسط <a href="{{ $post->getAuthorPath() }}">{{ $post->textAuthorName() }}</a></span>
                    <span class="post-on">{{ $post->getDiffCreatedDate() }}</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
