<!DOCTYPE html>
<html lang="en">
<head>
    @include('digital-world.layouts.head-tag')
    @yield('head-tag')
</head>
<body>
<!-- LOADER -->
<div id="preloader">
    <img class="preloader" src="images/loader.gif" alt="">
</div><!-- end loader -->
<!-- END LOADER -->

<div id="wrapper">
    @include('digital-world.layouts.header')

    @yield('content')

    @include('digital-world.layouts.footer')

    <div class="dmtop">Scroll to Top</div>

</div>
@include('digital-world.layouts.script')

@yield('script')
</body>
