@extends('adminto.layouts.master')

@section('head-tag')
    <title>ایجاد بنر جدید</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ایجاد بنر تبلیغاتی جدید</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST" action="{{ route('adminto.banner.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            value="{{ old('title') }}" id="title" name="title" placeholder="عنوان تبلیغات را وارد کنید">
                                            @error('title')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="link">آدرس</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('url') is-invalid @enderror"
                                            value="{{ old('url') }}" id="url" name="url"
                                            placeholder="آدرس URL را وارد کنید">
                                            @error('url')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="location">مکان تبلیغات</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('position') is-invalid @enderror" name="position"
                                                id="position">
                                                @foreach (\App\Models\Content\Banner::$postBannersPositions as $key => $position)
                                                    <option value="{{ $key }}" @if(old('position') == $key) selected @endif>
                                                        @lang($position)</option>
                                                @endforeach
                                            </select>
                                            @error('position')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image">عکس</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                            id="image" name="image">
                                            @error('image')
                                                <br>
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                @foreach (\App\Models\Content\Banner::$statuses as $status)
                                                    <option value="{{ $status }}" @if(old('status') == $status) selected @endif>
                                                        @if($status == 1) فعال @else غیر فعال @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
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
