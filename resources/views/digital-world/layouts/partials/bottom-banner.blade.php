@if (!is_null($bottomBanner))
    <div class="sidebar-widget widget-ads mb-30 text-center">
        <a href="{{ $bottomBanner->link }}" title="{{ $bottomBanner->title }}">
            <img class="border-radius-10" src="{{ $bottomBanner->imagePath() }}" alt="{{ $bottomBanner->title }}">
        </a>
    </div>
@endif

