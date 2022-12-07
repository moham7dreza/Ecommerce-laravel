@extends('adminto.layouts.master')

@section('head-tag')
    <title>ویرایش نقش - {{ $role->name }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش مقام {{ $role->name }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('adminto.role.update', $role->id) }}">
                                    @csrf
                                    @method('PATCH')

                                    {{--                                    @foreach($errors->all() as $err)--}}
                                    {{--                                        <li>{{ $err }}</li>--}}
                                    {{--                                    @endforeach--}}
                                    <input type="hidden" name="id" value="{{ $role->id }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="name">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $role->name) }}" id="name" name="name">
                                            @error('name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="description">توضیحات</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3"
                                                      class="form-control @error('description') is-invalid @enderror"
                                                      id="description" name="description"
                                            >{{ old('description', $role->description) }}</textarea>
                                            @error('description')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">وضعیت</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                    name="status">
                                                @foreach (\App\Models\User\Role::$statuses as $status)
                                                    <option value="{{ $status }}"
                                                            @if(old('status', $role->status) == $status) selected @endif>
                                                        @if($status == 1)
                                                            فعال
                                                        @else
                                                            غیر فعال
                                                        @endif</option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row justify-content-end">
                                        <div class="col-sm-12">
                                            @foreach ($permissions as $permission)
                                                <div class="checkbox checkbox-primary">
                                                    <input id="permission[{{ $permission->id }}]" type="checkbox"
                                                           name="permissions[{{ $permission->id }}]"
                                                           value="{{ $permission->id }}"
                                                           @if ($role->hasPermissionTo($permission)) checked @endif>
                                                    <label for="permission[{{ $permission->id }}]">
                                                        @lang($permission->name)
                                                    </label>
                                                </div>
                                            @endforeach
                                            @error('permissions')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-outline-success">ذخیره</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
