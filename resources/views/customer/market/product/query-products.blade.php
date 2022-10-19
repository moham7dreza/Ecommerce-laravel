@extends('customer.layouts.master-two-col')
@section('head-tag')
    <title>
        محصولات دسته بندی
    </title>
@endsection
@php
    $user = auth()->user();
@endphp
@section('content')
    <section class="content-wrapper bg-white p-3 rounded-2 mb-2">
        <section class="filters mb-3">
            <span class="d-inline-block border p-1 rounded bg-light">نتیجه جستجو برای : <span
                    class="badge bg-info text-dark">"کتاب اثر مرک"</span></span>
            <span class="d-inline-block border p-1 rounded bg-light">برند : <span
                    class="badge bg-info text-dark">"کتاب"</span></span>
            <span class="d-inline-block border p-1 rounded bg-light">دسته : <span
                    class="badge bg-info text-dark">"کتاب"</span></span>
            <span class="d-inline-block border p-1 rounded bg-light">قیمت از : <span class="badge bg-info text-dark">25,000 تومان</span></span>
            <span class="d-inline-block border p-1 rounded bg-light">قیمت تا : <span class="badge bg-info text-dark">360,000 تومان</span></span>

        </section>
        <section class="sort ">
            <span>مرتب سازی بر اساس : </span>
            <button class="btn btn-info btn-sm px-1 py-0" type="button">جدیدترین</button>
            <button class="btn btn-light btn-sm px-1 py-0" type="button">محبوب ترین</button>
            <button class="btn btn-light btn-sm px-1 py-0" type="button">گران ترین</button>
            <button class="btn btn-light btn-sm px-1 py-0" type="button">ارزان ترین</button>
            <button class="btn btn-light btn-sm px-1 py-0" type="button">پربازدیدترین</button>
            <button class="btn btn-light btn-sm px-1 py-0" type="button">پرفروش ترین</button>
        </section>


        <section class="main-product-wrapper row my-4">

            @foreach($query as $product)
                <section class="col-md-3 p-0">
                    <section class="product">
                        <section class="product-add-to-cart"><a href="#" data-bs-toggle="tooltip"
                                                                data-bs-placement="left" title="افزودن به سبد خرید"><i
                                    class="fa fa-cart-plus"></i></a></section>
                        <section class="product-add-to-favorite"><a href="#" data-bs-toggle="tooltip"
                                                                    data-bs-placement="left"
                                                                    title="افزودن به علاقه مندی"><i
                                    class="fa fa-heart"></i></a></section>
                        <a class="product-link" href="{{ route('customer.market.product', $product) }}">
                            <section class="product-image">
                                <img class="" src="{{ asset($product->image['indexArray']['medium']) }}"
                                     alt="{{ $product->name }}">
                            </section>
                            <section class="product-colors"></section>
                            <section class="product-name"><h3>{{ $product->name }}</h3></section>
                            <section class="product-price-wrapper">
                                <section class="product-price">{{ priceFormat($product->price) }} تومان</section>
                            </section>
                            <section class="product-colors">
                                @foreach ($product->colors()->get() as $color)
                                    <section class="product-colors-item"
                                             style="background-color: {{ $color->color }};"></section>
                                @endforeach
                            </section>
                        </a>
                    </section>
                </section>
            @endforeach

            @if(count($products) > 20)
                <section class="col-12">
                    <section class="my-4 d-flex justify-content-center">
                        <nav>
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </section>
                </section>
            @endif
        </section>

    </section>
@endsection
