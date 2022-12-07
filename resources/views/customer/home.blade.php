@extends('customer.layouts.master-one-col')

@section('head-tag')
    <title>{{ $siteSetting->title }}</title>
@endsection

@section('content')

    <!-- start slideshow -->
    <section class="container-xxl my-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        <section class="row">
            <section class="col-md-8 pe-md-1">
                <section id="slideshow" class="owl-carousel owl-theme">

                    @foreach ($slideShowImages as $slideShowImage)

                        <section class="item">
                            <a class="w-100 d-block h-auto text-decoration-none"
                               href="{{ urldecode($slideShowImage->url) }}">
                                <img class="w-100 rounded-2 d-block h-auto" src="{{ asset($slideShowImage->image) }}"
                                     alt="{{ $slideShowImage->title }}">
                            </a>
                        </section>

                    @endforeach

                </section>
            </section>
            <section class="col-md-4 ps-md-1 mt-2 mt-md-0">
                @foreach ($topBanners as $topBanner)
                    <section class="mb-2">
                        <a href="{{ urldecode($slideShowImage->url) }}" class="d-block">
                            <img class="w-100 rounded-2" src="{{ asset($topBanner->image) }}"
                                 alt="{{ $topBanner->title }}">
                        </a>
                    </section>
                @endforeach

            </section>
        </section>
    </section>
    <!-- end slideshow -->


    @if(count($productsWithActiveAmazingSales) > 0)
        <!-- start product lazy load -->
        <section class="mb-4">
            <section class="container-xxl">
                <section class="row">
                    <section class="col">
                        <section class="content-wrapper bg-white p-3 rounded-2">
                            <!-- start content header -->
                            <section class="content-header">
                                <section class="d-flex justify-content-between align-items-center">
                                    <h2 class="content-header-title">
                                        <span>محصولات فروش ویژه</span>
                                    </h2>
                                    <section class="content-header-link">
                                        <a href="{{ route('customer.market.query-products', 'inputQuery=productsWithActiveAmazingSales') }}">مشاهده
                                            همه</a>
                                    </section>
                                </section>
                            </section>
                            <!-- end content header -->
                            <section class="lazyload-wrapper">
                                <section class="lazyload light-owl-nav owl-carousel owl-theme">
                                    @foreach($productsWithActiveAmazingSales as $amazingSale)
                                        @php
                                            $activeAmazingSaleProduct = $amazingSale->product;
                                            $productNewPrice = $activeAmazingSaleProduct->price - ($activeAmazingSaleProduct->price * $amazingSale->percentage / 100);
                                        @endphp
                                        <section class="item">
                                            <section class="lazyload-item-wrapper">
                                                <section class="product">
                                                    @guest
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $activeAmazingSaleProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه از علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endguest
                                                    @auth
                                                        <section class="product-add-to-cart"><a href="#"
                                                                                                data-bs-toggle="tooltip"
                                                                                                data-bs-placement="left"
                                                                                                title="افزودن به سبد خرید"><i
                                                                    class="fa fa-cart-plus"></i></a></section>
                                                        @if ($activeAmazingSaleProduct->user->contains(auth()->user()->id))
                                                            <section class="product-add-to-favorite">
                                                                <button
                                                                    class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $activeAmazingSaleProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                    <i class="fa fa-heart text-danger"></i>
                                                                </button>
                                                            </section>
                                                        @else
                                                            <section class="product-add-to-favorite">
                                                                <button
                                                                    class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $activeAmazingSaleProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                    <i class="fa fa-heart"></i>
                                                                </button>
                                                            </section>
                                                        @endif
                                                    @endauth

                                                    <a class="product-link"
                                                       href="{{ route('customer.market.product', $activeAmazingSaleProduct) }}">
                                                        <section class="product-image">
                                                            <img class=""
                                                                 src="{{ asset($activeAmazingSaleProduct->image['indexArray']['medium']) }}"
                                                                 alt="{{ $activeAmazingSaleProduct->name }}">
                                                        </section>
                                                        <section class="product-colors"></section>
                                                        <section class="product-name">
                                                            <h3>{{ Str::limit($activeAmazingSaleProduct->name, 30) }}</h3>
                                                        </section>
                                                        <section class="product-price-wrapper">
                                                            <section class="product-discount">
                                                                <span class="product-old-price">{{ priceFormat($activeAmazingSaleProduct->price) }} تومان</span>
                                                                <span
                                                                    class="product-discount-amount">% {{ convertEnglishToPersian($amazingSale->percentage) }}</span>
                                                            </section>
                                                            <section
                                                                class="product-price">{{ priceFormat($productNewPrice) }}
                                                                تومان
                                                            </section>
                                                        </section>
                                                        <section class="product-colors">
                                                            @foreach ($activeAmazingSaleProduct->colors()->get() as $color)
                                                                <section class="product-colors-item"
                                                                         style="background-color: {{ $color->color }};"></section>
                                                            @endforeach
                                                        </section>
                                                    </a>
                                                </section>
                                            </section>
                                        </section>
                                    @endforeach
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    @endif
    <!-- start ads section -->
    <section class="">
        <section class="container-xxl">
            <!-- four column-->
            <section class="row py-4">
                @foreach ($fourColumnBanners as $colBanner)
                    <section class="col">
                        <a href="{{ urldecode($colBanner->url) }}">
                            <img class="d-block rounded-2 w-100" src="{{ asset($colBanner->image) }}"
                                 alt="{{ $colBanner->title }}">
                        </a>
                    </section>
                @endforeach
            </section>
        </section>
    </section>
    <!-- end ads section -->

    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پربازدیدترین کالاها</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route('customer.market.query-products', 'inputQuery=mostVisitedProducts') }}">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($mostVisitedProducts as $mostVisitedProduct)

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">

                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest
                                                @auth
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    @if ($mostVisitedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $mostVisitedProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth

                                                <a class="product-link"
                                                   href="{{ route('customer.market.product', $mostVisitedProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="{{ asset($mostVisitedProduct->image['indexArray']['medium']) }}"
                                                             alt="{{ $mostVisitedProduct->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($mostVisitedProduct->name, 30) }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            {{-- <span class="product-old-price">6,895,000 </span> --}}
                                                            {{-- <span class="product-discount-amount">10%</span> --}}
                                                        </section>
                                                        <section
                                                            class="product-price">{{ priceFormat($mostVisitedProduct->price) }}
                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($mostVisitedProduct->colors()->get() as $color)
                                                            <section class="product-colors-item"
                                                                     style="background-color: {{ $color->color }};"></section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->



    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach ($middleBanners as $middleBanner)
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <a href="{{ urldecode($middleBanner->url) }}">
                            <img class="d-block rounded-2 w-100" src="{{ asset($middleBanner->image) }}"
                                 alt="{{ $middleBanner->title }}">
                        </a>
                    </section>
                @endforeach

            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>پیشنهاد آمازون به شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route('customer.market.query-products', 'inputQuery=offerProducts') }}">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($offerProducts as $offerProduct)

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{-- <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section> --}}
                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه به علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest
                                                @auth
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    @if ($offerProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link"
                                                   href="{{ route('customer.market.product', $offerProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="{{ asset($offerProduct->image['indexArray']['medium']) }}"
                                                             alt="{{ $offerProduct->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($offerProduct->name, 30) }}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            {{-- <span class="product-old-price">6,895,000 </span> --}}
                                                            {{-- <span class="product-discount-amount">10%</span> --}}
                                                        </section>
                                                        <section
                                                            class="product-price">{{ priceFormat($offerProduct->price) }}
                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($offerProduct->colors()->get() as $color)
                                                            <section class="product-colors-item"
                                                                     style="background-color: {{ $color->color }};"></section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->


    @if(!empty($bottomBanner))
        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <a href="{{ urldecode($bottomBanner->url) }}">
                            <img class="d-block rounded-2 w-100" src="{{ asset($bottomBanner->image) }}"
                                 alt="{{ $bottomBanner->title }}">
                        </a>
                    </section>
                </section>

            </section>
        </section>
        <!-- end ads section -->

    @endif

    <!-- start product lazy load -->
    <section class="mb-3">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>جدیدترین محصولات</span>
                                </h2>
                                <section class="content-header-link">
                                    <a href="{{ route('customer.market.query-products', 'inputQuery=newestProducts') }}">مشاهده
                                        همه</a>
                                </section>
                            </section>
                        </section>
                        <!-- end content header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">

                                @foreach ($newestProducts as $offerProduct)

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                {{-- <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip" data-bs-placement="left" title="افزودن به سبد خرید"><i class="fa fa-cart-plus"></i></a></section> --}}
                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest
                                                @auth
                                                    <section class="product-add-to-cart"><a href="#"
                                                                                            data-bs-toggle="tooltip"
                                                                                            data-bs-placement="left"
                                                                                            title="افزودن به سبد خرید"><i
                                                                class="fa fa-cart-plus"></i></a></section>
                                                    @if ($offerProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $offerProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link"
                                                   href="{{ route('customer.market.product', $offerProduct) }}">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="{{ asset($offerProduct->image['indexArray']['medium']) }}"
                                                             alt="{{ $offerProduct->name }}">
                                                    </section>
                                                    <section class="product-colors"></section>
                                                    <section class="product-name">
                                                        <h3>{{ Str::limit($offerProduct->name, 30) }}</h3></section>
                                                    <section class="product-price-wrapper">
                                                        <section class="product-discount">
                                                            {{-- <span class="product-old-price">6,895,000 </span> --}}
                                                            {{-- <span class="product-discount-amount">10%</span> --}}
                                                        </section>
                                                        <section
                                                            class="product-price">{{ priceFormat($offerProduct->price) }}
                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($offerProduct->colors()->get() as $color)
                                                            <section class="product-colors-item"
                                                                     style="background-color: {{ $color->color }};"></section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>
                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end product lazy load -->

    <!-- start ads section -->
    <section class="mb-3">
        <section class="container-xxl">
            <!-- two column-->
            <section class="row py-4">
                @foreach ($bottomMiddleBanners as $middleBanner)
                    <section class="col-12 col-md-6 mt-2 mt-md-0">
                        <a href="{{ urldecode($middleBanner->url) }}">
                            <img class="d-block rounded-2 w-100" src="{{ asset($middleBanner->image) }}"
                                 alt="{{ $middleBanner->title }}">
                        </a>
                    </section>
                @endforeach

            </section>

        </section>
    </section>
    <!-- end ads section -->


    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start content header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach ($systemBrands as $brand)

                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="rounded-2"
                                                 src="{{ asset($brand->logo['indexArray']['medium']) }}" alt="">
                                        </a>
                                    </section>
                                </section>

                            @endforeach

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->

    <div class="album py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه سیستم های اسمبل شده</li>
                </ol>
            </nav>
            <div class="card-group">
                @foreach($sampleOfGamingSystemImages as $system)
                    <div class="card">
                        <img src="{{ asset($system->image['indexArray']['medium'] ) }}" class="card-img-top"
                             alt="...">
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    @if(!empty($brandsBanner))
        <!-- start ads section -->
        <section class="mb-3">
            <section class="container-xxl">
                <!-- one column -->
                <section class="row py-4">
                    <section class="col">
                        <a href="{{ urldecode($brandsBanner->url) }}">
                            <img class="d-block rounded-2 w-100" src="{{ asset($brandsBanner->image) }}"
                                 alt="{{ $brandsBanner->title }}">
                        </a>
                    </section>
                </section>

            </section>
        </section>
        <!-- end ads section -->

    @endif

    {{--    <section class="position-fixed p-4 flex-row-reverse"--}}
    {{--             style="z-index: 909999999; right: 0; top: 3rem; width: 26rem; max-width: 80%;">--}}
    {{--        <div class="toast" data-delay="7000" role="alert" aria-live="assertive" aria-atomic="true">--}}
    {{--            <div class="toast-header">--}}
    {{--                <strong class="me-auto">فروشگاه</strong>--}}
    {{--                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>--}}
    {{--            </div>--}}
    {{--            <div class="toast-body">--}}
    {{--                <strong class="ml-auto">--}}
    {{--                    برای افزودن کالا به لیست علاقه مندی ها باید ابتدا وارد حساب کاربری خود شوید--}}
    {{--                    <br>--}}
    {{--                    <a href="{{ route('auth.customer.login-register-form') }}" class="text-dark">--}}
    {{--                        ثبت نام / ورود--}}
    {{--                    </a>--}}
    {{--                </strong>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </section>--}}

@endsection

@section('script')

    <script>
        $('.product-add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#search').on('keyup', function () {
            var searchKey = $(this).val()
            var timer = setTimeout(liveSearch(searchKey), 2000);
        });

        function liveSearch(str) {
            // var url = "/search?name=" + str
            $.ajax({
                url: '{{ route('customer.search') }}',
                type: "GET",
                data: {'search': str},
                success: function (response) {
                    if (response.status) {
                        let products = response.results.products;
                        let categories = response.results.categories;
                        let brands = response.results.brands;
                        if (products != null) {
                            $('#product-search-result').removeClass('d-none').append()
                            $('#product-search-key').innerHTML = response.key
                            products.map((product) => {
                                $('#product-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').text(product.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        if (categories != null) {
                            $('#product-category-search-result').removeClass('d-none')
                            $('#category-search-key').innerHTML = response.key
                            categories.map((category) => {
                                $('#product-category-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').attr('href', '/category/' + category.slug + '/products').text(category.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        if (brands != null) {
                            $('#brand-search-result').removeClass('d-none')
                            $('#brand-search-key').innerHTML = response.key
                            brands.map((brand) => {
                                $('#brand-search-result').append($('<section/>').addClass('search-result-item').append($('<a/>').addClass('text-decoration-none').text(brand.name).append($('<i/>').addClass('fa fa-link'))))
                            })
                        }
                        // $('#product-search-result').empty();

                    } else {
                        console.log(response.key)
                    }
                },
                error: function () {

                }
            })
        }

        // var timer = setTimeout(liveSearch, 2000)
    </script>
@endsection
