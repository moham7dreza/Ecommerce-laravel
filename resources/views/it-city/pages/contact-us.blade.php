@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        تماس با ما
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
                                <h1 class="page-title">تماس با ما</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('customer.home') }}">خانه</a></li>
                                    <li><a href="{{ route('it-city.pc.smart-assemble.index') }}">اسمبل هوشمند</a></li>
                                    <li class="active">تماس با ما</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->


    <div class="section padding_layout_1">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="full">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 adress_cont margin_bottom_30">
                                <h4>Address One</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
                                <div class="information_bottom left-side margin_bottom_20_all">
                                    <div class="icon_bottom"><i class="fa fa-road" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>Lorem Ipsum is simply dummy text..</h4>
                                        <p>Melbourne Australia</p>
                                    </div>
                                </div>
                                <div class="information_bottom left-side margin_bottom_20_all">
                                    <div class="icon_bottom"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>0011 234 56789</h4>
                                        <p>Mon-Fri 8:30am-6:30pm</p>
                                    </div>
                                </div>
                                <div class="information_bottom left-side">
                                    <div class="icon_bottom"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>Example@gmail.com</h4>
                                        <p>24/7 online support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 adress_cont margin_bottom_30_all">
                                <h4>Address Two</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
                                <div class="information_bottom left-side margin_bottom_20_all">
                                    <div class="icon_bottom"><i class="fa fa-road" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>Lorem Ipsum is simply dummy text..</h4>
                                        <p>Sydney Australia</p>
                                    </div>
                                </div>
                                <div class="information_bottom left-side margin_bottom_20_all">
                                    <div class="icon_bottom"><i class="fa fa-user" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>0011 234 56789</h4>
                                        <p>Mon-Fri 8:30am-6:30pm</p>
                                    </div>
                                </div>
                                <div class="information_bottom left-side">
                                    <div class="icon_bottom"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                                    <div class="info_cont">
                                        <h4>Example@gmail.com</h4>
                                        <p>24/7 online support</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 contant_form">
                                <h4>GET IN TOUCH</h4>
                                <p>Our goal is to provide the best customer service and to answer all of your questions
                                    in a timely manner.</p>
                                <div class="form_section">
                                    <form class="form_contant" action="index.html">
                                        <fieldset>
                                            <div class="row">
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" placeholder="Websire URL" type="text"
                                                           required/>
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" placeholder="Your name" type="text"
                                                           required/>
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" placeholder="Email adress" type="email"
                                                           required/>
                                                </div>
                                                <div class="field col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <input class="field_custom" placeholder="Phone number" type="text"
                                                           required/>
                                                </div>
                                                <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <textarea class="field_custom" placeholder="Messager"
                                                              required></textarea>
                                                </div>
                                                <div class="center"><a class="btn main_bt" href="#">SUBMIT NOW</a></div>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->

@endsection
