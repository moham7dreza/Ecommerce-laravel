@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        {{ $system->name }}
    </title>
@endsection

{{--@section('content')--}}
{{--    <form action="{{ route('smart.assemble.builder', [$systemCategory, $systemType, $systemCpu, $systemConfig]) }}" method="post">--}}
{{--        @csrf--}}
{{--        --}}
{{--    </form>--}}
{{--@endsection--}}
@section('content')


    <!-- start cart -->
    <section class="mb-4">
        <section class="container-xxl" >
            <section class="row">
                <section class="col">


                    <section class="row mt-4">

                        <section class="col-md-9 mb-3">
                            <form action="{{ route('smart.assemble.add-system-to-cart', $system) }}" id="add-to-cart" method="post"
                                  class="content-wrapper bg-white p-3 rounded-2">
                                @csrf

                                @foreach($menus as $menu)
                                    @if($menu->parent_id == null)
                                <!-- start vontent header -->
                                <section class="content-header pt-3 pb-2">
                                    <section class="d-flex justify-content-between align-items-center">
                                        <h2 class="content-header-title">
                                            <span> {{ $menu->name }}</span>
                                        </h2>
                                        <section class="content-header-link">
                                            <!--<a href="#">مشاهده همه</a>-->
                                        </section>
                                    </section>
                                </section>@else
                                        <span> {{ $menu->name }}</span>
                                        @php
                                            $system_items = \App\Models\SmartAssemble\SystemItem::where('system_id', $system->id)->where('system_menu_id', $menu->id)->get();
                                    @endphp
                                        @foreach($system_items as $system_item)
                                    <section class="cart-item d-md-flex py-3">
                                        <section class="cart-img align-self-start flex-shrink-1">
                                            <img src="{{ asset($system_item->product->image['indexArray']['medium']) }}"
                                                 alt="">
                                        </section>
                                        <section class="align-self-start w-100">
                                            <p class="fw-bold">{{ $system_item->product->name }}</p>
                                            <p>
                                                @if(!empty($system_item->color))
                                                    <span style="background-color: {{ $cartItem->color->color }};"
                                                          class="cart-product-selected-color me-1"></span>
                                                    <span> {{ $system_item->color->color_name }}</span>
                                                @else
                                                    <span>رنگ منتخب وجود ندارد</span>
                                                @endif
                                            </p>
                                            <p>
                                                @if(!empty($system_item->product->guarantees[0]))
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> {{ $system_item->product->guarantees[0]->name }}</span>
                                                @else
                                                    <i class="fa fa-shield-alt cart-product-selected-warranty me-1"></i>
                                                    <span> گارانتی ندارد</span>
                                                @endif
                                            </p>
                                            <p><i class="fa fa-store-alt cart-product-selected-store me-1"></i> <span>کالا موجود در انبار</span>
                                            </p>
                                            <section>
                                                <section class="cart-product-number d-inline-block ">
                                                    <button class="cart-number cart-number-down" type="button">-
                                                    </button>
                                                    <input class="number" name="number[{{ $system_item->id }}]"
                                                           type="number"
                                                           min="1" max="5" step="1" value="0"
                                                           readonly="readonly">
                                                    <button class="cart-number cart-number-up" type="button">+</button>
                                                </section>
                                                <a class="text-decoration-none ms-4 cart-delete"
                                                   href="{{ route('customer.sales-process.remove-from-cart', $system_item) }}"><i
                                                        class="fa fa-trash-alt"></i> حذف از سبد</a>
                                            </section>
                                        </section>
                                        <section class="align-self-end flex-shrink-1">
                                            @if(!empty($system_item->product->activeAmazingSales()))
                                                <section class="cart-item-discount text-danger text-nowrap mb-1">
                                                    تخفیف {{ 100 }}</section>
                                            @endif
                                            <section
                                                class="text-nowrap fw-bold">
                                                <h6>{{ priceFormat($system_item->product->price) . ' تومان ' }} </h6>
                                            </section>
                                        </section>
                                    </section>
                                        @endforeach
                                    @endif
                                @endforeach
                            </form>

                        </section>

                        <section class="col-md-3">
                            <section class="content-wrapper bg-white p-3 rounded-2 cart-total-price">
                                <section class="d-flex align-items-center font-weight-bold">
                                    <p class="text-dark">{{ $system->name }}</p>
                                    </section>
                                <section class="border-bottom border-danger mb-3"></section>
                                <section class="d-flex justify-content-between align-items-center">
                                    <p class="text-muted">قیمت سیستم</p>
                                    <p class="text-muted"><span id="product_price" data-product-original-price={{ 0 }}>{{ priceFormat($system->system_price) }}</span> <span class="small">تومان</span></p>
                                </section>

                                    <section class="d-flex justify-content-between align-items-center">
                                        <p class="text-muted">تخفیف کالا</p>
                                        <p class="text-danger fw-bolder" id="product-discount-price" data-product-discount-price="{{ 1 }}">{{ 0 }} <span class="small">تومان</span></p>
                                    </section>

                                <section class="border-bottom mb-3"></section>

                                <section class="d-flex justify-content-end align-items-center">
                                    <p class="fw-bolder"><span  id="final-price">{{ priceFormat($system->system_price) }}</span> <span class="small">تومان</span></p>
                                </section>

                                <section class="">
                                    @if($system->system_marketable_number > 0)
                                        <button id="next-level" class="btn btn-danger d-block w-100" onclick="document.getElementById('add-to-cart').submit();">افزودن به سبد خرید</button>
                                    @else
                                        <button id="next-level" class="btn btn-secondary disabled d-block">سیستم نا موجود میباشد</button>
                                    @endif
                                </section>
                            </section>
                        </section>
                    </section>
                </section>
            </section>

        </section>
    </section>
    <!-- end cart -->


    <section class="mb-4">
        <section class="container-xxl">
            <section class="row">
                <section class="col">
                    <section class="content-wrapper bg-white p-3 rounded-2">
                        <!-- start content header -->
                        <section class="content-header">
                            <section class="d-flex justify-content-between align-items-center">
                                <h2 class="content-header-title">
                                    <span>کالاهای مرتبط با سبد خرید شما</span>
                                </h2>
                                <section class="content-header-link">
                                    <!--<a href="#">مشاهده همه</a>-->
                                </section>
                            </section>
                        </section>
                        <!-- start vontent header -->
                        <section class="lazyload-wrapper">
                            <section class="lazyload light-owl-nav owl-carousel owl-theme">


                                @foreach ($relatedProducts as $relatedProduct)

                                    <section class="item">
                                        <section class="lazyload-item-wrapper">
                                            <section class="product">
                                                <section class="product-add-to-cart"><a href="#"
                                                                                        data-bs-toggle="tooltip"
                                                                                        data-bs-placement="left"
                                                                                        title="افزودن به سبد خرید"><i
                                                            class="fa fa-cart-plus"></i></a></section>
                                                @guest
                                                    <section class="product-add-to-favorite">
                                                        <button class="btn btn-light btn-sm text-decoration-none"
                                                                data-url="{{ route('customer.market.add-to-favorite', $relatedProduct) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="left"
                                                                title="اضافه از علاقه مندی">
                                                            <i class="fa fa-heart"></i>
                                                        </button>
                                                    </section>
                                                @endguest
                                                @auth
                                                    @if ($relatedProduct->user->contains(auth()->user()->id))
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $relatedProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="حذف از علاقه مندی">
                                                                <i class="fa fa-heart text-danger"></i>
                                                            </button>
                                                        </section>
                                                    @else
                                                        <section class="product-add-to-favorite">
                                                            <button class="btn btn-light btn-sm text-decoration-none"
                                                                    data-url="{{ route('customer.market.add-to-favorite', $relatedProduct) }}"
                                                                    data-bs-toggle="tooltip" data-bs-placement="left"
                                                                    title="اضافه به علاقه مندی">
                                                                <i class="fa fa-heart"></i>
                                                            </button>
                                                        </section>
                                                    @endif
                                                @endauth
                                                <a class="product-link" href="#">
                                                    <section class="product-image">
                                                        <img class=""
                                                             src="{{ asset($relatedProduct->image['indexArray']['medium']) }}"
                                                             alt="">
                                                    </section>
                                                    <section class="product-name"><h3>{{ $relatedProduct->name }}</h3>
                                                    </section>
                                                    <section class="product-price-wrapper">
                                                        <section
                                                            class="product-price">{{ priceFormat($relatedProduct->price) }}
                                                            تومان
                                                        </section>
                                                    </section>
                                                    <section class="product-colors">
                                                        @foreach ($relatedProduct->colors()->get() as $color)
                                                            <section class="product-colors-item"
                                                                     style="background-color: {{ $color->color }};"></section>
                                                        @endforeach
                                                    </section>
                                                </a>
                                            </section>
                                        </section>
                                    </section>

                                @endforeach

                            </section>
                        </section>
                    </section>
                </section>
            </section>
        </section>
    </section>

@endsection


@section('script')

    <script>
        $(document).ready(function () {
            bill();

            $('.cart-number').click(function () {
                bill();
            })
        })


        function bill() {
            var total_product_price = 0;
            var total_discount = 0;
            var total_price = 0;

            $('.number').each(function () {
                var productPrice = parseFloat($(this).data('product-price'));
                var productDiscount = parseFloat($(this).data('product-discount'));
                var number = parseFloat($(this).val());

                total_product_price += productPrice * number;
                total_discount += productDiscount * number;
            })

            total_price = total_product_price - total_discount;

            $('#total_product_price').html(toFarsiNumber(total_product_price));
            $('#total_discount').html(toFarsiNumber(total_discount));
            $('#total_price').html(toFarsiNumber(total_price));


            function toFarsiNumber(number) {
                const farsiDigits = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                // add comma
                number = new Intl.NumberFormat().format(number);
                //convert to persian
                return number.toString().replace(/\d/g, x => farsiDigits[x]);
            }

        }

    </script>


    <script>
        $('.product-add-to-favorite button').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن از علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

@endsection
