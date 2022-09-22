@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        سیستم اسمبل هوشمند
    </title>
@endsection

@section('content')
    <!-- start carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('lion-ezpc-images/main-banner.png') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carousel -->


    <div class="album py-5 bg-light">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h1 class="display-4 text-center">سیستم اسمبل هوشمند</h1>
                <p class="lead text-center text-danger">لطفا متناسب با کاربری دسته بندی موردنطرتون رو انتخاب کنید.</p>
            </div>
        </div>
    </div>

    <div class="album py-5 bg-light">
        <div class="container">

            <!-- start breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item font-size-12"><a href="#"
                                                                class="text-decoration-none text-dark">فروشگاه</a></li>
                    <li class="breadcrumb-item font-size-12"><a href="#" class="text-decoration-none text-dark">سیستم
                            اسمبل هوشمند</a></li>
                    <li class="breadcrumb-item font-size-12 active" aria-current="page"> دسته بندی سیستم ها</li>
                </ol>
            </nav>
            <!-- end breadcrumb -->
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">

                @foreach($systemCategories as $systemCategory)
                    <div class="col">
                        <div class="card shadow-sm">
                            <a class="text-decoration-none text-dark"
                               href="{{ route('smart.assemble.types', $systemCategory) }}">
                                {{--                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225"--}}
                                {{--                                 xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: {{ $systemCategory->name }}"--}}
                                {{--                                 preserveAspectRatio="xMidYMid slice" focusable="false"><title>{{ $systemCategory->name }}</title>--}}
                                {{--                                <rect width="100%" height="100%" fill="#55595c"/>--}}

                                {{--                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $systemCategory->name }}</text>--}}
                                {{--                            </svg>--}}
                                <img src="{{ asset($systemCategory->image['indexArray']['medium']) }}"
                                     class="bd-placeholder-img card-img-top" alt="...">
                                <div class="card-body w-100">
                                    <h5 class="card-title">{{ $systemCategory->name }}</h5>
                                    <p class="card-text">{{ $systemCategory->brief }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        {{--                                    <div class="btn-group">--}}
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">عرض</button>--}}
                                        {{--                                        <button type="button" class="btn btn-sm btn-outline-secondary">تعديل</button>--}}
                                        {{--                                    </div>--}}
                                        {{--                                    <small class="text-muted">9 دقائق</small>--}}
                                    </div>
                                </div>
                                @php
                                    $metas = \App\Models\SmartAssemble\SystemMeta::where('system_category_id', $systemCategory->id)->get();
                                @endphp
                                <ul class="list-group list-group-flush">
                                    @foreach($metas as $meta)
                                        <li class="list-group-item">{{ $meta->meta_value }}</li>
                                    @endforeach
                                </ul>
                                <div class="card-body">
                                    <a type="button" href="{{ route('smart.assemble.types', $systemCategory) }}"
                                       class="btn btn-outline-primary card-link mt-3 d-block">مشاهده سیستم ها</a>
                                    {{--                                                            <a href="#" class="card-link">Card link</a>--}}
                                    {{--                                                            <a href="#" class="card-link">Another link</a>--}}
                                </div>
                            </a>
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
                    <li class="breadcrumb-item font-size-12 active" aria-current="page">نمونه سیستم های اسمبل شده</li>
                </ol>
            </nav>
            <div class="card-group">
                @foreach($offeredSystems as $offeredSystem)
                    <div class="card">
                        <img src="{{ asset($offeredSystem->image['indexArray']['medium'] ) }}" class="card-img-top"
                             alt="...">
                        {{--                        <div class="card-body">--}}
                        {{--                            <h5 class="card-title">Card title</h5>--}}
                        {{--                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to--}}
                        {{--                                additional content. This content is a little bit longer.</p>--}}
                        {{--                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>--}}
                        {{--                        </div>--}}
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- start brand part-->
    <section class="brand-part mb-4 py-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <!-- start vontent header -->
                    <section class="content-header">
                        <section class="d-flex align-items-center">
                            <h2 class="content-header-title">
                                <span>برندهای ویژه</span>
                            </h2>
                        </section>
                    </section>
                    <!-- start vontent header -->
                    <section class="brands-wrapper py-4">
                        <section class="brands dark-owl-nav owl-carousel owl-theme">
                            @foreach ($brands as $brand)

                                <section class="item">
                                    <section class="brand-item">
                                        <a href="#">
                                            <img class="rounded-2"
                                                 src="{{ asset($brand->logo['indexArray']['medium']) }}" alt="">
                                        </a>
                                    </section>
                                </section>

                            @endforeach

                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>
    <!-- end brand part-->
@endsection
