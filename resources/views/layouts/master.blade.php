<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('livewire.digital-world.layouts.head-tag')
    @yield('head-tag')

    {{--    <script src="{{ asset('js/app.js') }}"></script>--}}
    <title>دنیای دیجیتالی</title>
    @livewireStyles
</head>
<body>

<div class="main-wrap">
    <!--Offcanvas sidebar-->
    @livewire('digital-world.layouts.sidebar')

    <!-- Main Header -->
    @livewire('digital-world.layouts.header')

    <!-- Main Wrap Start -->
    {{ $slot }}

    <!-- Footer Start-->
    @livewire('digital-world.layouts.footer')
</div>

<div class="dark-mark"></div>

@include('livewire.digital-world.layouts.script')
@yield('script')

@livewireScripts
{{--<script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false" data-turbo-eval="false"></script>--}}
<script>
    window.livewire.on('showAlert', function (message) {
        Swal.fire({
            position: 'top-start',
            icon: 'success',
            title: message,
            showConfirmButton: false,
            timer: 1500
        })
    })
</script>
@include('sweetalert::alert')

</body>
</html>
