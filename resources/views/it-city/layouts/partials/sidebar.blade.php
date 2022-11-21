<div class="col-md-3">
    <div class="side_bar">
        <div class="side_bar_blog">
            <h5>جست و جو</h5>
            <div class="side_bar_search">
                <div class="input-group stylish-input-group">
                    <input class="form-control" placeholder="Search" type="text">
                    <span class="input-group-addon">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span></div>
            </div>
        </div>
        <div class="side_bar_blog">
            <h5>سرویس</h5>
            <p>سرویس</p>
            <a class="btn sqaure_bt" href="{{ route('it-city.service.index') }}">مشاهده</a></div>
        <div class="side_bar_blog">
            <h4>سرویس های اصلی مجموعه</h4>
            <div class="categary">
                <ul>
                    @foreach($services as $service)
                        <li>
                            <a href="{{ route('it-city.service.service', $service) }}">{{ $service->name }}
                                <i class="fa fa-angle-left mr-2"></i></a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>آخرین پست ها</h4>
            <div class="categary">
                <ul>
                    @foreach($posts as $post)
                        <li><a href="{{ route('it-city.blog.post.detail', $post) }}">{{ $post->title }}
                                <i class="fa fa-angle-left mr-2"></i></a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="side_bar_blog">
            <h4>برچسب ها</h4>
            <div class="tags">
                <ul>
{{--                    @foreach(explode(',', $service->tags) as $tag)--}}
{{--                        @php--}}
{{--                            $category = \App\Models\Market\ProductCategory::query()->where('name', 'LIKE', '%' . $tag . '%')->first();--}}
{{--                        @endphp--}}
{{--                        <li><a @if($category) href="{{ route('it-city.store.category.components', $category) }}"--}}
{{--                               @else href="{{ route('it-city.error.404') }}" @endif>{{ $tag }}</a></li>--}}
{{--                    @endforeach--}}
                </ul>
            </div>
        </div>
    </div>
</div>
