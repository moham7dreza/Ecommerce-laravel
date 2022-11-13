<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    @include('adminto.layouts.head-tag') {{-- Load Css --}}
    @yield('head-tag')
</head>
<body>
<div id="wrapper">
    @include('adminto.layouts.navbar') {{-- Load Navbar --}}
    @include('adminto.layouts.sidebar') {{-- Load Sidebar --}}
    <div class="content-page">
        <div class="content">
            @yield('content')
        </div>
        @include('adminto.layouts.footer')
    </div>
</div>
<div class="rightbar-overlay"></div>
@include('adminto.layouts.script') {{-- Load Js --}}
@yield('script')
</body>
</html>
