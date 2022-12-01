<main class="position-relative">
    <div class="container">
        <div class="sidebar-widget mb-30">
            <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                <div class="widget-header widget-header-style-1 position-relative mb-15">
                    <h5 class="widget-title pl-5">نویسندگان <span>برتر</span></h5>
                </div>
                @foreach ($authors as $author)
                    <a class="red-tooltip active" href="{{ route('digital-world.livewire.author.detail', $author) }}" data-toggle="tooltip" data-placement="top"
                       data-original-title="{{ $author->fullName }} - {{ $author->getPostsCount() }} پست">
                        <img src="{{ $author->image() }}" alt="{{ $author->fullName }}">
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</main>
