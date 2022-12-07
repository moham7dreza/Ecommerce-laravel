@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $systemCategory->name. ' ' .$systemType->name. ' ' . $systemCpu->name }}
    </title>
@endsection

@section('content')

    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">{{ $systemCpu->name}}</h1>
                <p class="lead text-center">{{ $systemCpu->description}}</p>
                <p class="lead text-center text-danger">چه کانفیگی از سیستم مدنظر شماست؟</p>
            </div>
        </div>
    </div>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row">
                <!-- start breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">فروشگاه</a>
                        </li>
                        <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم
                                اسمبل هوشمند</a></li>
                        <li class="breadcrumb-item font-size-12"> دسته بندی سیستم ها</li>
                        <li class="breadcrumb-item font-size-12">{{ $systemCategory->name}}</li>
                        <li class="breadcrumb-item font-size-12">{{ $systemType->name}}</li>
                        <li class="breadcrumb-item font-size-12 active" aria-current="page">{{ $systemCpu->name}}</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
            </div>
            <div class="row row-cols-1 row-cols-sm-3 row-cols-md-4 g-3">

                @foreach($systemConfigs as $systemConfig)
                    <div class="col">
                        <div class="card shadow-sm">
                            {{--                                                        @php--}}
                            {{--                                                            $system = \App\Models\SmartAssemble\System::where('system_category_id', $systemCategory->id)->where('system_type_id', $systemType->id)->where('system_gen_id', $systemCpu->id)->where('system_config_id', $systemConfig->id)->first();--}}
                            {{--                                                        @endphp--}}
                            <a href="{{ route('smart.assemble.build', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=> $systemCpu, 'systemConfig'=> $systemConfig]) }}">
                                <img src="{{ asset($systemConfig->image['indexArray']['medium']) }}"
                                     class="bd-placeholder-img card-img-top" alt="...">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $systemConfig->name }}</h5>
                                <p class="card-text">{{ $systemConfig->brief }}</p>
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
                                    <small class="text-muted">{{ priceFormat($systemConfig->start_price_from) }}
                                        <span> تومان</span></small>
                                </div>
                                <a type="button"
                                   href="{{ route('smart.assemble.build', ['systemCategory' => $systemCategory, 'systemType' => $systemType, 'systemCpu'=>$systemCpu, 'systemConfig'=> $systemConfig]) }}"
                                   class="btn btn-outline-primary card-link mt-3 d-block">مشاهده جزيات</a>
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
                    <li class="breadcrumb-item font-size-12"><a href="#"
                                                                class="text-decoration-none text-dark">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم
                            اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه {{ $systemCategory->name}}
                        -{{ $systemType->name }}-{{ $systemCpu->name }}
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
