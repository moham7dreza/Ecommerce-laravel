@extends('admin.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#"> تنظیمات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> ویرایش تنظیمات</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش تنظیمات
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.setting.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.setting.update', $setting->id) }}" method="post"
                          enctype="multipart/form-data" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">عنوان سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="title" id="name"
                                           value="{{ old('title', $setting->title) }}">
                                </div>
                                @error('title')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">توضیحات سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="description" id="name"
                                           value="{{ old('description', $setting->description) }}">
                                </div>
                                @error('description')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="name">کلمات کلیدی سایت</label>
                                    <input type="text" class="form-control form-control-sm" name="keywords" id="name"
                                           value="{{ old('keywords', $setting->keywords) }}">
                                </div>
                                @error('keywords')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="image">لوگو</label>
                                    <input type="file" class="form-control form-control-sm" name="logo" id="image">
                                </div>
                                @error('logo')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 col-md-6 my-2">
                                <div class="form-group">
                                    <label for="icon">آیکون</label>
                                    <input type="file" class="form-control form-control-sm" name="icon" id="icon">
                                </div>
                                @error('icon')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="mobile">شماره تماس</label>
                                    <input type="text" class="form-control form-control-sm" name="mobile" id="mobile"
                                           value="{{ old('mobile', json_decode($setting->mobile, true)['mobile']) }}">
                                </div>
                                @error('mobile')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="office_telephone">شماره دفتر</label>
                                    <input type="text" class="form-control form-control-sm" name="office_telephone"
                                           id="office_telephone"
                                           value="{{ old('office_telephone', json_decode($setting->mobile, true)['office_telephone']) }}">
                                </div>
                                @error('office_telephone')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="email">ایمیل</label>
                                    <input type="text" class="form-control form-control-sm" name="email" id="email"
                                           value="{{ old('email', json_decode($setting->email, true)['office_mail']) }}">
                                </div>
                                @error('email')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="instagram">اینستاگرام</label>
                                    <input type="text" class="form-control form-control-sm" name="instagram"
                                           id="instagram"
                                           value="{{ old('instagram',json_decode($setting->social_media, true)['instagram']) }}">
                                </div>
                                @error('instagram')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="telegram">تلگرام</label>
                                    <input type="text" class="form-control form-control-sm" name="telegram"
                                           id="telegram"
                                           value="{{ old('telegram',json_decode($setting->social_media, true)['telegram']) }}">
                                </div>
                                @error('telegram')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="whatsapp">واتس اپ</label>
                                    <input type="text" class="form-control form-control-sm" name="whatsapp"
                                           id="whatsapp"
                                           value="{{ old('whatsapp',json_decode($setting->social_media, true)['whatsapp']) }}">
                                </div>
                                @error('whatsapp')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="youtube">یوتیوب</label>
                                    <input type="text" class="form-control form-control-sm" name="youtube" id="youtube"
                                           value="{{ old('youtube',json_decode($setting->social_media, true)['youtube']) }}">
                                </div>
                                @error('youtube')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <div class="form-group">
                                    <label for="address">آدرس</label>
                                    <textarea name="address" id="address" class="form-control form-control-sm"
                                              rows="6">{{ old('address',json_decode($setting->address, true)['addresses']['central_office']) }}</textarea>
                                </div>
                                @error('address')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                <strong>
                                    {{ $message }}
                                </strong>
                            </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="postal_code">کد پستی</label>
                                    <input type="text" class="form-control form-control-sm" name="postal_code"
                                           id="postal_code"
                                           value="{{ old('postal_code', json_decode($setting->address, true)['postal_code']) }}">
                                </div>
                                @error('postal_code')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="account_number">شماره حساب</label>
                                    <input type="text" class="form-control form-control-sm" name="account_number"
                                           id="account_number"
                                           value="{{ old('account_number',json_decode($setting->bank_account, true)['number']) }}">
                                </div>
                                @error('account_number')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="shaba_number">شماره شبا</label>
                                    <input type="text" class="form-control form-control-sm" name="shaba_number"
                                           id="shaba_number"
                                           value="{{ old('shaba_number',json_decode($setting->bank_account, true)['shaba']) }}">
                                </div>
                                @error('shaba_number')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>

                            <section class="col-md-6">
                                <div class="form-group">
                                    <label for="bank_name">نام بانک</label>
                                    <input type="text" class="form-control form-control-sm" name="bank_name"
                                           id="bank_name"
                                           value="{{ old('bank_name',json_decode($setting->bank_account, true)['name']) }}">
                                </div>
                                @error('bank_name')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                        <strong>
                                            {{ $message }}
                                        </strong>
                                    </span>
                                @enderror
                            </section>


                            <section class="col-12 my-3">
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
        CKEDITOR.replace('address');
    </script>
@endsection
