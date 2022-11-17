@extends('adminto.layouts.master')

@section('head-tag')
    <title>
        ویرایش دسته بندی {{ $postCategory->name }}
    </title>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="m-t-0 header-title">ویرایش دسته بندی {{ $postCategory->name }}</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" role="form" method="POST" id="form" enctype="multipart/form-data"
                                    action="{{ route('adminto.category.update', $postCategory->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="name">عنوان</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $postCategory->name) }}" id="name" name="name">
                                            @error('name')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="tags">تگ ها</label>
                                        <div class="col-sm-10 text-right">
                                            <input type="hidden" class="form-control form-control-sm"  name="tags" id="tags" value="{{ old('tags', $postCategory->tags) }}">
                                            <select class="select2 form-control form-control-sm" id="select_tags" multiple></select>
                                            @error('tags')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="status">وضعیت دسته بندی</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('status') is-invalid @enderror" name="status">
                                                @foreach (\App\Models\Content\PostCategory::$statuses as $status)
                                                    <option value="{{ $status }}" @if(old('status', $postCategory->status) == $status) selected @endif>
                                                        @if($status == 1) فعال @else غیر فعال @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('status')
                                            <br>
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label" for="parent_id">دسته والد</label>
                                        <div class="col-sm-10">
                                            <select class="form-control @error('parent_id') is-invalid @enderror" name="parent_id">
                                                <option value="">دسته اصلی</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                            @if(old('parent_id', $postCategory->parent_id) == $category->id) selected @endif>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('parent_id')
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

                                    <section class="row">
                                        @php
                                            $number = 1;
                                        @endphp
                                        @foreach ($postCategory->image['indexArray'] as $key => $value )
                                            <section class="col-md-{{ 6 / $number }}">
                                                <div class="form-check">
                                                    <input type="radio" class="form-check-input" name="currentImage" value="{{ $key }}" id="{{ $number }}" @if($postCategory->image['currentImage'] == $key) checked @endif>
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
                                        <label class="col-sm-2 col-form-label" for="description">توضیحات</label>
                                        <div class="col-sm-10">
                                            <textarea rows="3" class="form-control @error('description') is-invalid @enderror"
                                                      id="description" name="description"
                                            >{{ old('description', $postCategory->description) }}</textarea>
                                            @error('description')
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
    <script>
        CKEDITOR.replace('description');
    </script>
    <script>
        $(document).ready(function() {
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


            $('#form').submit(function(event) {
                if (select_tags.val() !== null && select_tags.val().length > 0) {
                    var selectedSource = select_tags.val().join(',');
                    tags_input.val(selectedSource)
                }
            })
        })
    </script>

@endsection
