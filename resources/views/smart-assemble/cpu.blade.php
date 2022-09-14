@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name. ' ' .$systemType->name }}
    </title>
@endsection

@section('content')
    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">{{ $systemType->name}}</h1>
                <p class="lead text-center">{{ $systemType->description}}</p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach($systemCpus as $systemCpu)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a href="{{ route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu]) }}">
                                <img src="{{ asset($systemCpu->image['indexArray']['medium']) }}"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $systemCpu->name }}</h5>
                                <p class="card-text">{{ $systemCpu->brief }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">A second item</li>
                                <li class="list-group-item">A third item</li>
                            </ul>
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    {{--                                        <div class="btn-group">--}}
                                    {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>--}}
                                    {{--                                            <button type="button" class="btn btn-sm btn-outline-secondary">تعديل--}}
                                    {{--                                            </button>--}}
                                    {{--                                        </div>--}}
                                    <label for="">شروع قیمت</label>
                                    <small class="text-muted">{{ priceFormat($systemCpu->start_price_from) }}<span> تومان</span></small>
                                </div>
                                <a type="button"
                                   href="{{ route('smart.assemble.configs', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu]) }}"
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
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه {{ $systemCategory->name}}-{{ $systemType->name }}
                        اسمبل شده
                    </li>
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
