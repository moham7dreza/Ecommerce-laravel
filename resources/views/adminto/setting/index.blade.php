@extends('adminto.layouts.master')

@section('head-tag')
    <title>تنظیمات</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">

                    <h4 class="mt-0 header-title">تنظیمات سایت</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عنوان</th>
                                <th>توضیحات</th>
                                <th>کلمات کلیدی</th>
                                <th>لوگو</th>
                                <th>آیکون</th>
                                <th>تاریخ ویرایش</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--                                @foreach($setting as $setting)--}}
                            <tr class="text-center">
                                <th scope="row">
                                    {{--                                            {{ $loop->iteration }}--}}
                                    3
                                </th>
                                <td>{{ $setting->title }}</td>
                                <td>{{ $setting->description }}</td>
                                <td>{{ $setting->keywords }}</td>
                                <td>
                                    <img src="{{ $setting->logo() }}" width="80">
                                </td>
                                <td>
                                    <img src="{{ $setting->icon() }}" width="80">
                                </td>

                                <td>{{ jalaliDate($setting->updated_at) }}</td>
                                <td>
                                    <div class="row">
                                        <a href="{{ route('adminto.setting.edit', $setting->id) }}"
                                           class="btn btn-warning">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                            {{--                                @endforeach--}}
                            </tbody>
                        </table>
                        {{--                        {{ $setting->links() }}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
