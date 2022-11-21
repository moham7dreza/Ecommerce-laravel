<!-- section heading systems intro -->
<div class="section padding_layout_1 text_align_center border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading">
                        <h3>دسته بندی سیستم ها</h3>
                        <p class="large">قطعات سیستم تون رو همین حالا با بهترین قیمت خودتون اسمبل کنید.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($homeRepo->systemCategories() as $category)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full margin_bottom_30">
                        <a href="{{ route('it-city.pc.smart-assemble.system-types', $category) }}">
                            <div class="center">
                                <div class="icon"><img src="{{ asset('it-next-assets/gaming.png') }}" alt="#"/></div>
                            </div>
                            <h4 class="theme_color">{{ $category->name }}</h4>
                            <p>{{ $category->brief }}</p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
