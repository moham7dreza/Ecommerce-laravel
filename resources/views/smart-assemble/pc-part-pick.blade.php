@extends('smart-assemble.layouts.master')
@section('head-tag')
    <title>
        پی سی پارت پیک
    </title>
@endsection

@section('content')
    @include('smart-assemble.layouts.partials.slider')

    <!-- section heading -->
    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h2>سیستم اسمبل هوشمند</h2>
                            <p class="large">قطعات سیستم تون رو همین حالا با بهترین قیمت خودتون اسمبل کنید.</p>
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
                        <p>Perspiciatis eos quos totam cum minima aut!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i2.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Computer repair</h4>
                        <p>Perspiciatis eos quos totam cum minima aut!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i3.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Mobile service</h4>
                        <p>Perspiciatis eos quos totam cum minima aut!</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="full text_align_center margin_bottom_30 margin_0">
                        <div class="center">
                            <div class="icon"> <img src="images/it_service/i4.png" alt="#" /> </div>
                        </div>
                        <h4 class="theme_color">Network solutions</h4>
                        <p>Perspiciatis eos quos totam cum minima aut!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section contact us -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="contact_us_section">
                            <div class="call_icon"> <img src="images/it_service/phone_icon.png" alt="#" /> </div>
                            <div class="inner_cont">
                                <h2>REQUEST A FREE QUOTE</h2>
                                <p>Get answers and advice from people you want it from.</p>
                            </div>
                            <div class="button_Section_cont"> <a class="btn dark_gray_bt" href="it_contact.html">Contact us</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->

    <!-- section brand -->
    <div class="section padding_layout_1" style="padding: 50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <ul class="brand_list">
                            <li><img src="images/it_service/brand_icon1.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon2.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon3.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon4.png" alt="#" /></li>
                            <li><img src="images/it_service/brand_icon5.png" alt="#" /></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end section -->
@endsection
