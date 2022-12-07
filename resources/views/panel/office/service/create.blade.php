@extends('panel.layouts.master')

@section('head-tag')
    <title>ایجاد سرویس جدید</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="row m-1 pb-2 mb-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="page-header breadcrumb-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text">داشبورد</h3>
                                    <span class="lite-text">سرویس ها</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h4 class="header-title">ساخت سرویس جدید</h4>
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" role="form" method="POST"
                                          action="{{ route('panel.office.service.store') }}"
                                          enctype="multipart/form-data" id="form">
                                        @csrf
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="name">عنوان</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       value="{{ old('name') }}" id="name" name="name"
                                                       placeholder="عنوان سرویس را وارد کنید">
                                                @error('name')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="parent_id">سرویس والد</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('parent_id') is-invalid @enderror"
                                                        name="parent_id">
                                                    <option value="">سرویس اصلی</option>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"
                                                                @if(old('parent_id') == $service->id) selected @endif>{{ $service->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('parent_id')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="price">هزینه</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control @error('price') is-invalid @enderror"
                                                       value="{{ old('price') }}" id="price" name="price"
                                                       placeholder="هزینه ارائه سرویس را وارد کنید">
                                                @error('price')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('status') is-invalid @enderror"
                                                        name="status">
                                                    @foreach (\App\Models\ItCity\Office\Service::$statuses as $status)
                                                        <option value="{{ $status }}"
                                                                @if(old('status') == $status) selected @endif>
                                                            @if($status == 1)
                                                                فعال
                                                            @else
                                                                غیر فعال
                                                            @endif</option>
                                                    @endforeach
                                                </select>
                                                @error('status')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="service_availability">قابل ارائه
                                                بودن سرویس</label>
                                            <div class="col-sm-10">
                                                <select
                                                    class="form-control @error('service_availability') is-invalid @enderror"
                                                    name="service_availability">
                                                    <option value="0"
                                                            @if(old('service_availability') == 0) selected @endif>در
                                                        دسترس نیست
                                                    </option>
                                                    <option value="1"
                                                            @if(old('service_availability') == 1) selected @endif>قابل
                                                        دسترس
                                                    </option>
                                                </select>
                                                @error('service_availability')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="category_id">دسته بندی</label>
                                            <div class="col-sm-10">
                                                <select class="form-control @error('category_id') is-invalid @enderror"
                                                        name="category_id">
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}"
                                                                @if(old('category_id') == $category->id) selected @endif>{{ $category->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="tags">تگ ها</label>
                                            <div class="col-sm-10 text-right">
                                                <input type="hidden" class="form-control form-control-sm" name="tags"
                                                       id="tags" value="{{ old('tags') }}">
                                                <select class="select2 form-control form-control-sm" id="select_tags"
                                                        multiple></select>
                                                @error('tags')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="warranty_time">مدت زمان گارانتی
                                                سرویس</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control @error('warranty_time') is-invalid @enderror"
                                                       value="{{ old('warranty_time') }}" id="warranty_time"
                                                       name="warranty_time"
                                                       placeholder="مدت زمان گارانتی را وارد کنید">
                                                @error('warranty_time')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="time_to_give_service">مدت زمان
                                                ارائه سرویس</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control @error('time_to_give_service') is-invalid @enderror"
                                                       value="{{ old('time_to_give_service') }}"
                                                       id="time_to_give_service" name="time_to_give_service"
                                                       placeholder="مدت زمان ارائه سرویس را وارد کنید">
                                                @error('time_to_give_service')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="description">توضیحات
                                                اصلی</label>
                                            <div class="col-sm-10">
                                            <textarea rows="3"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      id="description" name="description"
                                                      placeholder="توضیحات اصلی سرویس را وارد کنید">{{ old('description') }}</textarea>
                                                @error('description')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="image">عکس</label>
                                            <div class="col-sm-10">
                                                <input type="file"
                                                       class="form-control @error('image') is-invalid @enderror"
                                                       id="image" name="image">
                                                @error('image')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-2 col-form-label" for="available_date">تاریخ در دسترس
                                                بودن سرویس</label>
                                            <div class="col-sm-10">
                                                <input type="text"
                                                       class="form-control d-none @error('available_date') is-invalid @enderror"
                                                       id="available_date" name="available_date">
                                                <input type="text"
                                                       class="form-control @error('available_date_view') is-invalid @enderror"
                                                       id="available_date_view">
                                                @error('available_date')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-outline-success">ذخیره</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>

    <script>
        $(document).ready(function () {
            $('#available_date_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
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

@endsection
