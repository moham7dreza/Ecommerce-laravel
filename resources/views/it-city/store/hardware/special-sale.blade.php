@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        محصولات فروش ویژه
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
                                <h1 class="page-title"> محصولات فروش ویژه</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="#">استور</a></li>
                                    <li class="active"> محصولات فروش ویژه</li>
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
    <div class="section padding_layout_1 product_list_main rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach($productsWithActiveAmazingSales as $hardware)
                            <div class="col-md-4 col-sm-6 col-xs-12 margin_bottom_30_all">
                                <div class="product_list">
                                    <a href="{{ route('it-city.store.hardware', $hardware->product) }}">
                                        <div class="product_img"><img class="img-responsive"
                                                                      src="{{ asset('it-next-assets/images/it_service/1.jpg') }}"
                                                                      alt=""></div>
                                        <div class="product_detail_btm">
                                            <div class="center text_align_center">
                                                <h5>{{ $hardware->product->name }}</h5>
                                            </div>
                                            <div class="starratin">
                                                <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                        class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                                      aria-hidden="true"></i>
                                                    <i class="fa fa-star" aria-hidden="true"></i> <i
                                                        class="fa fa-star-o" aria-hidden="true"></i></div>
                                            </div>
                                            <div class="product_price">
                                                <p><span class="old_price">$15.00</span> – <span class="new_price">{{ priceFormat($hardware->product->price)  }} تومان</span>
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
                                    @foreach(explode(',',$productsWithActiveAmazingSales[0]->product->tags) as $tag)
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
