@extends('smart-assemble.layouts.master')
@section('head-tag')
    <title>
        سیستم اسمبل هوشمند
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
                                    <li><a href="{{ route('smart.assemble.categories') }}">دسته بندی سیتم ها</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- one column -->
            <section class="row py-4">
                <section class="col">
                    <a href="">
                        <img class="d-block rounded-2 w-100 p-4" src="{{ asset('assemble-assets/ezpc-baner-4.jpg') }}" alt="">
                    </a>
                </section>
            </section>
        </section>
    </section>



    <!-- section -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>انواع سیستم های فروشگاه</h2>
                            <p class="large">We package the products with best services to make you a happy customer.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($systemCategories as $systemCategory)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 margin_bottom_30_all">
                        <a href="{{ route('smart.assemble.types', $systemCategory) }}">
                        <div class="product_list">
                            <div class="product_img"> <img class="img-responsive" src="{{ asset($systemCategory->image['indexArray']['large']) }}" alt=""> </div>
                            <div class="product_detail_btm">
                                <div class="center">
                                    <h4>{{ $systemCategory->name }}</h4>
                                </div>
                                <div class="blog_feature_cont text_align_right">
                                    <p>{{ $systemCategory->brief }}</p>
                                </div>
                                <div class="starratin">
                                    <div class="center"> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-o" aria-hidden="true"></i> </div>
                                </div>
{{--                                <div class="product_price">--}}
{{--                                    <p><span class="old_price">$15.00</span> – <span class="new_price">$25.00</span></p>--}}
{{--                                </div>--}}

                            </div>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>با ما از بی‌نهایت عبور کنید</h2>
                            <p class="large">Fastest repair service with best price!</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i1.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Data recovery</h4>
                        <p>ارائه ترکیب‌های متنوع قطعات سخت‌افزاری و تفکیک کامل سیستم‌های کامپیوتری بر مبنای نیاز و زمینه فعالیت کاربران</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i2.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Computer repair</h4>
                        <p>بهره‌برداری کامل از پتانسیل و قدرت پردازش قطعات سخت‌افزاری و بهینه‌سازی دقیق و تخصصی پارامترهای مختلف سیستم</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i3.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Mobile service</h4>
                        <p>بررسی تخصصی، تحلیل فنی و کنترل دقیق اجزای سیستم پیش از شروع فرآیند اسمبل به منظور کسب حداکثر سازگاری و پایداری</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30 margin_0">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i4.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Network solutions</h4>
                        <p>مشاوره رایگان و ارائه مسیرهای ارتباطی متنوع به منظور پاسخگویی جامع به سوالات متداول و نیازهای فنی کاربران در تمامی ساعات روز</p>
                    </div>
                </div>
            </div>
            <div class="row" style="margin-top: 35px">
                <div class="col-md-8">
                    <div class="full margin_bottom_30">
                        <div class="accordion border_circle">
                            <div class="bs-example text_align_right">
                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><i class="fa fa-bar-chart" aria-hidden="true"></i> انتخاب حق شماست<i class="fa fa-angle-down"></i></a> </p>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p>"ایزی پی‌سی" یا سیستم هوشمند اسمبل کامپیوتر یک مجموعه کاملا پیشرفته همراه با بروزترین قطعات سخت‌افزاری است که لذت مقایسه، بررسی قیمت و خرید انواعی از سیستم‌های کامپیوتری، مانند سیستم گیمینگ، سیستم رندرینگ، سیستم اداری و سیستم خانگی را به آسانی در اختیار طیف وسیع کاربران رایانه ای قرار می‌دهد. این سیستم هوشمند با ایجاد دسته‌بندی دقیق و تفکیک کامل قطعات سخت‌افزاری، انتخاب آگاهانه‌ای را برای کاربران فراهم کرده و با شفاف‌سازی کامل مشخصات سیستم، خرید مطمئن و لذتبخشی را برای آنها به ارمغان می‌آورد.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><i class="fa fa-plane"></i>حال خوب و خیال آسوده<i class="fa fa-angle-down"></i></a> </p>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>هدف اصلی لیون کامپیوتر از راه اندازی سیستم هوشمند اسمبل کامپیوتر، ایجاد یک بستر ایده آل برای ارائه خدمات ویژه در حین انتخاب و خرید سیستم های کامپیوتری است که با وجود تیم فنی قدرتمند و گروه پشتیبانی حرفه ای و گردآوری مجموعه‌ای به روز از قطعات کامپیوتری مختص کاربری‌های حرفه‌ای، نظیر قطعات کامپیوتر گیمینگ، قطعات کامپیوتر رندرینگ و قطعات کامپیوتر اداری و خانگی، خرید مطمئنی را برای کاربران فراهم کرده و قابلیت‌های بسیار گسترده ای را در تمامی مراحل خرید کامپیوتر در اختیار آنها قرار میدهد و مفهوم واقعی یک خرید خوب و تجربه ای شیرین از یک حال خوب را برای آنها رقم میزند.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><i class="fa fa-star"></i> Mobile Phone Recovery<i class="fa fa-angle-down"></i></a> </p>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                                                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <p class="panel-title"> <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><i class="fa fa-bar-chart" aria-hidden="true"></i> Complete Recovery from Local & External Drive<i class="fa fa-angle-down"></i></a> </p>
                                        </div>
                                        <div id="collapseFour" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it
                                                    over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words,
                                                    consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="full text_align_right" style="margin-top: 35px;">
                        <h3>خرید قطعات اصلی با قیمت واقعی و گارانتی معتبر</h3>
                        <p>لیون کامپیوتر به‌عنوان یکی از بزرگ‌ترین و معتبرترین فروشگاه‌های قطعات سخت‌افزاری ایران، نمایندگی رسمی بسیاری از برندهای مطرح جهان را در داخل کشور بر عهده دارد و ضمن ارتباط مستقیم با واردکنندگان رسمی قطعات کامپیوتر، بخش قابل توجهی از نیازهای مشتریان را از طریق سیستم فروش بی‌واسطه برطرف می‌نماید. از این‌رو کاربران می‌توانند با خیالی آسوده نسبت به خرید قطعات موردنیاز خود اقدام نموده و با برخورداری از بالاترین سطح خدمات گارانتی، لذت یک خرید خوب را تجربه نمایند.</p>
                        <p><a class="btn main_bt" href="#">Read More</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>نمونه اسمبل‌های ایزی پی‌سی</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($offeredSystems as $offeredSystem)
                <div class="col-md-4">
                    <div class="full blog_colum">
                        <div class="blog_feature_img"> <img src="{{ asset($offeredSystem->image['indexArray']['medium']) }}" alt="#" /> </div>
                        <div class="post_time">
{{--                            <p><i class="fa fa-clock-o"></i>بودجه سیستم</p>--}}
                            <div class="product_price">
                                <p>شروع قیمت ها از</p>
                                <p><span class="old_price">{{ priceFormat($offeredSystem->price) }}</span> –<br> <span class="new_price">{{ priceFormat($offeredSystem->price) }} تومان </span></p>
                            </div>
                        </div>
                        <div class="blog_feature_head">
{{--                            <h4>{{ $offeredSystems->name }}</h4>--}}
                        </div>
                        <div class="blog_feature_cont">
{{--                            <p>{{ $offeredSystems->brief }}</p>--}}
                        </div>
                        <div class="center">
                            <h4><a href="">برای مشاهده کانفیگ سیستم کلیک کنید</a></h4>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section -->
    <div class="section padding_layout_1" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <ul class="brand_list">
                            @foreach($brands as $brand)
                            <li><img src="{{ asset($brand->logo['indexArray']['small']) }}" alt="#" /></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
