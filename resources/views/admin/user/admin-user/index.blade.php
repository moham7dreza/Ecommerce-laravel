@extends('admin.layouts.master')

@section('head-tag')
    <title>کاربران ادمین</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> کاربران ادمین</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        کاربران ادمین
                    </h5>
                </section>
                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.user.admin-user.create') }}" class="btn btn-info btn-sm">ایجاد ادمین
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
                            <th>ایمیل</th>
                            <th>شماره موبایل</th>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th>فعال سازی</th>
                            <th>وضعیت</th>
                            <th>نقش</th>
                            <th>دسترسی ها</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach ($admins as $key => $admin)

                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $admin->email }}</td>
                                <td>{{ $admin->mobile }}</td>
                                <td>{{ $admin->first_name }}</td>
                                <td>{{ $admin->last_name }}</td>
                                <td>
                                    <label>
                                        <input id="{{ $admin->id }}-active" onchange="changeActive({{ $admin->id }})"
                                               data-url="{{ route('admin.user.admin-user.activation', $admin->id) }}"
                                               type="checkbox" @if ($admin->activation === 1)
                                                   checked
                                            @endif>
                                    </label>
                                </td>
                                <td>
                                    <label>
                                        <input id="{{ $admin->id }}" onchange="changeStatus({{ $admin->id }})"
                                               data-url="{{ route('admin.user.admin-user.status', $admin->id) }}"
                                               type="checkbox" @if ($admin->status === 1)
                                                   checked
                                            @endif>
                                    </label>
                                </td>
                                <td>
                                    @if(empty($admin->roles()->get()->toArray()))
                                        <span class="text-danger">برای این کاربر هیچ نقشی تعریف نشده است</span>
                                    @else
                                        @foreach($admin->roles as $role)
                                            {{ $role->name }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if(count($admin->permissions()->get()->toArray()) == 0)
                                        <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                                    @else
                                        @foreach($admin->permissions as $permission)
                                            {{ $permission->name }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="width-8-rem text-left">
                                    <div class="dropdown">
                                        <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle"
                                           role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                           aria-expanded="false">
                                            <i class="fa fa-tools"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a href="{{ route('admin.user.admin-user.role-form', $admin->id) }}"
                                               class="dropdown-item text-right"><i class="fa fa-edit"></i>نقش ها</a>
                                            <a href="{{ route('admin.user.admin-user.edit', $admin->id) }}"
                                               class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                            <form class="d-inline"
                                                  action="{{ route('admin.user.admin-user.destroy', $admin->id) }}"
                                                  method="post">
                                                @csrf
                                                {{ method_field('delete') }}
                                                <button class="delete dropdown-item text-right" type="submit"><i
                                                        class="fa fa-trash-alt"></i> حذف
                                                </button>
                                            </form>
                                        </div>
                                    </div>
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
                            successToast('ادمین  با موفقیت فعال شد')
                        } else {
                            element.prop('checked', false);
                            successToast('ادمین با موفقیت غیر فعال شد')
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


    <script type="text/javascript">
        function changeActive(id) {
            var element = $("#" + id + '-active')
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url: url,
                type: "GET",
                success: function (response) {
                    if (response.status) {
                        if (response.checked) {
                            element.prop('checked', true);
                            successToast('فعال سازی ادمین با موفقیت انجام شد')
                        } else {
                            element.prop('checked', false);
                            successToast('غیر فعال سازی ادمین با موفقیت انجام شد')
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
