<div class="row">
    @foreach ($dashboardRepo->getLatestAuthorUsers() as $author)
        <div class="col-xl-3 col-md-6">
            <div class="card-box widget-user">
                <div>
                    <div class="avatar-lg float-left mr-3">
                        <img src="{{ $author->image() }}" class="img-fluid rounded-circle" alt="{{ $author->fullName }}">
                    </div>
                    <div class="wid-u-info">
                        <h5 class="mt-0">{{ $author->fullName }}</h5>
                        <p class="text-muted mb-1 font-13 text-truncate">{{ $author->email }}</p>
                        <small class="text-warning"><b>{{ $author->roles[0]->name ?? 'نقش تعریف نشده' }}</b></small>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
