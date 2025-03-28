<!-- start header -->
<header class="header mb-4">

    <!-- start top-header logo, search box and cart -->
    <section class="top-header">
        <section class="container-xxl ">
            <section class="d-md-flex justify-content-md-between align-items-md-center py-3">
                <section class="d-flex justify-content-between align-items-center d-md-block">
                    <a class="text-decoration-none" href="{{ route('customer.home') }}"><img src="{{ asset($logo) }}"
                                                                                             alt="logo"></a>
                    <button class="btn btn-link text-dark d-md-none" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="fa fa-bars me-1"></i>
                    </button>
                </section>

                <section class="mt-3 mt-md-auto search-wrapper">
                    <section class="search-box">
                        <section class="search-textbox">
                            <span><i class="fa fa-search"></i></span>
                            <input id="search" type="text" class="" placeholder="جستجو ..." autocomplete="off">
                            {{--                                   onkeyup="liveSearch(this.value)">--}}
                        </section>
                        <section class="search-result visually-hidden" id="search-result">
                            <section id="product-category-search-result" class="d-none">
                                <section class="search-result-title">نتایج جستجو برای <span class="search-words"
                                                                                            id="category-search-key"></span><span
                                        class="search-result-type">در دسته بندی ها</span></section>
                                <section class="search-result-item d-none" id="product-category-search-result-item">
                                    <a class="text-decoration-none" href="#">
                                        <i class="fa fa-link"></i>
                                    </a>
                                </section>
                            </section>

                            <section id="brand-search-result" class="d-none">
                                <section class="search-result-title">نتایج جستجو برای <span class="search-words"
                                                                                            id="brand-search-key"></span><span
                                        class="search-result-type">در برندها</span></section>
                                <section class="search-result-item d-none"><a class="text-decoration-none" href="#"><i
                                            class="fa fa-link"></i> برند شیائومی</a></section>
                            </section>
                            <section id="product-search-result" class="d-none">
                                <section class="search-result-title">نتایج جستجو برای <span class="search-words"
                                                                                            id="product-search-key"></span><span
                                        class="search-result-type">در کالاها</span></section>
                                <section class="search-result-item d-none"><span
                                        class="search-no-result">موردی یافت نشد</span>
                                </section>
                            </section>
                        </section>
                    </section>
                </section>

                <section class="mt-3 mt-md-auto text-end">
                    <section class="d-inline px-md-3">
                        @auth
                            <button class="btn btn-link text-decoration-none text-dark dropdown-toggle profile-button"
                                    type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                <i class="fa fa-user"></i>
                            </button>
                            <section class="dropdown-menu dropdown-menu-end custom-drop-down"
                                     aria-labelledby="dropdownMenuButton1">
                                <section><a class="dropdown-item" href="{{ route('customer.profile.info') }}"><i
                                            class="fa fa-user-circle"></i>پروفایل کاربری</a></section>
                                <section><a class="dropdown-item" href="{{ route('customer.profile.orders') }}"><i
                                            class="fa fa-newspaper"></i>سفارشات</a></section>
                                <section><a class="dropdown-item" href="{{ route('customer.profile.favorites') }}"><i
                                            class="fa fa-heart"></i>لیست علاقه مندی</a></section>
                                <section>
                                    <hr class="dropdown-divider">
                                </section>
                                <section><a class="dropdown-item" href="{{ route('admin.home') }}"><i
                                            class="fa fa-heart"></i>پنل ادمین</a></section>
                                <section>
                                    <section><a class="dropdown-item" href="{{ route('panel.home') }}"><i
                                                class="fa fa-heart"></i>پنل جدید</a></section>
                                    <section>
                                        <hr class="dropdown-divider">
                                    </section>
                                    <section><a class="dropdown-item" href="{{ route('auth.customer.logout') }}"><i
                                                class="fa fa-sign-out-alt"></i>خروج</a></section>

                                </section>
                                @endauth


                                @guest
                                    <a href="{{ route('auth.customer.login-register-form') }}"
                                       class="btn btn-link text-decoration-none text-dark profile-button">
                                        <i class="fa fa-user-lock"></i>
                                    </a>
                                @endguest
                            </section>


                            @auth

                                <section class="header-cart d-inline ps-3 border-start position-relative">
                                    <a class="btn btn-link position-relative text-dark header-cart-link"
                                       href="{{ route('customer.sales-process.cart') }}">
                                        <i class="fa fa-shopping-cart"></i> <span style="top: 80%;"
                                                                                  class="position-absolute start-0 translate-middle badge rounded-pill bg-danger">{{ $cartItems->count() }}</span>
                                    </a>
                                    <section class="header-cart-dropdown">
                                        <section class="border-bottom d-flex justify-content-between p-2">
                                            <span class="text-muted">{{ $cartItems->count() }} کالا</span>
                                            <a class="text-decoration-none text-info"
                                               href="{{ route('customer.sales-process.cart') }}">مشاهده سبد خرید </a>
                                        </section>
                                        <section class="header-cart-dropdown-body">

                                            @php
                                                $totalProductPrice = 0;
                                                $totalDiscount = 0;
                                            @endphp

                                            @foreach ($cartItems as $cartItem)
                                                @php
                                                    $totalProductPrice += $cartItem->cartItemProductPrice();
                                                    $totalDiscount += $cartItem->cartItemProductDiscount();
