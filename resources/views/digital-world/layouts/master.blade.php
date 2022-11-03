<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('digital-world.layouts.head-tag')
    @yield('head-tag')
</head>
<body>
<!-- Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center">
                <img class="jump mb-50" src="{{ asset('news-viral-assets/imgs/loading.svg') }}" alt="loading">
                <h6>در حال بارگذاری</h6>
                <div class="loader">
                    <div class="bar bar1"></div>
                    <div class="bar bar2"></div>
                    <div class="bar bar3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-wrap">
    <!--Offcanvas sidebar-->
    @include('digital-world.layouts.sidebar')

    <!-- Main Header -->
    @include('digital-world.layouts.header')

    <!-- Main Wrap Start -->
    @yield('content')

    <!-- Footer Start-->
    @include('digital-world.layouts.footer')
</div>
<div class="dark-mark"></div>
@include('digital-world.layouts.script')
@yield('script')
</body>
</html>
