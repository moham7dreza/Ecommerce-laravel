@extends('admin.layouts.master')

@section('head-tag')
    <title>مشاهده کانفیگ سیستم</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">پی سی پیک</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> سیستم اسمبل هوشمند</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">سیستم پیشنهادی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">مشاهده کانفیگ سیستم</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        مشاهده کانفیگ سیستم
                    </h5>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-primary">
                            <th>{{ $system->id }}</th>
                            <td class="width-8-rem text-left">
                                <a href="" class="btn btn-dark btn-sm text-white" id="print">
                                    <i class="fa fa-print"></i>
                                    چاپ
                                </a>
                            </td>
                        </tr>

                        <tr class="border-bottom">
                            <th>نام سیستم</th>
                            <td class="text-left font-weight-bolder">
                                {{ $system->name ?? '-' }}
                            </td>
                        </tr>

                        <tr class="border-bottom">
                            <th>قیمت</th>
                            <td class="text-left font-weight-bolder">
                                {{ priceFormat($system->system_price) ?? '-' }}
                            </td>
                        </tr>

                        <tr class="border-bottom">
                            <th>کاربری سیستم</th>
                            <td class="text-left font-weight-bolder">
                                {{ $system->system_user_type ?? '-' }}
                            </td>
                        </tr>

                        <tr class="border-bottom">
                            <th>محبوبیت سیستم</th>
                            <td class="text-left font-weight-bolder">
                                {{ $system->system_rating ?? '-' }} از 10
                            </td>
                        </tr>
                        <tr class="table-primary">
                            <th>کد کالا</th>
                            <td class="text-left font-weight-bolder">
                                شرح کالا
                            </td>
                        </tr>
                        @foreach($items as $item)
                            <tr class="border-bottom">
                                <th>{{ $item->product->category->name }}</th>
                                <td class="text-left font-weight-bolder">
                                    {{ $item->product->name ?? '-' }}   {{ priceFormat($item->product->price) ?? '-' }}
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection
@section('script')

    <script>

        var printBtn = document.getElementById('print');
        printBtn.addEventListener('click', function () {
            printContent('printable');
        })


        function printContent(el) {

            var restorePage = $('body').html();
            var printContent = $('#' + el).clone();
            $('body').empty().html(printContent);
            window.print();
            $('body').html(restorePage);
        }


    </script>

@endsection
