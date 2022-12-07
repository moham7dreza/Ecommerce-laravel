@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        همه ی سرویس ها
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
                                <h1 class="page-title">همه ی سرویس ها</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="{{ route('it-city.service.index') }}">سرویس ها</a></li>
                                    <li class="active">همه ی سرویس ها</li>
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
    <div class="section padding_layout_1 service_list rtl">
        <div class="container">
            <div class="row">

                @foreach($services as $service)
                    <div class="col-md-4 service_blog margin_bottom_50 text_align_right">
                        <div class="full">
                            <div class="service_img"><img class="img-responsive" src="{{ $service->imagePath() }}"
                                                          alt="{{ $service->name }}"/></div>
                            <div class="service_cont">
                                <h3 class="service_head">{{ $service->name }}</h3>
                                <p>{!! \Illuminate\Support\Str::limit($service->description, 50) !!}</p>
                                <div class="bt_cont"><a class="btn sqaure_bt"
                                                        href="{{ route('it-city.service.detail', $service) }}">جزئیات
                                        سرویس</a></div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end section -->
    @include('it-city.layouts.partials.personnel')
@endsection
