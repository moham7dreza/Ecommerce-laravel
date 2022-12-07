@extends('adminto.layouts.master')

@section('head-tag')
    <title>لیست نظرات</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">لیست تمامی نظرات</h4>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-striped mb-0">
                            <thead>
                            <tr class="text-center">
                                <th>#</th>
                                <th>عنوان نظرات</th>
                                <th>وضعیت</th>
                                <th>برای</th>
                                <th>تعداد پاسخ ها</th>
                                <th>کاربر</th>
                                <th>تاریخ ساخت</th>
                                <th>عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{!! \Illuminate\Support\Str::limit($comment->body, 50) !!}</td>
                                    <td>
                                            <span class="badge badge-dark">
                                                @lang($comment->status)
                                            </span>
                                    </td>
                                    <td>{{ $comment->commentable->title }}</td>
                                    <td>{{ $comment->answers->count() }}</td>
                                    <td>{{ $comment->user->fullName }}</td>
                                    {{--                                        <td>{{ jdate($comment->created_at)->format('Y-m-d') }}</td>--}}
                                    <td>{{ jalaliDate($comment->created_at) }}</td>
                                    <td>
                                        <div class="row">
                                            <form action="{{ route('adminto.comment.change.status', $comment->id) }}"
                                                  method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-dark ml-1">
                                                    <i class="fas fa-minus-circle"></i>
                                                </button>
                                            </form>

                                            <form action="{{ route('adminto.comment.destroy', $comment->id) }}"
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
                        {{ $comments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    @include('admin.alerts.sweetalert.delete-confirm', ['className' => 'delete'])
@endsection
