<div class="sidebar-widget p-20 border-radius-15 bg-white widget-latest-comments wow fadeIn animated">
    <div class="widget-header mb-30">
        <h5 class="widget-title">آخرین <span>نظرات</span></h5>
    </div>
    <div class="post-block-list post-module-6">
        @foreach ($latestComments as $comment)
            <div class="last-comment mb-20 d-flex wow fadeIn animated">
                                            <span class="item-count vertical-align">
                                                <a class="red-tooltip author-avatar" href="{{ $comment->getAuthorPath() }}"
                                                   data-toggle="tooltip" data-placement="top"
                                                   data-original-title="{{ $comment->textAuthorName() }} - {{ $comment->getAuthorPostsCount() }} پست">
                                                    <img src="{{ $comment->authorImage() }}" alt="{{ $comment->textAuthorName() }}">
                                                </a>
                                            </span>
                <div class="alith_post_title_small">
                    <p class="font-medium mb-10">
                        <a href="{{ $comment->getCommentablePath() }}">
                            {{ $comment->limitedBody() }}
                        </a>
                    </p>
                    <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                    <span class="post-by">توسط
                                                        <a href="{{ $comment->getAuthorPath() }}">{{ $comment->textAuthorName() }}</a>
                                                    </span>
                        <span class="post-on">{{ $comment->getDiffCreatedDate() }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
