@if (!is_null($topBanner))
    <div class="row">
        <div class="col-12 text-center mb-50">
            <a href="{{ $topBanner->link }}" title="{{ $topBanner->title }}">
                <img class="border-radius-10 d-inline" src="{{ $topBanner->imagePath() }}"
                     alt="{{ $topBanner->title }}">
            </a>
        </div>
    </div>
@endif
