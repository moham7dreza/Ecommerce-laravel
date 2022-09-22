@extends('admin.layouts.master')

@section('head-tag')
<title>کانفیگ سیستم</title>
@endsection

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
      <li class="breadcrumb-item font-size-12"> <a href="#">سیستم پیشنهادی</a></li>
      <li class="breadcrumb-item font-size-12 active" aria-current="page">کانفیگ سیستم</li>
    </ol>
  </nav>


  <section class="row">
    <section class="col-12">
        <section class="main-body-container">
            <section class="main-body-container-header">
                <h5>
                    افزودن کانفیگ جدید برای {{ $system->name  }}
                </h5>
            </section>

            <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                <a href="{{ route('admin.smart-assemble.system.index') }}" class="btn btn-info btn-sm">بازگشت</a>
            </section>

            <section>
                <form action="{{ route('admin.smart-assemble.system.components.store', $system->id) }}" method="post" enctype="multipart/form-data" id="form">
                    @csrf
                    <section class="row">
                            <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="case">کیس</label>
                                <select name="case" class="form-control form-control-sm">
                                    @foreach ($case_category_products as $case)
                                        <option value="{{ $case->id }}"  @if(old('case') == $case->id) selected @endif>{{ $case->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('case')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cpu">پردازنده</label>
                                <select name="cpu" id="" class="form-control form-control-sm">
                                    @foreach ($cpu_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('cpu') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cpu')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="motherboard">مادربرد</label>
                                <select name="motherboard" id="" class="form-control form-control-sm">
                                    @foreach ($mb_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('motherboard') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('motherboard')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ram">حافظه رم</label>
                                <select name="ram" id="" class="form-control form-control-sm">
                                    @foreach ($ram_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('ram') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('ram')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="psu">منبع تغذیه</label>
                                <select name="psu" id="" class="form-control form-control-sm">
                                    @foreach ($psu_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('psu') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('psu')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="hdd">هارد</label>
                                <select name="case" id="" class="form-control form-control-sm">
                                    @foreach ($hdd_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('hdd') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('hdd')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="ssd">حافظه جامد</label>
                                <select name="ssd" id="" class="form-control form-control-sm">
                                    @foreach ($ssd_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('ssd') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('ssd')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="gpu">کارت گرافیک</label>
                                <select name="gpu" id="" class="form-control form-control-sm">
                                    @foreach ($gpu_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('gpu') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('gpu')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

                        <section class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="cooler">خنک کننده پردازنده</label>
                                <select name="cooler" id="" class="form-control form-control-sm">
                                    @foreach ($cooler_category_products as $product)
                                        <option value="{{ $product->id }}"  @if(old('cooler') == $product->id) selected @endif>{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('cooler')
                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                            @enderror
                        </section>

{{--                        <section class="col-12 col-md-6">--}}
{{--                            <div class="form-group">--}}
{{--                                <label for="fan">فن های جانبی کیس</label>--}}
{{--                                <select name="fan" id="" class="form-control form-control-sm">--}}
{{--                                    @foreach ($fan_category->products as $product)--}}
{{--                                        <option value="{{ $product->id }}"  @if(old('fan') == $product->id) selected @endif>{{ $product->name }}</option>--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            @error('fan')--}}
{{--                            <span class="alert_required bg-danger text-white p-1 rounded" role="alert">--}}
{{--                                    <strong>--}}
{{--                                        {{ $message }}--}}
{{--                                    </strong>--}}
{{--                                </span>--}}
{{--                            @enderror--}}
{{--                        </section>--}}

                        <section class="col-12">
                            <button type="submit" class="btn btn-primary btn-sm">ثبت</button>
                        </section>
                    </section>
                </form>
            </section>

        </section>
    </section>
</section>
@endsection
