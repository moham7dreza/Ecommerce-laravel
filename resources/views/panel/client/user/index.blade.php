@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست کاربران</title>
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
                                    <span class="lite-text">بخش کاربران</span>
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
                        <a href="{{ route('panel.client.user.create') }}" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت کاربر جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی کاربران</h4>

                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس</th>
                                    <th>نام کاربری</th>
                                    <th>ایمیل</th>
                                    <th>مقام ها</th>
                                    <th>سطوح دسترسی</th>
                                    <th>وضعیت تایید ایمیل</th>
                                    <th>تاریخ عضویت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $user->image() }}" width="80" alt="">
                                        </td>
                                        <td>{{ $user->fullName }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <ul style="list-style: none;">
                                                @foreach ($user->roles as $role)
                                                    <li>
                                                        {{ $role->name }}
                                                        <a href="#"
                                                        onclick="event.preventDefault(); document.getElementById('delete-role-{{ $role->id }}').submit()">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </a>
                                                    </li>
                                                    <form method="POST" id="delete-role-{{ $role->id }}"
                                                    action="{{ route('panel.client.user.role-remove', ['userId' => $user->id, 'roleId' => $role->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
                                            <ul style="list-style: none;">
                                                @foreach ($user->permissions as $permission)
                                                    <li>
                                                        {{ $permission->textName() }}
                                                        <a href="#"
                                                           onclick="event.preventDefault(); document.getElementById('delete-permission-{{ $permission->id }}').submit()">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </a>
                                                    </li>
                                                    <form method="POST" id="delete-permission-{{ $permission->id }}"
                                                          action="{{ route('panel.client.user.permission-remove', ['userId' => $user->id, 'permissionId' => $permission->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>
{{--                                            <span class="badge badge-@if($user->email_verified_at)success @elseif(! $user->email_verified_at)danger @endif">--}}
                                            <span class="badge badge-{{ $user->cssStatusEmailVerifiedAt() }}">
                                                {{ $user->textStatusEmailVerifiedAt() }}
                                            </span>
                                        </td>
                                        <td>{{ $user->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
{{--                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">ویرایش</a>--}}
{{--                                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-danger ml-1">حذف</a>--}}
                                                <a href="{{ route('panel.client.user.edit', $user->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a href="{{ route('panel.client.user.add-roles', $user->id) }}" class="btn btn-success ml-1">
                                                    <i class="fas fa-plus"></i>
                                                </a>
                                                <form action="{{ route('panel.client.user.destroy', $user->id) }}" method="POST">
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
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
