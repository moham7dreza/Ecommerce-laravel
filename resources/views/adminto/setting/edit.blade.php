@extends('adminto.layouts.master')

@section('head-tag')
    <title>ویرایش تنظیمات</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش تنظیمات - {{ $setting->title }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('adminto.setting.update', $setting->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $setting->id }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title', $setting->title) }}" id="title" title="title">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keywords">کلمات کلیدی</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('keywords') is-invalid @enderror"
                                            value="{{ old('keywords', $setting->keywords) }}" id="keywords" name="keywords">
                                            @error('keywords')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="description">توضیحات</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" class="form-control @error('description') is-invalid @enderror"
                                                      id="description" name="description"
                                            >{{ old('description', $setting->description) }}</textarea>
                                            @error('description')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="logo">لوگو</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                                   id="logo" name="logo">
                                            @error('logo')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="icon">آیکون</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('icon') is-invalid @enderror"
                                                   id="icon" name="icon">
                                            @error('icon')
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
@endsection

@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description');
    </script>
@endsection
