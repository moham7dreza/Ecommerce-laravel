@extends('adminto.layouts.master')

@section('head-tag')
    <title>ویرایش پست</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش پست - {{ $post->title }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST"
                                      action="{{ route('adminto.post.update', $post->id) }}"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="id" value="{{ $post->id }}">
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="title">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                                   value="{{ old('title', $post->title) }}" id="title" name="title">
                                            @error('title')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="time_to_read">زمان برای خوانده
                                            شدن</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('time_to_read') is-invalid @enderror"
                                                   value="{{ old('time_to_read', $post->time_to_read) }}"
                                                   id="time_to_read" name="time_to_read"
                                                   placeholder="زمان برای خوانده شدن مقاله را وارد کنید">
                                            @error('time_to_read')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">وضعیت مقاله</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('status') is-invalid @enderror"
                                                    name="status">
                                                @foreach (\App\Models\Content\Post::$statuses as $status)
                                                    <option @if (old('status', $post->status) === $status) selected
                                                            @endif
                                                            value="{{ $status }}">
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
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="commentable">امکان درج نظر</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('commentable') is-invalid @enderror"
                                                    name="commentable">
                                                <option value="0"
                                                        @if(old('commentable', $post->commentable) == 0) selected @endif>
                                                    غیرفعال
                                                </option>
                                                <option value="1"
                                                        @if(old('commentable', $post->commentable) == 1) selected @endif>
                                                    فعال
                                                </option>
                                            </select>
                                            @error('commentable')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="type">نوع پست</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('type') is-invalid @enderror"
                                                    name="type">
                                                @foreach (\App\Models\Content\Post::$types as $type)
                                                    <option @if (old('type', $post->type) === $type) selected @endif
                                                    value="{{ $type }}">@lang($type)
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('type')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="category_id">دسته بندی</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('category_id') is-invalid @enderror"
                                                    name="category_id">
                                                @foreach ($categories as $category)
                                                    <option
                                                        @if (old('category_id', $post->category_id) === $category->id) selected
                                                        @endif
                                                        value="{{ $category->id }}">{{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="tags">تگ ها</label>
                                        <div class="col-sm-10 text-right">
                                            <input type="hidden" class="form-control form-control-sm" name="tags"
                                                   id="tags" value="{{ old('tags', $post->tags) }}">
                                            <select class="select2 form-control form-control-sm" id="select_tags"
                                                    multiple></select>
                                            @error('tags')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="summary">خلاصه پست</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control @error('summary') is-invalid @enderror"
                                                   value="{{ old('summary', $post->summary) }}" id="summary"
                                                   name="summary">
                                            @error('summary')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="body">توضیحات اصلی</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" class="form-control @error('body') is-invalid @enderror"
                                                      id="body" name="body">{{ old('body', $post->body) }}</textarea>
                                            @error('body')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="image">عکس</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control @error('image') is-invalid @enderror"
                                                   id="image" name="image">
                                            @error('image')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <hr>
                                    <section class="row">
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($post->image['indexArray'] as $key => $value )
                                            <section class="col-md-{{ 6 / $number }}">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" name="currentImage"
                                                           value="{{ $key }}" id="{{ $number }}"
                                                           @if($post->image['currentImage'] == $key) checked @endif>
                                                    <label for="{{ $number }}" class="form-check-label mx-2">
                                                        <img src="{{ asset($value) }}" class="w-100" alt="">
                                                    </label>
                                                </div>
                                            </section>
                                            @php
                                                $number++;
                                            @endphp
                                        @endforeach

                                    </section>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="published_at">تاریخ انتشار</label>
                                        <div class="col-sm-10">
                                            <input type="text"
                                                   class="form-control d-none @error('published_at') is-invalid @enderror"
                                                   id="published_at" name="published_at">
                                            <input type="text"
                                                   class="form-control @error('published_at_view') is-invalid @enderror"
                                                   id="published_at_view">
                                            @error('published_at')
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
@section('script')

    <script src="{{ asset('admin-assets/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        CKEDITOR.replace('body');
    </script>

    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            var tags_input = $('#tags');
            var select_tags = $('#select_tags');
            var default_tags = tags_input.val();
            var default_data = null;

            if (tags_input.val() !== null && tags_input.val().length > 0) {
                default_data = default_tags.split(',');
            }

            select_tags.select2({
                placeholder: 'لطفا تگ های خود را وارد نمایید',
                tags: true,
                data: default_data
            });
            select_tags.children('option').attr('selected', true).trigger('change');


            $('#form').submit(function (event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

@endsection
