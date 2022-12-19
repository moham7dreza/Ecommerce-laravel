@extends('admin.layouts.master')

@section('head-tag')
    <title>تگ های پست</title>
@endsection

@section('content')

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">بخش محتوی</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">پست</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> تگ های پست</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        تگ های پست
                    </h5>
                </section>

                <section class="d-flex justify-content-between align-items-center mt-4 mb-3 pb-2">
                    <a href="{{ route('admin.content.post.index') }}" class="btn btn-info btn-sm">بازگشت</a>
                </section>

                <section>
                    <form action="{{ route('admin.content.post.update-tags', $post->id) }}" method="POST" id="form">
                        @csrf
                        {{ method_field('put') }}
                        <section class="row">

                            <section class="col-12">
                                <section class="row border-top mt-3 py-3">

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">نام پست</label>
                                            <section>{{ $post->limitedTitle() }}</section>
                                        </div>
                                    </section>

                                    <section class="col-12 col-md-5">
                                        <div class="form-group">
                                            <label for="">توضیح پست</label>
                                            <section>{!! $post->limitedSummary() !!}</section>
                                        </div>
                                    </section>

                                    @php
                                        $postTagsArray = $post->tags()->pluck('id')->toArray();
                                    @endphp
                                    @foreach ($tags as $key => $tag)

                                        <section class="col-md-6">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="tags[]"
                                                       value="{{ $tag->id }}" id="{{ $tag->id }}"
                                                       @if(in_array($tag->id, $postTagsArray)) checked @endif/>
                                                <label for="{{ $tag->id }}"
                                                       class="form-check-label mr-3 mt-1">{{ $tag->name }}</label>
                                            </div>
                                            <div class="mt-2">
                                                @error('tags.' . $key)
                                                <span class="alert_required bg-danger text-white p-1 rounded"
                                                      role="alert">
                                            <strong>
                                                {{ $message }}
                                            </strong>
                                        </span>
                                                @enderror
                                            </div>
                                        </section>
                                    @endforeach

                                    <section class="col-12">
                                        <button class="btn btn-primary btn-sm mt-md-4">ثبت</button>
                                    </section>

                                </section>
                            </section>

                        </section>
                    </form>
                </section>

            </section>
        </section>
    </section>
@endsection
