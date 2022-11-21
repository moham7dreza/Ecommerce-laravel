@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        سرویس ها
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
                                <h1 class="page-title">سرویس ها</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="{{ route('it-city.service.index') }}">سرویس ها</a></li>
                                    <li class="active">سرویس ها</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <div class="section padding_layout_1 gross_layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>فرآیند خدمات</h2>
                            <p class="large">راه آسان و موثر برای تعمیر دستگاه شما.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si1.png') }}" alt="#"></div>
                                    <h4 class="service-heading">خدمات سریع</h4>
                                    <p>خدمات سریع</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si2.png') }}" alt="#"></div>
                                    <h4 class="service-heading">پرداخت های مطمئن</h4>
                                    <p>پرداخت های مطمئن</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si3.png') }}" alt="#"></div>
                                    <h4 class="service-heading">تیم متخصص</h4>
                                    <p>تیم متخصص</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si4.png') }}" alt="#"></div>
                                    <h4 class="service-heading">خدمات مقرون به صرفه</h4>
                                    <p>خدمات مقرون به صرفه</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si5.png') }}" alt="#"></div>
                                    <h4 class="service-heading">90 روز گارانتی</h4>
                                    <p>90 روز گارانتی</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si6.png') }}" alt="#"></div>
                                    <h4 class="service-heading">برنده جایزه</h4>
                                    <p>برنده جایزه</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <div class="section padding_layout_1 light_silver service_list rtl">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h3>سرویس های قابل ارائه در مجموعه تک زیلا</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($services as $service)
                <div class="col-md-4 service_blog text_align_right pb-5">
                    <div class="full">
                        <div class="service_img"> <img class="img-responsive" src="{{ $service->imagePath() }}" alt="{{ $service->name }}" /> </div>
                        <div class="service_cont">
                            <h3 class="service_head">{{ $service->name }}</h3>
                            <p>{!! \Illuminate\Support\Str::limit($service->description, 50) !!}</p>
                            <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ route('it-city.service.service', $service) }}">جزئیات سرویس</a> </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @include('it-city.layouts.partials.personnel')
@endsection
