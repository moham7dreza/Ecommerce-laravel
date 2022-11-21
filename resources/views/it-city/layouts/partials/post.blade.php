<!-- section news -->
<div class="section padding_layout_1 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="full">
                    <div class="main_heading text_align_center">
                        <h3>آخرین اخبار از دنیای سخت افزار</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($homeRepo->posts() as $post)
                <div class="col-md-4 rtl text_align_right">
                    <div class="full blog_colum">
                        <div class="blog_feature_img"><img
                                src="{{ asset('it-next-assets/images/it_service/post-03.jpg') }}" alt="#"/></div>
                        <div class="post_time">
                            <p>{{ jalaliDate($post->created_at) }} <i class="fa fa-clock-o"></i></p>
                        </div>
                        <div class="blog_feature_head">
                            <h4>{{ $post->title }}</h4>
                        </div>
                        <div class="blog_feature_cont">
                            <p>{!! \Illuminate\Support\Str::limit($post->summary, 200) !!}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end section -->
