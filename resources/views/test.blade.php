<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
</head>
<body class="container mx-auto px-4 flex items-center justify-center h-full bg-gradient-to-r from-red-500 to-indigo-600">
<section dir="rtl" class="">
    @livewire('admin.user.admin-user-table')
</section>

<script src="{{ asset('js/app.js') }}"></script>
@livewireScripts
</body>
</html>
