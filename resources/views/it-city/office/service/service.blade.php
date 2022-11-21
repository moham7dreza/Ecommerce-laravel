@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        زیر مجموعه ی {{ $service->name }}
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
                                <h1 class="page-title">زیر سرویس ها</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="{{ route('it-city.service.index') }}">سرویس ها</a></li>
                                    <li class="active"> زیر مجموعه ی {{ $service->name }}</li>
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
    <div class="section padding_layout_1 service_list rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        @foreach($subServices as $service)
                            <div class="col-md-4 service_blog margin_bottom_50 text_align_right">
                                <div class="full">
                                    <div class="service_img"> <img class="img-responsive" src="{{ $service->imagePath() }}" alt="{{ $service->name }}" /> </div>
                                    <div class="service_cont">
                                        <h3 class="service_head">{{ $service->name }}</h3>
                                        <p>{!! \Illuminate\Support\Str::limit($service->description, 50) !!}</p>
                                        <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ route('it-city.service.detail', $service) }}">جزئیات سرویس</a> </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-md-12">
                            <div class="full margin_bottom_30">
                                <div class="accordion border_circle">
                                    <div class="bs-example">
                                        <div class="panel-group" id="accordion">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <p class="panel-title"><a data-toggle="collapse"
                                                                              data-parent="#accordion"
                                                                              href="#collapseOne"><i
                                                                class="fa fa-bar-chart pl-2"
                                                                aria-hidden="true"></i> اسمبل هوشمند <i
                                                                class="fa fa-angle-down pl-2"></i></a></p>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <p>سیستم اسمبل هوشمند</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <p class="panel-title"><a data-toggle="collapse"
                                                                              data-parent="#accordion"
                                                                              href="#collapseTwo"><i
                                                                class="fa fa-plane pl-2"></i>
                                                            قطعات سخت افزاری<i
                                                                class="fa fa-angle-down pl-2"></i></a></p>
                                                </div>
                                                <div id="collapseTwo" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>قطعات سخت افزاری</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <p class="panel-title"><a data-toggle="collapse"
                                                                              data-parent="#accordion"
                                                                              href="#collapseThree"><i
                                                                class="fa fa-star pl-2"></i>
                                                            سیستم هوشمند انتخاب قطعات سازگار با یکدیگر<i
                                                                class="fa fa-angle-down pl-2"></i></a></p>
                                                </div>
                                                <div id="collapseThree" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <p>سیستم هوشمند انتخاب قطعات سازگار با یکدیگر</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <p class="panel-title"><a data-toggle="collapse"
                                                                              data-parent="#accordion"
                                                                              href="#collapseFour"><i
                                                                class="fa fa-bar-chart pl-2"
                                                                aria-hidden="true"></i>
                                                            انتخاب قطعات با هزینه و کانفیگ دلخواه<i
                                                                class="fa fa-angle-down pl-2"></i></a></p>
                                                </div>
                                                <div id="collapseFour" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <p>انتخاب قطعات با هزینه و کانفیگ دلخواه</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si4.png') }}"
                                                           alt="#"></div>
                                    <h4 class="service-heading">خدمات مقرون به صرفه</h4>
                                    <p>خدمات مقرون به صرفه</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si1.png') }}"
                                                           alt="#"></div>
                                    <h4 class="service-heading">خدمات سریع</h4>
                                    <p>خدمات سریع</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="full">
                                <div class="service_blog_inner text_align_center">
                                    <div class="icon"><img src="{{ asset('it-next-assets/images/it_service/si2.png') }}"
                                                           alt="#"></div>
                                    <h4 class="service-heading">پرداخت های مطمئن</h4>
                                    <p>پرداخت های مطمئن</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="full" style="margin-top: 35px;">
                                <h3>نمیدونی چه سیستمی مناسب کاربری تو هست؟</h3>
                                <p>همین الان وارد بخش اسمبل هوشمند شو و با چند کلیک ساده سیستم خودتو بساز!</p>
                                <p><a class="btn main_bt" href="{{ route('it-city.pc.smart-assemble.index') }}">اسمبل
                                        هوشمند</a></p>
                            </div>
                        </div>
                    </div>
                    <!-- section staff -->

                    @include('it-city.layouts.partials.personnel')
                </div>

                @include('it-city.layouts.partials.sidebar')
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
