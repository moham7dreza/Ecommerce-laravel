@extends('admin.layouts.master')

@section('head-tag')
    <title>دسته بندی</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش فروش</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">دسته بندی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ایجاد دسته بندی</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد دسته بندی
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.market.category.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.market.category.store') }}" method="post"
                          enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="level">سطوح دسته</label>
                                    <select name="level" id="level" class="form-control form-control-sm">
                                        @foreach(\App\Models\Market\ProductCategory::$levels as $level => $value)
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
                                    <label for="">نام دسته</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control form-control-sm">
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
                                    <label for="">دسته والد</label>
                                    <select name="parent_id" id="main-categories" class="form-control form-control-sm"
                                            disabled>
                                        <option value="">دسته اصلی</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if(old('parent_id') == $category->id) selected @endif
                                                    data-url="{{ route('admin.market.category.get-sub-categories', $category) }}">{{ $category->name }}</option>
                                        @endforeach
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
                                    <label for="sub_cat_id">زیر دسته</label>
                                    <select name="sub_cat_id" class="form-control form-control-sm" id="sub-categories"
                                            disabled>
                                        <option value="" selected>زیر دسته را انتخاب کنید</option>
                                    </select>
                                </div>
                                @error('sub_cat_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">توضیحات</label>
                                    <textarea name="description" id="description" class="form-control form-control-sm"
                                              rows="6">
                                    {{ old('description') }}
                                </textarea>
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">تصویر</label>
                                    <input type="file" class="form-control form-control-sm" name="image" id="image">
                                </div>
                                @error('image')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="status">وضعیت</label>
                                    <select name="status" id="" class="form-control form-control-sm" id="status">
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

                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="show_in_menu">نمایش در منو</label>
                                    <select name="show_in_menu" class="form-control form-control-sm"
                                            id="show_in_menu">
                                        <option value="0" @if(old('show_in_menu') == 0) selected @endif>غیرفعال</option>
                                        <option value="1" @if(old('show_in_menu') == 1) selected @endif>فعال</option>
                                    </select>
                                </div>
                                @error('show_in_menu')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="tags">تگ ها</label>
                                    <input type="hidden" class="form-control form-control-sm" name="tags" id="tags"
                                           value="{{ old('tags') }}">
                                    <select class="select2 form-control form-control-sm" id="select_tags" multiple>

                                    </select>
                                </div>
                                @error('tags')
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

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

    <script>
        $(document).ready(function () {
            $('#main-categories').change(function () {
                var element = $('#main-categories option:selected');
                var url = element.attr('data-url');
                $.ajax({
                    url: url,
                    type: "GET",
                    success: function (response) {

                        if (response.status) {
                            let subCategories = response.subCategories;

                            $('#sub-categories').empty();
                            subCategories.map((subCategory) => {
                                $('#sub-categories').append($('<option/>').val(subCategory.id).text(subCategory
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
                $('#main-categories').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '3') {
                $('#main-categories').removeAttr('disabled');
                $('#sub-categories').removeAttr('disabled');
            } else if ($('#level').find(':selected').val() == '1') {
                $('#main-categories').attr('disabled', 'disabled');
                $('#sub-categories').attr('disabled', 'disabled');
            }
        });

    </script>
@endsection

