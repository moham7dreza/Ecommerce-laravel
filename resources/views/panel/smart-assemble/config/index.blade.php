@extends('admin.layouts.master')

@section('head-tag')
    <title>کانفیگ سیستم</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">پی سی پیک</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> سیستم اسمبل هوشمند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">کانفیگ سیستم</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کانفیگ سیستم
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.smart-assemble.config.create') }}" class="btn btn-info btn-sm">ایجاد کانفیگ
                        جدید</a>
                    <div class="max-width-16-rem">
                        <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                    </div>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>کانفیگ سیستم</th>
                            <th>نسل سیستم</th>
                            <th>نوع سیستم</th>
                            <th>دسته سیستم</th>
                            <th>شروع قیمت از</th>
                            {{--                            <th>خلاصه</th>--}}
                            {{--                            <th>توضیحات</th>--}}
                            {{--                            <th>اسلاگ</th>--}}
                            <th>عکس</th>
                            {{--                            <th>تگ ها</th>--}}
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($systemConfigs as $systemConfig)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $systemConfig->name.'-'.$systemConfig->ram_gen }}</td>
                                <td>{{ $systemConfig->system_gen_id ? $systemConfig->system_cpu->name : '-' }}</td>
                                <td>{{ $systemConfig->system_type_id ? $systemConfig->system_type->name : '-'}}</td>
                                <td>{{ $systemConfig->system_category_id ? $systemConfig->category->name : '-' }}</td>
                                <td>{{ $systemConfig->start_price_from }}</td>
                                {{--                            <td>{{ $systemConfig->brief }}</td>--}}
                                {{--                            <td>{{ $systemConfig->description }}</td>--}}
                                {{--                            <td>{{ $systemConfig->slug }}</td>--}}
                                <td>
                                    <img
                                        src="{{ asset($systemConfig->image['indexArray'][$systemConfig->image['currentImage']] ) }}"
                                        alt="" width="100" height="50">
                                </td>
                                {{--                            <td>{{ $systemConfig->tags }}</td>--}}
                                <td>
                                    <label>
                                        <input id="{{ $systemConfig->id }}"
                                               onchange="changeStatus({{ $systemConfig->id }})"
                                               data-url="{{ route('admin.smart-assemble.config.status', $systemConfig->id) }}"
                                               type="checkbox" @if ($systemConfig->status === 1)
                                                   checked
                                            @endif>
                                    </label>
                                </td>
                                <td class="width-16-rem text-left">
                                    <a href="{{ route('admin.smart-assemble.config.edit', $systemConfig->id) }}"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> ویرایش</a>
                                    <form class="d-inline"
                                          action="{{ route('admin.smart-assemble.config.destroy', $systemConfig->id) }}"
                                          method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                class="fa fa-trash-alt"></i> حذف
                                        </button>
                                    </form>
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

    <script type="text/javascript">
        function changeStatus(id) {
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    } else {
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error: function () {
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message) {

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }

            function errorToast(message) {

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function () {
                    $(this).remove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])

@endsection
