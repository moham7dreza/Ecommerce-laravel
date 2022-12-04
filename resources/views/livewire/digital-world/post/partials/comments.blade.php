<div class="comments-area">
    <h3 class="mb-30">{{ $post->commentsCount() }} نظرات</h3>
    @foreach ($comments as $comment)
        <div class="comment-list">
            <div class="single-comment justify-content-between d-flex">
                <div class="user justify-content-between d-flex">
                    <div class="thumb">
                        <img src="{{ $comment->authorImage() }}" alt="user img">
                    </div>
                    <div class="desc">
                        <p class="comment">
                            {!! $comment->body !!}
                        </p>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex align-items-center">
                                <h5>
                                    <a href="{{ $comment->getAuthorPath() }}">{{ $comment->textAuthorName() }}</a>
                                </h5>
                                <p class="date"> {{ $comment->getFaCreatedDate() }}</p>
                            </div>
                            <div class="reply-btn">
                                <a href="#comment-form" wire:click="$emit('getCommentToAnswer', {{ $comment->id }})"
                                   class="btn-reply text-uppercase">پاسخ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach ($comment->answers() as $commentReply)
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="{{ $commentReply->authorImage() }}" alt="user img">
                        </div>
                        <div class="desc">
                            <p class="comment">
                                {!! $commentReply->body !!}
                            </p>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a href="{{ $commentReply->getAuthorPath() }}">{{ $commentReply->textAuthorName }}</a>
                                    </h5>
                                    <p class="date"> {{ $commentReply->getFaCreatedDate() }}</p>
                                </div>
                                <div class="reply-btn">
                                    <a href="#" class="btn-reply text-uppercase">پاسخ</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>
