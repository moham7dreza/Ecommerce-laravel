@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست دسته بندی خدمات</title>
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
                                    <span class="lite-text">دسته بندی خدمات</span>
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
                            <a href="{{ route('panel.office.category.create') }}"
                               class="btn main f-main btn-block fnt-xs" aria-expanded="false">
                                ساخت دسته بندی جدید
                            </a>
                        </div>
                        <h5 class="mt-0 header-title">لیست تمامی دسته بندی</h5>

                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>عنوان دسته بندی</th>
                                    <th>وضعیت</th>
                                    <th> دسته والد</th>

                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $category->imagePath() }}" width="80">
                                        </td>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            <span class="badge badge-{{ $category->cssStatus() }}">
                                                {{ $category->textStatus() }}
                                            </span>
                                        </td>
                                        <td>{{ $category->textParentName() }}</td>

                                        <td>{{ $category->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('panel.office.category.edit', $category->id) }}"
                                                   class="btn outlined c-main o-main fnt-xxs ml-1">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form
                                                    action="{{ route('panel.office.category.change.status', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form
                                                    action="{{ route('panel.office.category.destroy', $category->id) }}"
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
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
