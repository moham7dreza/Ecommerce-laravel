@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        آیتی سیتی
    </title>
@endsection

@section('content')

    @include('it-city.layouts.partials.slider')

    @include('it-city.layouts.partials.system-categories')

    @include('it-city.layouts.partials.hardware')

    @include('it-city.layouts.partials.system')

    @include('it-city.layouts.partials.post')

    <x-personnel :personnel="$homeRepo->personnel()"/>

    @include('it-city.layouts.partials.brand')

@endsection
