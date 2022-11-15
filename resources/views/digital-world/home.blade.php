@extends('digital-world.layouts.master')
@section('head-tag')
    <title>
        دنیای دیجیتالی
    </title>
@endsection

@section('content')
    <main class="position-relative">
        @include('digital-world.layouts.partials.vip-posts', ['homeRepo' => $homeRepo]) {{-- Load Vip Posts --}}
        <div class="container">
            @include('digital-world.layouts.partials.top-banner', ['homeRepo' => $homeRepo]) {{-- Load Advs Top --}}
            <div class="row">
                @include('digital-world.layouts.partials.right-sidebar', ['homeRepo' => $homeRepo]) {{-- Load Sidebar Right --}}
                <div class="col-lg-10 col-md-9 order-1 order-md-2">
                    <div class="row">
                        @include('digital-world.layouts.partials.news-posts') {{-- Load News Posts --}}
                        @include('digital-world.layouts.partials.left-sidebar') {{-- Load Sidebar Left --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
