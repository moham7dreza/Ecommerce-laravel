@extends('adminto.layouts.master')

@section('head-tag')
    <title>لیست پست ها</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <div class="float-right">
                        <a href="{{ route('adminto.post.create') }}" class="arrow-none btn btn-primary text-white" aria-expanded="false">
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

                                    <th>زمان خوندن</th>
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
                                            <img src="{{ $post->imagePath() }}" width="80">
                                        </td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            <span class="badge badge-{{ $post->cssStatus() }}">
                                                @lang($post->status)
                                            </span>
                                        </td>

                                        <td>{{ $post->time_to_read }} دقیقه </td>
                                        <td>{{ $post->rating }} امتیاز </td>
                                        <td>{{ $post->category->name }}</td>
                                        <td>{{ $post->author->fullName }}</td>
                                        <td>{{ jdate($post->created_at)->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="row">
                                                <a href="{{ route('adminto.post.edit', $post->id) }}" class="btn btn-warning">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <form action="{{ route('adminto.post.change.status', $post->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-dark ml-1">
                                                        <i class="fas fa-spinner"></i>
                                                    </button>
                                                </form>
                                                <form action="{{ route('adminto.post.destroy', $post->id) }}" method="POST">
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
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
