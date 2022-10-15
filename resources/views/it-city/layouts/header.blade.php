<!-- header -->
<header id="default_header" class="header_style_1">
    <!-- header top -->
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="full">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li> <span class="topbar-label"><i class="fa  fa-home"></i></span> <span class="topbar-hightlight">ارومیه فلکه رودکی</span> </li>
                                <li> <span class="topbar-label"><i class="fa fa-envelope-o"></i></span> <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">me.moham6dreza@gmail.com</a></span> </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right_section_header_top">
                    <div class="float-left">
                        <div class="social_icon">
                            <ul class="list-inline">
                                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="make_appo"> <a class="btn white_btn" href="make_appointment.html">قرار ملاقات بزار</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header top -->
    <!-- header bottom -->
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <!-- logo start -->
                    <div class="logo"> <a href="it_home.html"><img src="{{ asset('it-next-assets/images/logos/it_logo.png') }}" alt="logo" /></a> </div>
                    <!-- logo end -->
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <!-- menu start -->
                    <div class="menu_side">
                        <div id="navbar_menu">
                            <ul class="first-ul">
                                <li> <a class="active" href="{{ route('it-city.home') }}">خانه</a>
                                    <ul class="text-right">
                                        <li><a href="{{ route('customer.home') }}">فروشگاه</a></li>
                                        <li><a href="{{ route('digital-world.technology.index') }}">دنیای دیجیتالی</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('panel.home') }}">پنل</a></li>
                                <li><a onclick="dark()" type="button"><i
                                            class="fa fa-moon-o fa-sm mr-2"></i>حالت شب
                                    </a></li>
                                <li> <a href="#">صفحات سایت</a>
                                    <ul class="text-right">
                                        <li><a href="{{ route('it-city.pages.about-us') }}">درباره ما</a></li>
                                        <li><a href="{{ route('it-city.pages.why-this-shop') }}">چرا این شاپ</a></li>
                                        <li><a href="{{ route('it-city.pages.warranty-rules') }}">شرایط گارانتی</a></li>
                                        <li><a href="{{ route('it-city.pages.installment') }}">خرید اقساطی</a></li>
                                        <li><a href="{{ route('it-city.pages.contact-us') }}">تماس با ما</a></li>
                                        <li><a href="{{ route('it-city.pages.faq') }}">سوالات متداول</a></li>
                                        <li><a href="{{ route('it-city.pages.price') }}">پلن قیمت گذاری</a></li>
                                        <li><a href="{{ route('it-city.pages.career') }}">پرسنل</a></li>
                                        <li><a href="{{ route('it-city.pages.privacy-policy') }}">سیاست های حریم خصوصی</a></li>
                                        <li><a href="{{ route('it-city.pages.make-appointment') }}">ثبت قرار ملاقات</a></li>
                                    </ul>
                                </li>
                                <li> <a href="#">سرویس ها</a>
                                    <ul class="text-right">
                                        <li><a href="{{ route('it-city.service.index') }}">سرویس های کلی</a></li>
                                        <li><a href="{{ route('it-city.service.all-services') }}">همه ی سرویس های قابل ارائه</a></li>
                                    </ul>
                                </li>
                                <li> <a href="it_blog.html">گالری</a>
{{--                                    <ul>--}}
{{--                                        <li><a href="it_blog.html">Blog List</a></li>--}}
{{--                                        <li><a href="it_blog_grid.html">Blog Grid</a></li>--}}
{{--                                        <li><a href="it_blog_detail.html">Blog Detail</a></li>--}}
{{--                                    </ul>--}}
                                </li>
                                <li> <a href="#">محصولات</a>
                                    <ul class="text-right">
                                        <li><a href="it_career.html">سیستم های گیمینگ</a></li>
                                        <li><a href="it_price.html">اداری</a></li>
                                        <li><a href="it_faq.html">رندرینگ</a></li>
                                        <li><a href="it_privacy_policy.html">اقتصادی</a></li>
                                        <li><a href="it_error.html">تریدینگ</a></li>
                                    </ul>
                                </li>
{{--                                <li> <a href="it_shop.html">Shop</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="it_shop.html">Shop List</a></li>--}}
{{--                                        <li><a href="it_shop_detail.html">Shop Detail</a></li>--}}
{{--                                        <li><a href="it_cart.html">Shopping Cart</a></li>--}}
{{--                                        <li><a href="it_checkout.html">Checkout</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li> <a href="it_contact.html">ارتباط با ما</a>--}}
{{--                                    <ul>--}}
{{--                                        <li><a href="it_contact.html">Contact Page 1</a></li>--}}
{{--                                        <li><a href="it_contact_2.html">Contact Page 2</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                        <div class="search_icon">
                            <ul>
                                <li><a href="#" data-toggle="modal" data-target="#search_bar"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
    <!-- header bottom end -->
</header>
<!-- end header -->
