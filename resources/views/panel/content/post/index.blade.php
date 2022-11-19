@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست پست ها</title>
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
                                    <span class="lite-text">لیست پست های سخت افزاری</span>
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
                        <a href="{{ route('panel.content.post.create') }}" class="arrow-none btn btn-primary text-white" aria-expanded="false">
                            ساخت پست جدید
                        </a>
                    </div>
                    <h4 class="mt-0 header-title">لیست تمامی پست ها</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>عکس پست</th>
                                    <th>عنوان پست</th>
                                    <th>وضعیت</th>
                                    <th>امتیاز</th>
                                    <th>دسته بندی</th>
                                    <th>کاربر</th>
                                    <th>تاریخ ساخت</th>
                                    <th>عملیات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($posts as $post)
                                    <tr class="text-center">
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>
                                            <img src="{{ $post->imagePath() }}" width="80" alt="">
                                        </td>
                                        <td>{{ $post->limitedTitle() }}</td>
                                        <td>
                                            <span class="badge badge-{{ $post->cssStatus() }}">
                                                {{ $post->textStatus() }}
                                            </span>
                                        </td>
                                        <td>{{ $post->rating }} امتیاز </td>
                                        <td>{{ $post->textCategoryName() }}</td>
                                        <td>{{ $post->textAuthorName() }}</td>
                                        <td>{{ $post->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('panel.content.post.edit', $post->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('panel.content.post.change.status', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('panel.content.post.destroy', $post->id) }}" method="POST">
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
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
