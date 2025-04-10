@extends('admin.layouts.master')

@section('head-tag')
    <title>نقش ها</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش کاربران</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نقش ها</li>
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
                <section class="d-flex flex-column">
                    <section class="d-flex justify-content-between align-items-center mt-2 mb-3 border-bottom pb-2">
                        <a href="{{ route('admin.user.role.create') }}" class="btn btn-info btn-sm">ایجاد نقش جدید</a>
                        <div class="max-width-16-rem">
                            <input type="text" class="form-control form-control-sm form-text" placeholder="جستجو">
                        </div>
                    </section>
                    <section class="d-flex justify-content-between align-items-center mt-2 mb-3 border-bottom pb-2">
                        <div class="mt-5">
                            <form class="d-flex justify-content-between align-items-center"
                                  action="{{ route('admin.user.permissions.import') }}"
                                  enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="">سطوح دسترسی</label>
                                    <input type="file" name="permissions" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm mr-3">بارگذاری</button>
                            </form>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('admin.user.permissions.export') }}" class="btn btn-primary btn-sm">خروجی
                                فایل اکسل</a>
                        </div>
                    </section>
                </section>

                <section class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>نام نقش</th>
                            <th>دسترسی ها</th>
                            <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($roles as $key => $role)

                            <tr>
                                <th>{{ $key + 1 }}</th>
                                <td>{{ $role->name }}</td>
                                <td>
                                    @if(empty($role->permissions()->get()->toArray()))
                                        <span class="text-danger">برای این نقش هیچ سطح دسترسی تعریف نشده است</span>
                                    @else
                                        @foreach($role->permissions as $permission)
                                            {{ $permission->textName() }} <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="width-22-rem text-left">
                                    <a href="{{ route('admin.user.role.permission-form', $role->id) }}"
                                       class="btn btn-success btn-sm"><i class="fa fa-user-graduate"></i></a>
                                    <a href="{{ route('admin.user.role.edit', $role->id) }}"
                                       class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                    <form class="d-inline" action="{{ route('admin.user.role.destroy', $role->id) }}"
                                          method="post">
                                        @csrf
                                        {{ method_field('delete') }}
                                        <button class="btn btn-danger btn-sm delete" type="submit"><i
                                                class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>

                        @endforeach


                        </tbody>
                    </table>
                </section>

            </section>
        </section>
    </section>

@endsection
