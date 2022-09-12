@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name. ' ' .$systemType->name. ' ' .$systemGen->name }}
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
                            <div class="title-holder-cell text-left">
                                <h1 class="page-title">PC Pick</h1>
                                <ol class="breadcrumb">
                                    <li>سیستم اسمبل هوشمند</li>
                                    <li>
                                        <a href="{{ route('smart.assemble.categories') }}">{{ $systemCategory->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('smart.assemble.types', $systemCategory) }}">{{ $systemType->name }}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('smart.assemble.gens', [$systemCategory, $systemType]) }}">{{ $systemGen->name }}</a>
                                    </li>
                                    <li class="active">کانفیگ سیستم</li>
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
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>{{ $systemCategory->name. ' ' .$systemType->name. ' ' .$systemGen->name }}</h2>
                            <p class="large">{{ $systemGen->brief }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($systemConfigs as $systemConfig)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <a href="{{ route('smart.assemble.categories')}}">
                            <div class="product_list">
                                <div class="product_img"><img class="img-responsive"
                                                              src="{{ asset($systemConfig->image['indexArray']['large']) }}"
                                                              alt=""></div>
                                <div class="card product_detail_btm text_align_right">
                                    <div class="center">
                                        <h4>{{ $systemConfig->name }}</h4>
                                    </div>
                                    <div class="blog_feature_cont text_align_center">
                                        <p>{{ $systemConfig->brief }}</p>
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">An item</li>
                                        <li class="list-group-item">A second item</li>
                                        <li class="list-group-item">A third item</li>
                                    </ul>
                                    <div class="card-body">
                                        <div class="starratin">
                                            <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i
                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"
                                                                                                  aria-hidden="true"></i>
                                                <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o"
                                                                                                 aria-hidden="true"></i>
                                            </div>
                                        </div>
                                        <div class="product_price">
                                            <p>شروع قیمت ها از</p>
                                            <p><span
                                                    class="old_price">{{ priceFormat($systemConfig->start_price_from) }}</span>
                                                –<br> <span class="new_price">{{ priceFormat($systemConfig->start_price_from) }} تومان </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
