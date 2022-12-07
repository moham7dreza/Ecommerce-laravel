@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست تبلیغات</title>
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
                            <a href="{{ route('panel.content.banner.create') }}"
                               class="arrow-none btn btn-primary text-white"
                               aria-expanded="false">
                                ساخت تبلیغات جدید
                            </a>
                        </div>
                        <h4 class="mt-0 header-title">لیست تمامی تبلیغات</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس تبلیغات</th>
                                    <th>عنوان تبلیغات</th>
                                    <th>وضعیت</th>
                                    <th>مکان</th>
                                    <th>لینک</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($banners as $banner)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $banner->imagePath() }}" width="80" class="img-thumbnail"
                                                 alt="">
                                        </td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            <span class="badge badge-{{ $banner->cssStatus() }}">
                                                {{ $banner->textStatus() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-info">
                                                {{ $banner->textPosition() }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ $banner->url }}" target="_blank">{{ $banner->url }}</a>
                                        </td>

                                        <td>{{ $banner->getFaCreatedDate() }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('panel.content.banner.edit', $banner->id) }}"
                                                   class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form
                                                    action="{{ route('panel.content.banner.change.status', $banner->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('panel.content.banner.destroy', $banner->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger ml-1 delete">
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
                            {{ $banners->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
