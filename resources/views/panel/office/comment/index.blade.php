@extends('panel.layouts.master')

@section('head-tag')
    <title>لیست نظرات</title>
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
                                    <span class="lite-text">لیست نظرات</span>
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
                        <h4 class="mt-0 header-title">لیست تمامی نظرات</h4>
                        <br>
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>نظر</th>
                                    <th>وضعیت</th>
                                    <th>تایید</th>
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
                                        <td>{!! $comment->limitedBody() !!}</td>
                                        <td>
                                            <span class="badge badge-{{ $comment->cssStatus() }}">
                                                {{ $comment->textStatus() }}
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge badge-{{ $comment->cssApprove() }}">
                                                {{ $comment->textApprove() }}
                                            </span>
                                        </td>
                                        <td>{{ $comment->getCommentableName() }}</td>
                                        <td>{{ $comment->answersCount() }}</td>
                                        <td>{{ $comment->textAuthorName() }}</td>
                                        {{--                                        <td>{{ jdate($comment->created_at)->format('Y-m-d') }}</td>--}}
                                        <td>{{ $comment->getFaCreatedDate()}}</td>
                                        <td>
                                            <div class="row">
                                                <form
                                                    action="{{ route('panel.office.comment.change.status', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="btn btn-{{ $comment->btnCssStatus() }} ml-1">
                                                        <i class="fas fa-minus-circle"></i>
                                                    </button>
                                                </form>

                                                <form
                                                    action="{{ route('panel.office.comment.change.approve', $comment->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit"
                                                            class="btn btn-{{ $comment->btnCssApprove() }} ml-1">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </form>

                                                <form action="{{ route('panel.office.comment.destroy', $comment->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-dark ml-1 delete">
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
