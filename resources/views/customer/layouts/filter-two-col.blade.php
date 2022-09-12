<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>
<body>

@include('customer.layouts.header')
<section id="main-body-two-col" class="container-xxl body-container">
    <section class="row">
        {{--    <section class="container-xxl body-container">--}}
        @include('customer.layouts.filter-sidebar')
        {{--    </section>--}}

        @include('admin.alerts.alert-section.success')
        {{--    <main id="main-body-one-col" class="main-body col-md-9">--}}
        <main id="main-body" class="main-body col-md-9">
            @yield('content')

        </main>
    </section>
</section>

@include('customer.layouts.footer')



@include('customer.layouts.script')
@yield('script')
</body>
</html>
