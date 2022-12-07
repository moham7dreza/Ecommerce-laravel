@extends('adminto.layouts.master')

@section('head-tag')
    <title>ایجاد کاربر جدید</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ساخت کاربر جدید</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                @if (count($errors) > 0)
                                    <ul class="alert alert-danger">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                @endif
                                {{--                           <form class="form-horizontal" role="form" method="POST" action="/admin/users"> DONT WRITE THIS FOR ACTION--}}
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('adminto.user.store') }}">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="first_name">نام</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   value="{{ old('first_name') }}" id="first_name" name="first_name"
                                                   placeholder="نام کاربر را وارد کنید">
                                            @error('first_name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="last_name">نام خانوادگی</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('last_name') is-invalid @enderror"
                                                   value="{{ old('last_name') }}" id="last_name" name="last_name"
                                                   placeholder="نام خانوادگی کاربر را وارد کنید">
                                            @error('last_name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="email">ایمیل</label>
                                        <div class="col-sm-10">
                                            <input type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email') }}" id="email" name="email"
                                                   placeholder="ایمیل کاربر را وارد کنید">
                                            @error('email')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="mobile">موبایل</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('mobile') is-invalid @enderror"
                                                   value="{{ old('mobile') }}" id="mobile" name="mobile"
                                                   placeholder="شماره موبایل کاربر را وارد کنید">
                                            @error('mobile')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="password">کلمه عبور</label>
                                        <div class="col-sm-10">
                                            <input type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   value="{{ old('password') }}" id="password" name="password"
                                                   placeholder="رمز عبور کاربر را وارد کنید">
                                            @error('password')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="password_confirmation">تایید کلمه
                                            عبور</label>
                                        <div class="col-sm-10">
                                            <input type="password"
                                                   class="form-control @error('password_confirmation') is-invalid @enderror"
                                                   value="{{ old('password_confirmation') }}" id="password_confirmation"
                                                   name="password_confirmation"
                                                   placeholder="رمز عبور کاربر را وارد کنید">
                                            @error('password_confirmation')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="activation">وضعیت فعال سازی</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('activation') is-invalid @enderror"
                                                    name="activation">
                                                <option value="0" @if(old('activation') == 0) selected @endif>غیرفعال
                                                </option>
                                                <option value="1" @if(old('activation') == 1) selected @endif>فعال
                                                </option>
                                            </select>
                                            @error('activation')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="profile_photo_path">تصویر
                                            پروفایل</label>
                                        <div class="col-sm-10">
                                            <input type="file"
                                                   class="form-control @error('profile_photo_path') is-invalid @enderror"
                                                   id="profile_photo_path" name="profile_photo_path">
                                            @error('profile_photo_path')
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
