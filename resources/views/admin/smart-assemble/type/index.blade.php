@extends('admin.layouts.master')

@section('head-tag')
<title>تعریف انواع سیستم</title>
@endsection

@section('content')

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
        <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">تعریف انواع سیستم</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    تعریف انواع سیستم
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.smart-assemble.type.create') }}" class="btn btn-info btn-sm">ایجاد نوع جدید</a>
                <div class="max-width-16-rem">
                    <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                </div>
            </section>

            <section class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نوع سیستم</th>
                            <th>دسته سیستم</th>
                            <th>خلاصه</th>
{{--                            <th>توضیحات</th>--}}
{{--                            <th>اسلاگ</th>--}}
                            <th>عکس</th>
{{--                            <th>تگ ها</th>--}}
                            <th>وضعیت</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($systemTypes as $systemType)

                        <tr>
                            <th>{{ $loop->iteration }}</th>
                            <td>{{ $systemType->name }}</td>
                            <td>{{ $systemType->system_category_id ? $systemType->category->name : '-' }}</td>
                            <td>{{ $systemType->brief }}</td>
{{--                            <td>{{ $systemType->description }}</td>--}}
{{--                            <td>{{ $systemType->slug }}</td>--}}
                            <td>
                                <img src="{{ asset($systemType->image['indexArray'][$systemType->image['currentImage']] ) }}" alt="" width="100" height="50">
                            </td>
{{--                            <td>{{ $systemType->tags }}</td>--}}
                            <td>
                                <label>
                                    <input id="{{ $systemType->id }}" onchange="changeStatus({{ $systemType->id }})" data-url="{{ route('admin.smart-assemble.type.status', $systemType->id) }}" type="checkbox" @if ($systemType->status === 1)
                                        checked
                                        @endif>
                                </label>
                            </td>
                            @php
                                $systemCategory = \App\Models\SmartAssemble\SystemCategory::where('id', $systemType->system_category_id)->first();
                            @endphp
                            <td class="width-8-rem text-left">
                                <div class="dropdown">
                                    <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-tools"></i> عملیات
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <a href="{{ route('admin.smart-assemble.type.gallery.index', [$systemCategory, $systemType]) }}" class="dropdown-item text-right"><i class="fa fa-images"></i> گالری</a>
                                        <a href="{{ route('admin.smart-assemble.type.edit', $systemType) }}" class="dropdown-item text-right"><i class="fa fa-edit"></i> ویرایش</a>
                                        <form class="d-inline" action="{{ route('admin.smart-assemble.type.destroy', $systemType) }}" method="post">
                                            @csrf
                                            @method('Delete')
                                            <button type="submit" class="dropdown-item text-right"><i class="fa fa-window-close"></i> حذف</button>
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
        function changeStatus(id){
            var element = $("#" + id)
            var url = element.attr('data-url')
            var elementValue = !element.prop('checked');

            $.ajax({
                url : url,
                type : "GET",
                success : function(response){
                    if(response.status){
                        if(response.checked){
                            element.prop('checked', true);
                            successToast('دسته بندی با موفقیت فعال شد')
                        }
                        else{
                            element.prop('checked', false);
                            successToast('دسته بندی با موفقیت غیر فعال شد')
                        }
                    }
                    else{
                        element.prop('checked', elementValue);
                        errorToast('هنگام ویرایش مشکلی بوجود امده است')
                    }
                },
                error : function(){
                    element.prop('checked', elementValue);
                    errorToast('ارتباط برقرار نشد')
                }
            });

            function successToast(message){

                var successToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(successToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }

            function errorToast(message){

                var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                    '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                    '<strong class="ml-auto">' + message + '</strong>\n' +
                    '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                    '<span aria-hidden="true">&times;</span>\n' +
                    '</button>\n' +
                    '</section>\n' +
                    '</section>';

                $('.toast-wrapper').append(errorToastTag);
                $('.toast').toast('show').delay(5500).queue(function() {
                    $(this).remove();
                })
            }
        }
    </script>


    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])


@endsection
