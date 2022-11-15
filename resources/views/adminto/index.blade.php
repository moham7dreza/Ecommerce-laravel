@extends('adminto.layouts.master')

@section('head-tag')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        @include('adminto.layouts.partials.counter')
        @include('adminto.layouts.partials.latest-authors')
        @include('adminto.layouts.partials.latest-posts')
    </div>
@endsection
