@extends('digital-world.layouts.master')
@section('head-tag')
    <title>
        دنیای دیجیتالی
    </title>
@endsection

@section('content')
    <main class="position-relative">
        <div class="archive-header text-center mb-50">
            <div class="container">
                <h2><span class="text-danger">دسته بندی {{ $postCategory->name }}</span></h2>
                <div class="breadcrumb">
                    <span class="no-arrow">شما الان اینجا هستید::</span>
                    <a href="{{ route('digital-world.home') }}" rel="nofollow">خانه</a>
                    <span></span>
                    {{ $postCategory->name }}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-3 primary-sidebar sticky-sidebar sidebar-left order-2 order-md-1">
                    <div class="sidebar-widget widget_categories border-radius-10 bg-white mb-30">
                        <div class="widget-header position-relative mb-15">
                            <h5 class="widget-title"><strong>دسته بندی ها</strong></h5>
                        </div>
                        <ul class="font-small text-muted">
                            @foreach ($categories as $category)
                                <li class="cat-item cat-item-2">
                                    <a href="{{ $category->path() }}">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row mb-50">
                        <div class="col-lg-12 col-md-12">
                            <div class="latest-post mb-50">
                                <div class="loop-grid">
                                    <div class="row">
                                        @foreach ($posts as $post)
                                            <article class="col-lg-4 col-md-12 wow fadeIn animated">
                                                <div class="background-white border-radius-10 p-10 mb-30">
                                                    <div class="post-thumb d-flex mb-15 border-radius-15 img-hover-scale">
                                                        <a href="{{ $post->path() }}">
                                                            <img class="border-radius-15 style-article-img" src="{{ $post->imagePath() }}"
                                                                 alt="{{ $post->title }}">
                                                        </a>
                                                    </div>
                                                    <div class="pl-10 pr-10">
                                                        <div class="entry-meta mb-15 mt-10">
                                                            <a class="entry-meta meta-2" href="{{ $post->category->path() }}">
                                                                <span class="post-in text-primary font-x-small">
                                                                    {{ $post->category->name }}
                                                                </span>
                                                            </a>
                                                        </div>
                                                        <h5 class="post-title mb-15">
                                                            <a href="{{ $post->path() }}">
                                                                {{ Illuminate\Support\Str::limit($post->title) }}
                                                            </a>
                                                        </h5>
                                                        <p class="post-exerpt font-medium text-muted mb-30">
                                                            {!! Illuminate\Support\Str::limit($post->summary) !!}
                                                        </p>
                                                        <div class="entry-meta meta-1 font-x-small color-grey float-right text-uppercase mb-10">
                                                            <span class="post-by">توسط
                                                                <a href="{{ $post->author->path() }}">{{ $post->author->fullName }}</a>
                                                            </span>
                                                            <span class="post-on">{{ $post->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </article>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="pagination-area mb-30">
                                {{ $posts->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
