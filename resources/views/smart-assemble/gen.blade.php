@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name. ' ' .$systemType->name }}
    </title>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">{{ $systemType->name}}</h1>
                <p class="lead text-center">{{ $systemType->description}}</p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                @foreach($systemGens as $systemGen)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemGen]) }}">
                                {{--                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"--}}
                                {{--                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: {{ $systemCategory->name }}"--}}
                                {{--                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $systemCategory->name }}</title>--}}
                                {{--                                <rect width="100%" height="100%" fill="#55595c"/>--}}

                                {{--                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $systemCategory->name }}</text>--}}
                                {{--                            </svg>--}}
                                <img src="{{ asset($systemGen->image['indexArray']['medium']) }}"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $systemGen->name }}</h5>
                                <p class="card-text">{{ $systemGen->brief }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    {{--                                        <div class="btn-group">--}}
                                    {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>--}}
                                    {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">تعديل--}}
                                    {{--                                            </button>--}}
                                    {{--                                        </div>--}}
                                    <label for="">شروع قیمت</label>
                                    <small class="text-muted">{{ priceFormat($systemGen->start_price_from) }}<span> تومان</span></small>
                                </div>
                                <a type="button"
                                   href="{{ route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemGen]) }}"
                                   class="btn btn-outline-primary card-link mt-3 d-block">مشاهده سیستم ها</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه {{ $systemCategory->name}}-{{ $systemType->name }}
                        اسمبل شده
                    </li>
                </ol>
            </nav>
            <div class="card-group">
                @foreach($offeredSystems as $offeredSystem)
                    <div class="card">
                        <img src="{{ asset($offeredSystem->image['indexArray']['medium'] ) }}" class="card-img-top"
                             alt="...">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--    <!-- inner page banner -->--}}
    {{--    <div id="inner_banner" class="section inner_banner_section">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="full">--}}
    {{--                        <div class="title-holder">--}}
    {{--                            <div class="title-holder-cell text-left">--}}
    {{--                                <h1 class="page-title">PC Pick</h1>--}}
    {{--                                <ol class="breadcrumb">--}}
    {{--                                    <li>سیستم اسمبل هوشمند</li>--}}
    {{--                                    <li>--}}
    {{--                                        <a href="{{ route('smart.assemble.categories') }}">{{ $systemCategory->name }}</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li>--}}
    {{--                                        <a href="{{ route('smart.assemble.types', $systemCategory) }}">{{ $systemType->name }}</a>--}}
    {{--                                    </li>--}}
    {{--                                    <li class="active">نسل سیستم</li>--}}
    {{--                                </ol>--}}
    {{--                            </div>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- end inner page banner -->--}}
    {{--    <!-- section -->--}}
    {{--    <div class="section padding_layout_1">--}}
    {{--        <div class="container">--}}
    {{--            <div class="row">--}}
    {{--                <div class="col-md-12">--}}
    {{--                    <div class="full">--}}
    {{--                        <div class="main_heading text_align_center">--}}
    {{--                            <h2>{{ $systemCategory->name. ' ' .$systemType->name }}</h2>--}}
    {{--                            <p class="large">{{ $systemType->brief }}</p>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--            <div class="row">--}}
    {{--                @foreach($systemGens as $systemGen)--}}
    {{--                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">--}}
    {{--                        <a href="{{ route('smart.assemble.configs', [$systemCategory, $systemType, $systemGen])}}">--}}
    {{--                            <div class="product_list">--}}
    {{--                                <div class="product_img"><img class="img-responsive"--}}
    {{--                                                              src="{{ asset($systemGen->image['indexArray']['large']) }}"--}}
    {{--                                                              alt="">--}}
    {{--                                </div>--}}
    {{--                                <div class="card product_detail_btm text_align_right">--}}
    {{--                                    <div class="center">--}}
    {{--                                        <h4>{{ $systemGen->name }}</h4>--}}
    {{--                                    </div>--}}
    {{--                                    <div class="blog_feature_cont text_align_center">--}}
    {{--                                        <p>{{ $systemGen->brief }}</p>--}}
    {{--                                    </div>--}}
    {{--                                    <ul class="list-group list-group-flush">--}}
    {{--                                        <li class="list-group-item">An item</li>--}}
    {{--                                        <li class="list-group-item">A second item</li>--}}
    {{--                                        <li class="list-group-item">A third item</li>--}}
    {{--                                    </ul>--}}
    {{--                                    <div class="card-body">--}}
    {{--                                        <div class="starratin">--}}
    {{--                                            <div class="center"><i class="fa fa-star" aria-hidden="true"></i> <i--}}
    {{--                                                    class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star"--}}
    {{--                                                                                                  aria-hidden="true"></i>--}}
    {{--                                                <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o"--}}
    {{--                                                                                                 aria-hidden="true"></i>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                        <div class="product_price">--}}
    {{--                                            <p>شروع قیمت ها از</p>--}}
    {{--                                            <p><span--}}
    {{--                                                    class="old_price">{{ priceFormat($systemGen->start_price_from) }}</span>--}}
    {{--                                                –<br> <span class="new_price">{{ priceFormat($systemGen->start_price_from) }} تومان </span>--}}
    {{--                                            </p>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </a>--}}
    {{--                    </div>--}}
    {{--                @endforeach--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    {{--    <!-- end section -->--}}
@endsection
