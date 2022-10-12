<!doctype html>
<html class="no-js" lang="">

<head>
    @include('panel.layouts.head-tag')
    @yield('head-tag')
</head>

<body class="rtl persianumber">
<div class="bmd-layout-container bmd-drawer-f-l avam-container animated bmd-drawer-in">

    @include('panel.layouts.header')

    <div id="dw-s1" class="bmd-layout-drawer bg-faded ">
        @include('panel.layouts.sidebar')
    </div>

    <main class="bmd-layout-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </main>
    @include('panel.layouts.script')
    @yield('script')

    <section class="toast-wrapper flex-row-reverse">
        @include('admin.alerts.toast.success')
        @include('admin.alerts.toast.error')
    </section>

    @include('admin.alerts.sweetalert.error')
    @include('admin.alerts.sweetalert.success')
</div>
</body>
</html>
