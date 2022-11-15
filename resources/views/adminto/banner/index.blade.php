@extends('adminto.layouts.master')

@section('head-tag')
    <title>لیست تبلیغات</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('adminto.banner.create') }}" class="arrow-none btn btn-primary text-white" aria-expanded="false">
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
                                            <img src="{{ $banner->imagePath() }}" width="80" class="img-thumbnail">
                                        </td>
                                        <td>{{ $banner->title }}</td>
                                        <td>
                                            <span class="badge badge-info">
                                                @lang($banner->position)
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ $banner->url }}" target="_blank">{{ $banner->url }}</a>
                                        </td>

                                        <td>{{ jdate($banner->created_at)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('adminto.banner.edit', $banner->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('adminto.banner.destroy', $banner->id) }}" method="POST">
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
                        {{ $banners->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
