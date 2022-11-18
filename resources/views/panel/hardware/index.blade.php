@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست قطعات سخت افزاری</title>
@endsection

@section('content')
    <div class="container-fluid">
        <!-- breadcrumb -->
        <div class="row m-1 pb-2 mb-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="page-header breadcrumb-header">
                    <div class="row align-items-end">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text">داشبورد</h3>
                                    <span class="lite-text">دسته بندی قطعات سخت افزاری</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="card shade h-100">
                    <div class="card-body">
                        <div class="float-left cart-title">
                        <a href="{{ route('panel.hardware.create') }}" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت سخت‌افزار جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی قطعات سخت افزاری</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>عنوان</th>
                                    <th>وضعیت</th>
                                    <th>قیمت</th>
                                    <th>دسته بندی</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($hardwares as $hardware)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $hardware->imagePath() }}" width="80">
                                        </td>
                                        <td>{{ $hardware->limitedName() }}</td>
                                        <td>
                                            <span class="badge badge-{{ $hardware->cssStatus() }}">
                                                {{ $hardware->textStatus() }}
                                            </span>
                                        </td>
                                        <td>{{ $hardware->getFaPrice() }}</td>
                                        <td>{{ $hardware->textCategoryName() }}</td>
                                        <td>{{ $hardware->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('panel.hardware.edit', $hardware->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('panel.hardware.change.status', $hardware->id) }}" method="hardware">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('panel.hardware.destroy', $hardware->id) }}" method="hardware">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ml-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <hr>
                        {{ $hardwares->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
