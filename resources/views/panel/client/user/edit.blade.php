@extends('adminto.layouts.master')

@section('head-tag')
    <title>ویرایش کاربر</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش کاربر {{ $user->fullName }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('adminto.user.update', $user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="first_name">نام</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   value="{{ old('first_name', $user->first_name) }}" id="first_name"
                                                   name="first_name">
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
                                                   value="{{ old('last_name', $user->last_name) }}" id="last_name"
                                                   name="last_name">
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
                                                   value="{{ old('email', $user->email) }}" id="email" name="email">
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
                                                   value="{{ old('mobile', $user->mobile) }}" id="mobile" name="mobile">
                                            @error('mobile')
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
                                                <option value="0"
                                                        @if(old('activation', $user->activation) == 0) selected @endif>
                                                    غیرفعال
                                                </option>
                                                <option value="1"
                                                        @if(old('activation', $user->activation) == 1) selected @endif>
                                                    فعال
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
