@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        {{ $post->title }}
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
                                <h1 class="page-title">{{ $post->title }}</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('it-city.home') }}">آیتی سیتی</a></li>
                                    <li><a href="{{ route('it-city.blog.index') }}">بلاگ</a></li>
                                    <li class="active">{{ $post->title }}</li>
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
    <div class="section padding_layout_1 blog_grid rtl text_align_right">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 pull-right">
                    <div class="full">
                        <div class="blog_section margin_bottom_0">
                            <div class="blog_feature_img"><img class="img-responsive"
                                                               src="{{ asset('it-next-assets/images/it_service/post-05.jpg') }}"
                                                               alt="#"></div>
                            <div class="blog_feature_cantant">
                                <p class="blog_head">{{ $post->title }}</p>
                                <div class="post_info">
                                    <ul>
                                        <li><i class="fa fa-user"
                                               aria-hidden="true"></i> {{ $post->postCategory->name ?? '-' }}</li>
                                        <li><i class="fa fa-comment"
                                               aria-hidden="true"></i> {{ $post->comment_count ?? 0 }}</li>
                                        <li><i class="fa fa-calendar"
                                               aria-hidden="true"></i> {{ jalaliDate($post->created_at) }}</li>
                                    </ul>
                                </div>
                                <p>{{ $post->summary ?? '-' }}</p>
                            </div>
                            <div class="full testimonial_simple_say margin_bottom_30_all" style="margin-top:0;">
                                <div class="qoute_testimonial"><i class="fa fa-quote-left" aria-hidden="true"></i></div>
                                <p class="margin_bottom_0"><i>{{ $post->summary ?? '-' }}</i></p>
                                <p class="large_2 theme_color text-danger pt-2">{{ $post->author->fullName ?? '-' }}</p>
                            </div>
                            <p> {{ $post->body ?? '-' }} </p>
                            <div class="bottom_info margin_bottom_30_all">
                                <div class="pull-right">

                                    <div class="social_icon">
                                        <ul>
                                            <li class="fb"><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="twi"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            </li>
                                            <li class="gp"><a href="#"><i class="fa fa-google-plus"
                                                                          aria-hidden="true"></i></a></li>
                                            <li class="pint"><a href="#"><i class="fa fa-pinterest"
                                                                            aria-hidden="true"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="shr">اشتراک گذاری :</div>
                                </div>
                            </div>
                            <div class="comment_section">
                                <div class="pull-left text_align_left">
                                    <div class="full">
                                        <div class="preview_commt"><a class="comment_cantrol preview_commat"
                                                                      href="it_blog_detail.html"> <img
                                                    class="img-responsive"
                                                    src="{{ asset('it-next-assets/images/it_service/post-04.jpg') }}"
                                                    alt="#"> <span><i class="fa fa-angle-left"></i> Previous</span> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="pull-right text_align_right">
                                    <div class="full">
                                        <div class="next_commt"><a class="comment_cantrol preview_commat"
                                                                   href="it_blog_detail.html"> <img
                                                    class="img-responsive"
                                                    src="{{ asset('it-next-assets/images/it_service/post-08.jpg') }}"
                                                    alt="#"> <span>Next <i class="fa fa-angle-right"></i></span> </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="view_commant">
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div class="full"><img class="img-responsive" style="max-width:100px"
                                                               src="images/it_service/client1.png" alt="#"></div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                        <div class="full theme_bg white_fonts command_cont">
                                            <p class="comm_head">Christian Perez <span>April 27,2018</span><a
                                                    class="rply" href="it_blog_detail.html">Reply</a></p>
                                            <p>magine you are 10 years into the future but this time it’s different.
                                                Why? Because starting today you actually
                                                begin making changes in your life. Specific intentional changes are not
                                                easy. They are intentional because these
                                                changes are changes that you are choosing and they are the changes that
                                                will cause you to live the life you want
                                                to live and dream. </p>
                                        </div>
                                        <div class="full">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <div class="full"><img class="img-responsive"
                                                                           style="max-width:100px"
                                                                           src="images/it_service/client2.png" alt="#">
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                    <div class="full command_cont margin_bottom_0">
                                                        <p class="comm_head">Christian Perez
                                                            <span>April 27,2018</span><a class="rply"
                                                                                         href="it_blog_detail.html">Reply</a>
                                                        </p>
                                                        <p>magine you are 10 years into the future but this time it’s
                                                            different. Why? Because starting today you actually
                                                            begin making changes in your life. Specific intentional
                                                            changes are not easy. They are
                                                            intentional because these changes are changes. </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <div class="full"><img class="img-responsive"
                                                                           style="max-width:100px"
                                                                           src="images/it_service/client3.png" alt="#">
                                                    </div>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                                    <div class="full command_cont">
                                                        <p class="comm_head">Christian Perez
                                                            <span>April 27,2018</span><a class="rply"
                                                                                         href="it_blog_detail.html">Reply</a>
                                                        </p>
                                                        <p>magine you are 10 years into the future but this time it’s
                                                            different. Why? Because starting today you actually
                                                            begin making changes in your life. Specific intentional
                                                            changes are not easy. They are
                                                            intentional because these changes are changes. </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                        <div class="full"><img class="img-responsive" style="max-width:100px"
                                                               src="images/it_service/client1.png" alt="#"></div>
                                    </div>
                                    <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                        <div class="full theme_bg white_fonts command_cont">
                                            <p class="comm_head">Christian Perez <span>Sep 27,2017</span><a class="rply"
                                                                                                            href="it_blog_detail.html">Reply</a>
                                            </p>
                                            <p>magine you are 10 years into the future but this time it’s different.
                                                Why? Because starting today you actually
                                                begin making changes in your life. Specific intentional changes are not
                                                easy. They are intentional because these
                                                changes are changes that you are choosing and they are the changes that
                                                will cause you to live the life you want
                                                to live and dream. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="post_commt_form">
                                <h4>POST YOUR COMMENT</h4>
                                <div class="form_section">
                                    <form class="form_contant" action="index.html">
                                        <fieldset class="row">
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Email" type="email" required>
                                            </div>
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Phone" type="text" required>
                                            </div>
                                            <div class="field col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <input class="field_custom" placeholder="Password" type="password"
                                                       required>
                                            </div>
                                            <div class="field col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <textarea class="field_custom" placeholder="Comment"
                                                          required></textarea>
                                            </div>
                                            <div class="center">
                                                <button class="btn main_bt">SUBMIT NOW</button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-left">
                    <div class="side_bar">
                        <div class="side_bar_blog">
                            <h4>SEARCH</h4>
                            <div class="side_bar_search">
                                <div class="input-group stylish-input-group">
                                    <input class="form-control" placeholder="Search" type="text">
                                    <span class="input-group-addon">
                <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span></div>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>ABOUT AUTHOR</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. sed do eiusmod tempor.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore magna aliqua.</p>
                        </div>
                        <div class="side_bar_blog">
                            <h4>RECENT POST</h4>
                            <div class="recent_post">
                                <ul>
                                    <li>
                                        <p class="post_head"><a href="#">How To Look Up</a></p>
                                        <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20,
                                            2017</p>
                                    </li>
                                    <li>
                                        <p class="post_head"><a href="#">Compatible Inkjet Cartridge</a></p>
                                        <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20,
                                            2017</p>
                                    </li>
                                    <li>
                                        <p class="post_head"><a href="#">Treat That Oral Thrush Now</a></p>
                                        <p class="post_date"><i class="fa fa-calendar" aria-hidden="true"></i> Aug 20,
                                            2017</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>CATEGORIES</h4>
                            <div class="categary">
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Change Oil and Filter</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Brake Pads Replacement</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Timing Belt Replacement</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Pre-purchase Car Inspection</a>
                                    </li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> Starter Replacement</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>TAG</h4>
                            <div class="tags">
                                <ul>
                                    <li><a href="#">Bootstrap</a></li>
                                    <li><a href="#">HTML5</a></li>
                                    <li><a href="#">Wordpress</a></li>
                                    <li><a href="#">Bootstrap</a></li>
                                    <li><a href="#">HTML5</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="side_bar_blog">
                            <h4>CATEGORIES</h4>
                            <div class="categary">
                                <ul>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> June (12)</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> January (12)</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> March (12)</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> November (12)</a></li>
                                    <li><a href="#"><i class="fa fa-caret-right"></i> December (12)</a></li>
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
