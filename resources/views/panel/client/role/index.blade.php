@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست مقام ها</title>
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
                                    <span class="lite-text">لیست نقش ها</span>
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
                            <a href="{{ route('panel.client.role.create') }}"
                               class="arrow-none btn btn-primary text-white" aria-expanded="false">
                                ساخت مقام جدید
                            </a>
                        </div>
                        <h4 class="mt-0 header-title">لیست تمامی مقام ها</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عنوان مقام</th>
                                    <th>توضیحات</th>
                                    <th>دسترسی های مقام</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $role)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->limitedDescription() }}</td>
                                        <td>
                                            @foreach ($role->permissions as $permission)
                                                <span class="badge badge-primary">
                                                    {{ $permission->textName() }}
                                                </span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $role->cssStatus() }}">
                                                {{ $role->textStatus() }}
                                            </span>
                                        </td>
                                        <td>{{ $role->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('panel.client.role.edit', $role->id) }}"
                                                   class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('panel.client.role.change.status', $role->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('panel.client.role.destroy', $role->id) }}"
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
                            {{ $roles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
