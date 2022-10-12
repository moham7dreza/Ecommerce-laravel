@extends('admin.layouts.master')

@section('head-tag')
    <title>ویرایش کانفیگ سیستم</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"> <a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">پی سی پیک</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#"> سیستم اسمبل هوشمند</a></li>
            <li class="breadcrumb-item font-size-12"> <a href="#">سیستم پیشنهادی</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page">ویرایش کانفیگ سیستم</li>
        </ol>
    </nav>


    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        ویرایش کانفیگ  {{ $system->name  }}
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 border-bottom pb-2">
                    <a href="{{ route('admin.smart-assemble.system.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.smart-assemble.system.components.update', $system->id) }}" method="post" enctype="multipart/form-data" id="form">
                        @csrf
                        <section class="row">
                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="case">کیس</label>
                                    <select name="case" id="" class="form-control form-control-sm">
                                        @foreach ($case_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('case', \App\Models\SmartAssemble\SystemItem::where('name', 'case')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($cpu_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('cpu', \App\Models\SmartAssemble\SystemItem::where('name', 'cpu')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($mb_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('motherboard', \App\Models\SmartAssemble\SystemItem::where('name', 'motherboard')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($ram_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('ram', \App\Models\SmartAssemble\SystemItem::where('name', 'ram')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($psu_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('psu', \App\Models\SmartAssemble\SystemItem::where('name', 'psu')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($hdd_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('hdd', \App\Models\SmartAssemble\SystemItem::where('name', 'hdd')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($ssd_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('ssd', \App\Models\SmartAssemble\SystemItem::where('name', 'ssd')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($gpu_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('gpu', \App\Models\SmartAssemble\SystemItem::where('name', 'gpu')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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
                                        @foreach ($cooler_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('cooler', \App\Models\SmartAssemble\SystemItem::where('name', 'cooler')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
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

                            <section class="col-12 col-md-6">
                                <div class="form-group">
                                    <label for="fan">فن های جانبی کیس</label>
                                    <select name="fan" id="" class="form-control form-control-sm">
                                        @foreach ($fan_category->products as $product)
                                            <option value="{{ $product->id }}"  @if(old('fan', \App\Models\SmartAssemble\SystemItem::where('name', 'fan')->pluck('product_id')->first()) == $product->id) selected @endif>{{ $product->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('fan')
                                <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                                    <strong>
                                        {{ $message }}
                                    </strong>
                                </span>
                                @enderror
                            </section>

                            <section class="col-12">
                                <button class="btn btn-primary btn-sm">ثبت</button>
                            </section>
                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>

@endsection
