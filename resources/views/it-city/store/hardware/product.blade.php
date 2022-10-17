@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        {{ $hardware->name }}
    </title>
@endsection

@section('content')
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-right">
                                <h1 class="page-title">{{ $hardware->name }}</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="#">استور</a></li>
                                    <li class="active">{{ $hardware->name }}</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <!-- section -->
    <div class="section padding_layout_1 product_detail rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-xl-6 col-lg-12 col-md-12">
                            <div class="product_detail_feature_img hizoom hi1">
                                <div class='hizoom hi1'><img src="{{ asset('it-next-assets/images/it_service/1.jpg') }}"
                                                             alt="#"/></div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-12 col-md-12 product_detail_side detail_style1">
                            <div class="product-heading">
                                <h3 class="text_align_right">{{ $hardware->name }}</h3>
                            </div>
                            <div class="product-detail-side"><span class="new-price">{{ priceFormat($hardware->price)  }} تومان</span>
                                <span class="rating"> <i class="fa fa-star" aria-hidden="true"></i> <i
                                        class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                      aria-hidden="true"></i> <i
                                        class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o"
                                                                                      aria-hidden="true"></i> </span>
                                <span class="review">(5 customer review)</span></div>
                            <div class="detail-contant">
                                <p>{{ $hardware->name }} <br>
                                    <span
                                        class="stock text-danger">در انبار :  {{ $hardware->marketable_number }}  </span>
                                </p>
                                <form class="cart" method="get" action="{{ route('it-city.sales-steps.cart') }}">
                                    <div class="quantity">
                                        <input step="1" min="1" max="5" name="quantity" value="1" title="Qty"
                                               class="input-text qty text" size="4" type="number">
                                    </div>
                                    <button type="submit" class="btn sqaure_bt">افزودن به سبد خرید</button>
                                </form>
                            </div>
                            <div class="share-post"><a href="#" class="share-text">Share</a>
                                <ul class="social_icons">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="tab_bar_section">
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item"><a class="nav-link active" data-toggle="tab"
                                                                href="#description">معرفی</a></li>
                                        <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#reviews">دیدگاه
                                                ها
                                                ({{count($hardware->activeComments())}})</a></li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div id="description" class="tab-pane active">
                                            <div class="product_desc">
                                                <p>{!! $hardware->introduction ?? '-' !!}</p>
                                            </div>
                                        </div>
                                        <div id="reviews" class="tab-pane fade">
                                            <div class="product_review">
                                                <h3>نظرات ({{count($hardware->activeComments())}})</h3>

                                                @foreach($hardware->activeComments() as $activeComment)
                                                    <div class="commant-text row">
                                                        <div class="col-lg-2 col-md-2 col-sm-4">
                                                            <div class="profile"><img class="img-responsive"
                                                                                      src="{{ asset('it-next-assets/images/it_service/client1.png') }}"
                                                                                      alt="#"></div>
                                                        </div>
                                                        @php
                                                            $author = $activeComment->user()->first();
                                                        @endphp
                                                        <div class="col-lg-10 col-md-10 col-sm-8">
                                                            <h5>@if(empty($author->first_name) && empty($author->last_name))
                                                                    ناشناس
                                                                @else
                                                                    {{ $author->first_name . ' ' . $author->last_name }}
                                                                @endif</h5>
                                                            <p><span
                                                                    class="c_date">{{ jalaliDate($activeComment->created_at) }}</span>
                                                                | <span><a
                                                                        rel="nofollow" class="comment-reply-link"
                                                                        href="#">ریپلی</a></span>
                                                            </p>
                                                            <span class="rating"> <i class="fa fa-star"
                                                                                     aria-hidden="true"></i> <i
                                                                    class="fa fa-star" aria-hidden="true"></i> <i
                                                                    class="fa fa-star" aria-hidden="true"></i> <i
                                                                    class="fa fa-star" aria-hidden="true"></i> <i
                                                                    class="fa fa-star-o" aria-hidden="true"></i> </span>
                                                            <p class="msg">{!! $activeComment->body !!}</p>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="full review_bt_section">
                                                            <div class="float-right">
                                                                <a class="btn sqaure_bt"
                                                                   data-toggle="collapse"
                                                                   href="#collapseExample"
                                                                   role="button"
                                                                   aria-expanded="false"
                                                                   aria-controls="collapseExample">
                                                                    افزودن دیدگاه
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="full">
                                                            <div id="collapseExample" class="full collapse commant_box">
                                                                <form accept-charset="UTF-8" action="index.html"
                                                                      method="post">
                                                                    <input id="ratings-hidden" name="rating"
                                                                           type="hidden">
                                                                    <textarea class="form-control animated" cols="50"
                                                                              id="new-review" name="comment"
                                                                              placeholder="دیدگاه خود را تایپ کنید..."
                                                                              required=""></textarea>
                                                                    <div class="full_bt center">
                                                                        <button class="btn sqaure_bt" type="submit">
                                                                            ثبت
                                                                        </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="full">
                                <div class="main_heading text_align_right" style="margin-bottom: 35px;">
                                    <h3>کالاهای مرتبط</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($relatedProducts as $hardware)
                            <div
                                class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all rtl text_align_center">
                                <div class="product_list">
                                    <a href="{{ route('it-city.store.hardware', $hardware) }}">
                                        <div class="product_img"><img class="img-responsive"
                                                                      src="{{ asset('it-next-assets/system.png') }}"
                                                                      alt="">
                                        </div>
                                        <div class="product_detail_btm">
                                            <div class="center">
                                                <h5>{{ $hardware->name }}</h5>
                                            </div>
                                            <div class="starratin">
                                                <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                        class="fa fa-star"
                                                        aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                                     aria-hidden="true"></i>
                                                    <i
                                                        class="fa fa-star-o" aria-hidden="true"></i></div>
                                            </div>
                                            <div class="product_price">
                                                <p><span
                                                        class="old_price">{{ priceFormat($hardware->price)  }} تومان</span>
                                                    –
                                                    <span
                                                        class="new_price">{{ priceFormat($hardware->price)  }} تومان</span>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
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
                            <a class="btn sqaure_bt" href="it_service.html">مشاهده</a></div>
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
                                    @foreach(explode(',', $hardware->tags) as $tag)
                                        @php
                                            $category = \App\Models\Market\ProductCategory::query()->where('name', 'LIKE', '%' . $tag . '%')->first();
                                        @endphp
                                        <li><a @if($category) href="{{ route('it-city.store.category.components', $category) }}"
                                               @else href="{{ route('it-city.error.404') }}" @endif>{{ $tag }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection

@section('script')
    <!-- zoom effect -->
    <script src="{{ asset('it-next-assets/js/hizoom.js') }}"></script>
    <script>
        $('.hi1').hiZoom({
            width: 300,
            position: 'left'
        });
        $('.hi2').hiZoom({
            width: 400,
            position: 'left'
        });
    </script>
@endsection
