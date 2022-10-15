<!doctype html>
<html lang="en">
<head>
    @include('it-city.layouts.head-tag')
    @yield('head-tag')
</head>
<body id="default_theme" class="it_service">
<!-- loader -->
<div class="bg_load"><img class="loader_animation" src="{{ asset('it-next-assets/images/loaders/loader_1.png') }}"
                          alt="#"/></div>
<!-- end loader -->
@include('it-city.layouts.header')

@yield('content')

@include('it-city.layouts.search-modal')

@include('it-city.layouts.footer')

@include('it-city.layouts.script')

@yield('script')
<script>
    function dark() {
        var main_css_link = "{{ asset('it-next-assets/css/colors1.css') }}";
        var dark_css_link = "{{ asset('it-next-assets/css/colors1_dark.css') }}";
        if ( $('#main-dark-color').length === 0 ) { // does not yet exist
            $('#main-color').remove();
            $('<link />', {
                id   : 'main-dark-color',
                rel  : 'stylesheet',
                href : dark_css_link
            }).appendTo('head');

        } else { // exists, remove it
            $('#main-dark-color').remove();
            $('<link />', {
                id   : 'main-color',
                rel  : 'stylesheet',
                href : main_css_link
            }).appendTo('head');
        }
    }
</script>
</body>
</html>
