@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست ادمین های سیستم</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
@endsection

@section('content')
    @livewire('admin.user.admin-user-table')
@endsection

@section('script')
    <script src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
@endsection
