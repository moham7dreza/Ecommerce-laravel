@extends('admin.layouts.master')

@section('head-tag')
    <title>ایجاد کانفیگ جدید</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">پی سی پیک</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> سیستم اسمبل هوشمند</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ایجاد کانفیگ جدید</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ایجاد کانفیگ جدید
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.smart-assemble.config.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.smart-assemble.config.store') }}" method="post"
                          enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">کانفیگ سیستم</label>
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
                                    <label for="ram_gen">نسل رم</label>
                                    <select name="ram_gen" id="" class="form-control form-control-sm">
                                        <option value="DDR3">DDR3</option>
                                        <option value="DDR4" selected>DDR4</option>
                                        <option value="DDR5">DDR5</option>
                                    </select>
                                </div>
                                @error('ram_gen')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب نسل سیستم</label>
                                    <select name="system_gen_id" id="" class="form-control form-control-sm">
                                        @foreach ($cpus as $cpu)
                                            <option value="{{ $cpu->id }}"
                                                    @if(old('system_gen_id') == $cpu->id) selected @endif>{{ $cpu->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('system_gen_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب نوع سیستم</label>
                                    <select name="system_type_id" id="" class="form-control form-control-sm">
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                    @if(old('system_type_id') == $type->id) selected @endif>{{ $type->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('system_type_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="">انتخاب دسته سیستم</label>
                                    <select name="system_category_id" id="" class="form-control form-control-sm">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if(old('system_category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                @error('system_category_id')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="start_price_from">شروع قیمت از</label>
                                    <input type="text" name="start_price_from" value="{{ old('start_price_from') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('start_price_from')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="">خلاصه</label>
                                    <input type="text" name="brief" value="{{ old('brief') }}"
                                           class="form-control form-control-sm">
                                </div>
                                @error('brief')
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
                                    <select name="show_in_menu" id="" class="form-control form-control-sm"
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
                            <section class="col-12 border-top border-bottom py-3 mb-3">

                                <section class="row meta-product">

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_key[]" class="form-control form-control-sm"
                                                   placeholder="ویژگی ...">
                                        </div>
                                        @error('meta_key.*')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                        @enderror
                                    </section>

                                    <section class="col-6 col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="meta_value[]" class="form-control form-control-sm"
                                                   placeholder="مقدار ...">
                                        </div>
                                        @error('meta_value.*')
                                        <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                        @enderror
                                    </section>

                                </section>

                                <section>
                                    <button type="button" id="btn-copy" class="btn btn-success btn-sm">افزودن</button>
                                </section>


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
        $(function () {
            $("#btn-copy").on('click', function () {
                var ele = $(this).parent().prev().clone(true);
                $(this).before(ele);
            })
        })
    </script>
@endsection

