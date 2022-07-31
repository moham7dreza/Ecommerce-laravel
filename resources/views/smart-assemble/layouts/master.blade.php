<!doctype html>
<html lang="en">
<head>
    @include('smart-assemble.layouts.head-tag')
    @yield('head-tag')
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"> <img class="loader_animation" src="{{ asset('assemble-assets/images/loaders/loader_1.png') }}" alt="#" /> </div>
<!-- end loader -->
@include('smart-assemble.layouts.header')
@yield('content')
@include('smart-assemble.layouts.search-modal')
@include('smart-assemble.layouts.footer')
@include('smart-assemble.layouts.script')
@yield('script')
</body>
</html>
