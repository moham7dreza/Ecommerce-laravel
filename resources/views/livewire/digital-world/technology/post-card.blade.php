<div class="card mb-3" style="max-width: 650px;">
    <div class="row g-0">
        <div class="col-md-4">
            <a href="{{ route('digital-world.technology.post.detail', $post) }}">
                <img src="{{ asset($post->image['indexArray']['medium']) }}" class="img-fluid rounded-start"
                     alt="{{ asset($post->image['indexArray']['medium']) }}">
            </a>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ Str::limit($post->summary, 60) }}</p>
                <p class="card-text"><small class="text-muted">آخرین آپدیت : {{ jalaliDate($post->created_at) }}</small>
                </p>
                <p class="card-text"><small class="text-muted">زمان مطالعه : {{ $post->time_to_read }}</small></p>
                <p class="card-text"><small class="text-muted">نویسنده : {{ $post->author->fullName }}</small></p>
            </div>
        </div>
    </div>
</div>
