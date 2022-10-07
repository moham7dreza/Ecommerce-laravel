<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
</head>
<body>

@include('customer.layouts.header')

{{--<section class="container-xxl body-container">--}}
{{--    @yield('customer.layouts.sidebar')--}}
{{--</section>--}}
<section id="main-body-two-col" class="container-xxl body-container">
    <section class="row">

        @include('customer.layouts.sidebar')

        @include('admin.alerts.alert-section.success')

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
