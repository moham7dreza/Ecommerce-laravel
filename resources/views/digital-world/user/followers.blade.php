@extends('digital-world.layouts.master')
@section('head-tag')
    <!-- MINIFIED -->
    {!! SEO::generate(true) !!}
@endsection


@section('content')
    <main class="position-relative">
        <div class="container">
            <div class="sidebar-widget mb-30">
                <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                        <h5 class="widget-title pl-5">فالوورها</h5>
                    </div>
                    @forelse ($followers as $follower)
                        <a class="red-tooltip active" href="#" data-toggle="tooltip"
                           data-placement="top"
                           data-original-title="{{ $follower->fullName }} - {{ $follower->getPostsCount() }} پست">
                            <img src="{{ $follower->image() }}" alt="{{ $follower->fullName }}">
                        </a>
                    @empty
                        <p>دنبال کننده ای ندارد</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="container">
            <div class="sidebar-widget mb-30">
                <div class="widget-top-auhor border-radius-10 p-20 bg-white">
                    <div class="widget-header widget-header-style-1 position-relative mb-15">
                        <h5 class="widget-title pl-5">دنبال شونده ها</h5>
                    </div>
                    @forelse($followings as $following)
                        <a class="red-tooltip active" href="#" data-toggle="tooltip"
                           data-placement="top"
                           data-original-title="{{ $following->fullName }} - {{ $following->getPostsCount() }} پست">
                            <img src="{{ $following->image() }}" alt="{{ $following->fullName }}">
                        </a>
                    @empty
                        <p>دنبال شونده ای ندارد</p>
                    @endforelse
                </div>
            </div>
        </div>
    </main>
@endsection
