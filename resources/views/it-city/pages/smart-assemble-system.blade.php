@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        درباره ما - اسمبل هوشمند
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
                                <h1 class="page-title">درباره ما</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('customer.home') }}">خانه</a></li>
                                    <li><a href="{{ route('it-city.pc.smart-assemble.index') }}">اسمبل هوشمند</a></li>
                                    <li class="active">درباره ما</li>
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
                            <h2>ما شرکت پیشرو هستیم</h2>
                            <p class="large">اسمبل هوشمند با بهترین قیمت</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row about_blog">
                <div class="col-lg-6 col-md-6 col-sm-12 about_cont_blog">
                    <div class="full text_align_right">
                        <h3>چرا تک زیلا</h3>
                        <p>ارائه خدمات و قطعات سخت افزاری بهرین کیفیت</p>
                        <ul>
                            <li> اعتماد و اطمینان <i class="fa fa-check-circle"></i></li>
                            <li> اعتماد و اطمینان <i class="fa fa-check-circle"></i></li>
                            <li> اعتماد و اطمینان <i class="fa fa-check-circle"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 about_feature_img padding_right_0">
                    <div class="full text_align_center"><img class="img-responsive"
                                                             src="{{asset('it-next-assets/images/it_service/post-06.jpg')}}"
                                                             alt="#"/></div>
                </div>
            </div>
            <div class="row rtl text_align_right" style="margin-top: 35px">
                <div class="col-md-8">
                    <div class="full margin_bottom_30">
                        <div class="accordion border_circle">
                            <div class="bs-example">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <p class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
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
                                            <p class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
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
                                            <p class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
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
                                            <p class="panel-title"><a data-toggle="collapse" data-parent="#accordion"
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
                    <div class="full" style="margin-top: 35px;">
                        <h3>نمیدونی چه سیستمی مناسب کاربری تو هست؟</h3>
                        <p>همین الان وارد بخش اسمبل هوشمند شو و با چند کلیک ساده سیستم خودتو بساز!</p>
                        <p><a class="btn main_bt" href="{{ route('it-city.pc.smart-assemble.index') }}">اسمبل هوشمند</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->


    <!-- section -->
    <div class="section padding_layout_1 light_silver gross_layout">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_left">
                            <h2>About Service</h2>
                            <p class="large">Easy and effective way to get your device repaired.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="full">
                                <div class="service_blog_inner2">
                                    <div class="icon text_align_left"><i class="fa fa-wrench"></i></div>
                                    <h4 class="service-heading">Honest Services</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium
                                        dolore mque.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="full">
                                <div class="service_blog_inner2">
                                    <div class="icon text_align_left"><i class="fa fa-cog"></i></div>
                                    <h4 class="service-heading">Secure payments</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium
                                        dolore mque.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="full">
                                <div class="service_blog_inner2">
                                    <div class="icon text_align_left"><i class="fa fa-history"></i></div>
                                    <h4 class="service-heading">Expert team</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium
                                        dolore mque.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="full">
                                <div class="service_blog_inner2">
                                    <div class="icon text_align_left"><i class="fa fa-heart-o"></i></div>
                                    <h4 class="service-heading">Affordable services</h4>
                                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusa ntium
                                        dolore mque.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
