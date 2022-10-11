@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        لیست علاقه مندی ها
    </title>
@endsection

@section('content')

    <section id="main-body-two-col" class="container-xxl body-container mb-5">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <section class="row">

            @include('customer.layouts.partials.profile-sidebar')

            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start content header -->
                    <section class="content-header mb-4">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>لیست علاقه های من</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->

                    @forelse (auth()->user()->products as $product)
                        <section class="cart-item d-flex py-3">
                            <section class="cart-img align-self-start flex-shrink-1"><img
                                    src="{{ asset($product->image['indexArray']['medium']) }}" alt=""></section>
                            <section class="align-self-start w-100">
                                <p class="fw-bold">{{ $product->name }}</p>
                                @php
                                    $colors = $product->colors()->get();
                                @endphp

                                @if($colors->count() != 0)
                                    <p>
                                        {{--                                        @foreach ($colors as $color)--}}
                                        {{--                                        <span style="background-color: {{ $color->color }};"--}}
                                        {{--                                             class="cart-product-selected-color me-1"></span>--}}
                                        {{--                                        <span>{{ $colors->color_name }}</span>--}}
                                        {{--                                        @endforeach--}}
                                        <span style="background-color: {{ $colors->first()->color }};" --}}
                                              class="cart-product-selected-color me-1"></span>
                                        <span>{{ $colors->first()->color_name }}</span>
                                    </p>
                                @else
                                    <p><span>رنگ منتخب وجود ندارد</span></p>
                                @endif

                                @php
                                    $guarantees = $product->guarantees()->get();
                                @endphp
                                @if($guarantees->count() != 0)
                                    <p><i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                        <span>{{ $guarantees->first()->name }}</span>
                                    </p>
                                @else
                                    <p><span>گارانتی منتخب وجود ندارد</span></p>
                                @endif


                                <p>
                                    @if($product->marketable_number > 0)
                                        <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                                    @else
                                        <i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا ناموجود</span>
                                    @endif
                                </p>

                                <section class="remove_product_from_favorite">
                                    <a href="{{ route('customer.profile.favorites.delete', $product) }}"
                                        class="text-decoration-none cart-delete"><i
                                            class="fa fa-trash-alt"></i> حذف
                                        از لیست علاقه ها
                                    </a>
                                </section>
                            </section>
                            <section class="align-self-end flex-shrink-1">
                                <section class="text-nowrap fw-bold"><span>{{ priceFormat($product->price) }}</span>
                                    <span class="small">تومان</span></section>
                            </section>
                        </section>
                    @empty
                        <section class="order-item">
                            <section class="d-flex justify-content-between">
                                <p>محصولی یافت نشد</p>
                            </section>
                        </section>
                    @endforelse
                </section>
            </main>
        </section>
    </section>
@endsection
@section('script')
    <script>
        $('.remove_product_from_favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);

            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {

                    } else if (result.status == 2) {

                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
@endsection
