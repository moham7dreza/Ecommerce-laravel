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
                            <div class="service_img"> <img class="img-responsive" src="{{ asset('it-next-assets/images/it_service/post-01.jpg') }}" alt="#" /> </div>
                            <div class="service_cont">
                                <h3 class="service_head">{{ $service->name }}</h3>
                                <p>{{ \Illuminate\Support\Str::limit($service->description, 50) }}</p>
                                <div class="bt_cont"> <a class="btn sqaure_bt" href="{{ route('it-city.service.detail', $service) }}">جزئیات سرویس</a> </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- end section -->
    <!-- section staff -->
    <div class="section padding_layout_1 service_list border-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="main_heading text_align_center">
                            <h3>پرسنل ارائه سرویس</h3>
                            <p class="large">کارشناسان ما بارها در مطبوعات معرفی شده اند.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"><img class="img-responsive"
                                                      src="{{ asset('it-next-assets/images/it_service/team-member-1.jpg') }}"
                                                      alt="#"></div>
                        <div class="team_feature_head">
                            <h4>محمدرضا رضایی</h4>
                        </div>
                        <div class="team_feature_social">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                           target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"><img class="img-responsive"
                                                      src="{{ asset('it-next-assets/images/it_service/team-member-2.jpg') }}"
                                                      alt="#"></div>
                        <div class="team_feature_head">
                            <h4>سارا امینی</h4>
                        </div>
                        <div class="team_feature_social">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                           target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"><img class="img-responsive"
                                                      src="{{ asset('it-next-assets/images/it_service/team-member-3.jpg') }}"
                                                      alt="#"></div>
                        <div class="team_feature_head">
                            <h4>سینا حسینی</h4>
                        </div>
                        <div class="team_feature_social">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                           target="_blank"></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="full team_blog_colum">
                        <div class="it_team_img"><img class="img-responsive"
                                                      src="{{ asset('it-next-assets/images/it_service/team-member-2.jpg') }}"
                                                      alt="#"></div>
                        <div class="team_feature_head">
                            <h4>سارا</h4>
                        </div>
                        <div class="team_feature_social">
                            <div class="social_icon">
                                <ul class="list-inline">
                                    <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn"
                                           target="_blank"></a></li>
                                    <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram"
                                           target="_blank"></a></li>
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
