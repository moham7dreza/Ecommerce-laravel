@extends('admin.layouts.master')

@section('head-tag')
    <title>دسترسی های نقش</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">ادمین</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">نقش ها</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        نقش ها
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3  pb-2">
                    <a href="{{ route('admin.user.admin-user.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.user.admin-user.role-update', $user->id) }}" method="post">
                        @csrf
                        @method('put')
                        <section class="row">

                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">نام ادمین</label>
                                            <section>{{ $user->fullName }}</section>
                                        </div>
                                    </section>
                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">آیا ادمین در سامانه اکتیو کرده است؟</label>
                                            <section>{{ $user->activation ? 'فعال است': 'فعال نیست'  }}</section>
                                        </div>
                                    </section>
                                    @php
                                        $userRolesArray = $user->roles->pluck('id')->toArray();
                                    @endphp
                                    @foreach ($roles as $key => $role)

                                        <section class="col-md-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="roles[]"
                                                       value="{{ $role->id }}" id="{{ $role->id }}"
                                                       @if(in_array($role->id, $userRolesArray)) checked @endif/>
                                                <label for="{{ $role->id }}"
                                                       class="form-check-label mr-3 mt-1">{{ $role->name }}</label>
                                            </div>
                                            <div class="mt-2">
                                                @error('roles.' . $key)
                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                      role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </section>

                                    @endforeach


                                    <section class="col-12 col-md-2">
                                        <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                                    </section>

                                </section>
                            </section>

                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
