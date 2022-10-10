@extends('customer.layouts.master-one-col')
@section('head-tag')
    <title>
        پروفایل کاربری
    </title>
@endsection
@php
    $user = auth()->user();
@endphp
@section('content')
    <section id="main-body-two-col" class="container-xxl body-container mb-5">
        <section class="row">
            <aside id="sidebar" class="sidebar col-md-3">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-3">
                    <!-- start sidebar nav-->
                    <section class="sidebar-nav">
                        <section class="sidebar-nav-item">
                    <span class="sidebar-nav-item-title"><a class="p-3"
                                                            href="{{ route('user.orders') }}">سفارش های من</a></span>
                        </section>
                        <section class="sidebar-nav-item">
                    <span class="sidebar-nav-item-title"><a class="p-3"
                                                            href="{{ route('user.addresses') }}">آدرس های من</a></span>
                        </section>
                        <section class="sidebar-nav-item">
                            <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('user.favorites') }}">لیست علاقه مندی</a></span>
                        </section>
                        <section class="sidebar-nav-item">
                    <span class="sidebar-nav-item-title"><a class="p-3"
                                                            href="{{ route('user.profile') }}">ویرایش حساب</a></span>
                        </section>
                        <section class="sidebar-nav-item">
                            <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('auth.customer.logout') }}">خروج از حساب کاربری</a></span>
                        </section>

                    </section>
                    <!--end sidebar nav-->
                </section>

            </aside>
            <main id="main-body" class="main-body col-md-9">
                <section class="content-wrapper bg-white p-3 rounded-2 mb-2">

                    <!-- start content header -->
                    <section class="content-header mb-4">
                        <section class="d-flex justify-content-between align-items-center">
                            <h2 class="content-header-title">
                                <span>اطلاعات حساب</span>
                            </h2>
                            <section class="content-header-link">
                                <!--<a href="#">مشاهده همه</a>-->
                            </section>
                        </section>
                    </section>
                    <!-- end content header -->

                    <section class="d-flex justify-content-end my-4">
                        <a class="btn btn-link btn-sm text-info text-decoration-none mx-1" href="#"
                           data-bs-toggle="modal" data-bs-target="#edit-user-info"><i
                                class="fa fa-edit px-1"></i>ویرایش
                            حساب</a>
                    </section>
                    <!-- start edit address Modal -->
                    <section class="modal fade" id="edit-user-info" tabindex="-1"
                             aria-labelledby="add-address-label" aria-hidden="true">
                        <section class="modal-dialog">
                            <section class="modal-content">
                                <section class="modal-header">
                                    <h5 class="modal-title" id="add-address-label"><i
                                            class="fa fa-plus"></i> ویرایش حساب </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </section>
                                <section class="modal-body">
                                    <form class="row" method="post"
                                          action="{{ route('user.update.info', $user) }}">
                                        @csrf
                                        @method('PUT')


                                        <section class="col-6 mb-2">
                                            <label for="first_name" class="form-label mb-1">نام</label>
                                            <input
                                                value="{{ $user->first_name  }}"
                                                type="text" name="first_name"
                                                class="form-control form-control-sm" id="first_name"
                                                placeholder="نام">
                                        </section>

                                        <section class="col-6 mb-2">
                                            <label for="last_name" class="form-label mb-1">نام
                                                خانوادگی</label>
                                            <input
                                                value="{{ $user->last_name  }}"
                                                type="text" name="last_name"
                                                class="form-control form-control-sm" id="last_name"
                                                placeholder="نام خانوادگی">
                                        </section>

                                        <section class="col-6 mb-2">
                                            <label for="mobile" class="form-label mb-1">ایمیل</label>
                                            <input value="{{ $user->email  ?? $user->email }}"
                                                   type="text" name="email"
                                                   class="form-control form-control-sm" id="email"
                                                   placeholder="ایمیل">
                                        </section>

                                        <section class="col-6 mb-2">
                                            <label for="mobile" class="form-label mb-1">شماره
                                                موبایل</label>
                                            <input value="{{ $user->mobile ?? $user->mobile }}"
                                                   type="text" name="mobile"
                                                   class="form-control form-control-sm" id="mobile"
                                                   placeholder="شماره موبایل">
                                        </section>

                                        <section class="col-6 mb-2">
                                            <label for="mobile" class="form-label mb-1">کد ملی</label>
                                            <input value="{{ $user->national_code  ?? $user->national_code }}"
                                                   type="text" name="national_code"
                                                   class="form-control form-control-sm" id="national_code"
                                                   placeholder="کد ملی">
                                        </section>

                                        <section class="modal-footer py-1">
                                            <button type="submit" class="btn btn-sm btn-primary">
                                                ثبت
                                            </button>
                                            <button type="button" class="btn btn-sm btn-danger"
                                                    data-bs-dismiss="modal">بستن
                                            </button>
                                        </section>
                                    </form>
                                </section>
                            </section>
                        </section>
                    </section>
                    <!-- end edit address Modal -->

                    <section class="row">
                        <section class="col-6 border-bottom mb-2 py-2">
                            <section class="field-title">نام</section>
                            <section class="field-value overflow-auto">{{ $user->first_name }}</section>
                        </section>

                        <section class="col-6 border-bottom my-2 py-2">
                            <section class="field-title">نام خانوادگی</section>
                            <section class="field-value overflow-auto">{{ $user->last_name }}</section>
                        </section>

                        <section class="col-6 border-bottom my-2 py-2">
                            <section class="field-title">شماره تلفن همراه</section>
                            <section class="field-value overflow-auto">{{ $user->mobile }}</section>
                        </section>

                        <section class="col-6 border-bottom my-2 py-2">
                            <section class="field-title">ایمیل</section>
                            <section class="field-value overflow-auto">{{ $user->email }}</section>
                        </section>

                        <section class="col-6 my-2 py-2">
                            <section class="field-title">کد ملی</section>
                            <section class="field-value overflow-auto">{{ $user->national_code }}</section>
                        </section>

                        <section class="col-6 my-2 py-2">
                            <section class="field-title">رمز عبور</section>
                            <section class="field-value overflow-auto"> ---</section>
                        </section>

                    </section>
                </section>
            </main>
        </section>
    </section>
@endsection
