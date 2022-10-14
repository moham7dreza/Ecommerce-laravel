@extends('it-city.layouts.master')
@section('head-tag')
    <title>
        راهنمای خرید
    </title>
@endsection

@section('content')
    <!-- inner page banner -->
    <div id="inner_banner" class="section inner_banner_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div class="title-holder">
                            <div class="title-holder-cell text-right">
                                <h1 class="page-title">راهنمای خرید</h1>
                                <ol class="breadcrumb rtl">
                                    <li><a href="{{ route('customer.home') }}">خانه</a></li>
                                    <li><a href="{{ route('it-city.pc.smart-assemble.index') }}">اسمبل هوشمند</a></li>
                                    <li class="active">راهنمای خرید</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end inner page banner -->

@endsection
