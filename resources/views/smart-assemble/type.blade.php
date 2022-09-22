@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name}}
    </title>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">{{ $systemCategory->name}}</h1>
                <p class="lead text-center">{{ html_entity_decode($systemCategory->description) }}</p>
                <p class="lead text-center text-danger">کلاس سیستم موردنظر خود را انتخاب کنید.</p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">

<div class="row">
            <!-- start breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12"> دسته بندی سیستم ها</li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">{{ $systemCategory->name}}</li>
                </ol>
            </nav>
            <!-- end breadcrumb -->
</div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                @foreach($systemTypes as $systemType)
                    <div class="col">

                        <div class="card shadow-sm">
                            <a class="text-dark text-decoration-none" href="{{ route('smart.assemble.cpus', ['systemCategory' => $systemCategory, 'systemType' => $systemType]) }}">
                                {{--                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"--}}
                                {{--                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: {{ $systemCategory->name }}"--}}
                                {{--                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $systemCategory->name }}</title>--}}
                                {{--                                <rect width="100%" height="100%" fill="#55595c"/>--}}

                                {{--                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $systemCategory->name }}</text>--}}
                                {{--                            </svg>--}}
                                <img src="{{ asset($systemType->image['indexArray']['medium']) }}"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $systemType->name }}</h5>
                                    <p class="card-text">{{ $systemType->brief }}</p>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">پردازنده</li>
                                    <li class="list-group-item">بازی</li>
                                    <li class="list-group-item">وارزون</li>
                                </ul>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{--                                        <div class="btn-group">--}}
                                        {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>--}}
                                        {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">تعديل--}}
                                        {{--                                            </button>--}}
                                        {{--                                        </div>--}}
                                        <label for="">شروع قیمت</label>
                                        <small class="text-muted">{{ priceFormat($systemType->start_price_from) }}<span> تومان</span></small>
                                    </div>
                                    <a type="button" href="{{ route('smart.assemble.cpus', ['systemCategory' => $systemCategory, 'systemType' => $systemType]) }}"
                                       class="btn btn-outline-primary card-link mt-3 d-block">مشاهده سیستم ها</a>
                                </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#">سیستم اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه {{ $systemCategory->name}} اسمبل شده</li>
                </ol>
            </nav>
            <div class="card-group">
                @foreach($offeredSystems as $offeredSystem)
                    <div class="card">
                        <img src="{{ asset($offeredSystem->image['indexArray']['medium'] ) }}" class="card-img-top"
                             alt="...">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
