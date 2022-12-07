@extends('adminto.layouts.master')

@section('head-tag')
    <title>ویرایش منو - {{ $menu->name }}</title>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش منو - {{ $menu->name }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('adminto.menu.update', $menu->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="name">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $menu->name) }}" id="name" name="name">
                                            @error('name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="keywords">لینک</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('url') is-invalid @enderror"
                                                   value="{{ old('url', $menu->url) }}" id="url" name="url">
                                            @error('url')
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
                                                @foreach (\App\Models\Content\Menu::$statuses as $status)
                                                    <option value="{{ $status }}"
                                                            @if(old('status', $menu->status) == $status) selected @endif>
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
                                        <label class="col-sm-2 col-form-label" for="parent_id">منوی والد</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('parent_id') is-invalid @enderror"
                                                    name="parent_id">
                                                <option value="" selected>منوی اصلی</option>
                                                @foreach ($menus as $menu)
                                                    <option value="{{ $menu->id }}"
                                                            @if(old('parent_id', $menu->parent_id) == $menu->id) selected @endif>{{ $menu->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
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
