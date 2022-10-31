@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد منو</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">منو</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ایجاد منو</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد منو
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.content.menu.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.menu.store') }}" method="post">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">جایگاه منو</label>
                                    <select name="location" id="location" class="form-control form-control-sm">
                                        <option value="">جایگاه منو را انتخاب کنید.</option>
                                        @foreach(\App\Models\Content\Menu::$locations as $location => $value)
                                            <option value="{{ $location }}"
                                                    @if(old('menu_location') == $value) selected @endif
                                                    data-url="{{ route('admin.content.menu.get-menus', $location) }}">
                                                {{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('location')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">عنوان منو</label>
                                    <input type="text" name="name" class="form-control form-control-sm"
                                           value="{{ old('name') }}">
                                </div>
                                @error('name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="level">سطوح منو</label>
                                    <select name="level" id="level" class="form-control form-control-sm">
                                        @foreach(\App\Models\Content\Menu::$levels as $level => $value)
                                            <option value="{{ $level }}"
                                                    @if(old('level') == $level) selected @endif>{{ $value }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('level')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="parent_id">منو والد</label>
                                    <select name="parent_id" id="main-menus" class="form-control form-control-sm"
                                            disabled>
                                        <option value="" selected> منوی اصلی را انتخاب کنید.</option>
                                    </select>
                                </div>
                                @error('parent_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="url">آدرس URL</label>
                                    <input type="text" name="url" value="{{ old('url') }}"
                                           class="form-control form-control-sm text-left">
                                </div>
                                @error('url')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="sub_menu_id">زیر منو</label>
                                    <select name="sub_menu_id" class="form-control form-control-sm" id="sub-menus"
                                            disabled>
                                        <option value="" selected>زیر منو را انتخاب کنید</option>
                                    </select>
                                </div>
                                @error('sub_menu_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" class="form-control form-control-sm" id="status">
                                        <option value="0" @if(old('status') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('status') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('status')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
@section('script')
    <script>
        $(document).ready(function () {
            $('#location').change(function () {
                var element = $('#location option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {
                        console.log(response);
                        if (response.status) {
                            let menus = response.menus;
                            $('#main-menus').empty();
                            menus.map((menu) => {
                                const menu_id = menu.id;

                                var data_url = "{{ route('admin.content.menu.get-sub-menus', 1) }}"
                                $('#main-menus').append($('<option/>').val(menu.id).text(menu.name)
                                    .attr('data-url', data_url)
                                )
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function () {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })
    </script>
    <script>
        $(document).ready(function () {
            $('#main-menus').change(function () {
                var element = $('#main-menus option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                        if (response.status) {
                            let subMenus = response.subMenus;
                            console.log(subMenus);
                            $('#sub-menus').empty();
                            subMenus.map((subMenu) => {
                                $('#sub-menus').append($('<option/>').val(subMenu.id).text(subMenu
                                    .name))
                            })
                        } else {
                            errorToast('خطا پیش آمده است')
                        }
                    },
                    error: function () {
                        errorToast('خطا پیش آمده است')
                    }
                })
            })
        })
    </script>

    <script>
        $("#level").change(function () {

            if ($('#level').find(':selected').val() == '2') {
                $('#main-menus').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '3') {
                $('#main-menus').removeAttr('disabled');
                $('#sub-menus').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '1') {
                $('#main-menus').attr('disabled', 'disabled');
                $('#sub-menus').attr('disabled', 'disabled');
            }
        });

    </script>
@endsection
