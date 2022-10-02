<!DOCTYPE html>
<html lang="en">
<head>
    @include('customer.layouts.head-tag')
    @yield('head-tag')
    @livewireStyles
</head>
<body>

    @include('customer.layouts.header')

    <main id="main-body-one-col" class="main-body">

    @yield('content')

    </main>


    @include('customer.layouts.footer')



    @include('customer.layouts.script')
    @yield('script')
    @livewireScripts
</body>
</html>