//                                                @endphp


                                                <section
                                                    class="header-cart-dropdown-body-item d-flex justify-content-start align-items-center">
                                                    <img class="flex-shrink-1"
                                                         src="{{ asset($cartItem->product->image['indexArray']['medium']) }}"
                                                         alt="">
                                                    <section class="w-100 text-truncate"><a
                                                            class="text-decoration-none text-dark"
                                                            href="{{ route('customer.market.product', $cartItem->product) }}">{{ $cartItem->product->name }}</a>
                                                    </section>
                                                    <section class="flex-shrink-1"><a
                                                            class="text-muted text-decoration-none p-1"
                                                            href="{{ route('customer.sales-process.remove-from-cart', $cartItem) }}"><i
                                                                class="fa fa-trash-alt"></i></a></section>
                                                </section>

                                            @endforeach


                                        </section>
                                        <section
                                            class="header-cart-dropdown-footer border-top d-flex justify-content-between align-items-center p-2">
                                            <section class="">
                                                <section>مبلغ قابل پرداخت</section>
                                                <section> {{ priceFormat($totalProductPrice - $totalDiscount) }}تومان
                                                </section>
                                            </section>
                                            <section class=""><a class="btn btn-danger btn-sm d-block"
                                                                 href="{{ route('customer.sales-process.cart') }}">ثبت
                                                    سفارش</a>
                                            </section>
                                        </section>
                                    </section>
                                </section>
                            @endauth
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end top-header logo, search box and cart -->


    <!-- start menu -->
    <nav class="top-nav">
        <section class="container-xxl ">
            <nav class="">
                <section class="d-none d-md-flex justify-content-md-start position-relative">

                    <section class="super-navbar-item me-4">
                        <section class="super-navbar-item-toggle">
                            <i class="fa fa-bars me-1"></i>
                            دسته بندی کالاها
                        </section>
                        <section class="sublist-wrapper position-absolute w-100">
                            <section class="position-relative sublist-area">
                                @foreach($categories as $category)
                                    <section class="sublist-item">
                                        <section class="sublist-item-toggle">{{ $category->name }}</section>
                                        <section class="sublist-item-sublist">
                                            <section
                                                class="sublist-item-sublist-wrapper d-flex justify-content-around align-items-center">
                                                @foreach($category->children as $subCategory)
                                                    @if($subCategory->status == 1)
                                                        <section class="sublist-column col">
                                                            <a href="{{ route('customer.market.category.products', $subCategory) }}"
                                                               class="sub-category">{{ $subCategory->name }}</a>
                                                            @if(count($subCategory->children) > 0)
                                                                @foreach($subCategory->children as $child)
                                                                    @if($child->status == 1)
                                                                        <a href="{{ route('customer.market.category.products', $child) }}"
                                                                           class="sub-sub-category">{{ $child->name }}</a>
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                        </section>
                                                    @endif
                                                @endforeach
                                            </section>
                                        </section>
                                    </section>
                                @endforeach
                            </section>
                        </section>
                    </section>
                    <section class="border-start my-2 mx-1"></section>
                    @foreach($menus as $menu)
                        <section class="navbar-item">
                            {{--                            {{ $menu }}--}}
                            <a href="{{ $menu->url }}">{{ $menu->name }}</a>
                        </section>
                        {{--                    <section class="navbar-item"><a href="#">سوپرمارکت</a></section>--}}
                        {{--                    <section class="navbar-item"><a href="#">تخفیف ها و پیشنهادها</a></section>--}}
                        {{--                    <section class="navbar-item"><a href="#">آمازون من</a></section>--}}
                        {{--                    <section class="navbar-item"><a href="#">آمازون پلاس</a></section>--}}
                        {{--                        <section class="navbar-item"><a href="#">درباره ما</a></section>--}}
                        {{--                        <section class="navbar-item"><a href="#">فروشنده شوید</a></section>--}}
                        {{--                        <section class="navbar-item"><a href="#">فرصت های شغلی</a></section>--}}
                        {{--                        <section class="navbar-item"><a href="#"></a></section>--}}
                        {{--                        <section class="navbar-item"><a href="{{ route('customer.market.products.offers') }}">فروش--}}
                        {{--                                ویژه</a>--}}
                        {{--                        </section>--}}

                        {{--                        <section class="navbar-item"><a href="{{ route('smart.assemble.categories') }}">اسمبل هوشمند</a>--}}
                        {{--                        </section>--}}
                        {{--                        <section class="navbar-item"><a href="{{ route('digital-world.home') }}">دنیای--}}
                        {{--                                دیجیتالی</a></section>--}}
                        {{--                        <section class="navbar-item"><a href="{{ route('it-city.home') }}">آیتی سیتی</a></section>--}}
                    @endforeach
                </section>


                <!--mobile view-->
                <section class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
                         aria-labelledby="offcanvasExampleLabel" style="z-index: 9999999;">
                    <section class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel"><a class="text-decoration-none"
                                                                                  href="{{ route('customer.home') }}"><img
                                    src="{{ asset($logo) }}" alt="logo"></a></h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                    </section>
                    <section class="offcanvas-body">

                        <section class="navbar-item"><a href="#">سوپرمارکت</a></section>
                        <section class="navbar-item"><a href="#">تخفیف ها و پیشنهادها</a></section>
                        <section class="navbar-item"><a href="#">آمازون من</a></section>
                        <section class="navbar-item"><a href="#">آمازون پلاس</a></section>
                        <section class="navbar-item"><a href="#">درباره ما</a></section>
                        <section class="navbar-item"><a href="#">فروشنده شوید</a></section>
                        <section class="navbar-item"><a href="#">فرصت های شغلی</a></section>


                        <hr class="border-bottom">
                        <section class="navbar-item"><a href="javascript:void(0)">دسته بندی</a></section>
                        <!-- start sidebar nav-->
                        <section class="sidebar-nav mt-2 px-3">

                            <section class="sidebar-nav-item">
                                <span class="sidebar-nav-item-title">کالای دیجیتال <i
                                        class="fa fa-angle-left"></i></span>
                                <section class="sidebar-nav-sub-wrapper">

                                    <section class="sidebar-nav-sub-item">

                                        <span class="sidebar-nav-sub-item-title"><a href="#">لوازم جانبی موبایل</a><i
                                                class="fa fa-angle-left"></i></span>
                                        <section class="sidebar-nav-sub-sub-wrapper">

                                            <section class="sidebar-nav-sub-sub-item"><a href="#">هندزفری</a></section>

                                        </section>
                                    </section>

                                </section>
                            </section>

                        </section>
                        <!--end sidebar nav-->

                    </section>
                </section>

            </nav>
        </section>
    </nav>
    <!-- end menu -->
</header>
<!-- end header -->
