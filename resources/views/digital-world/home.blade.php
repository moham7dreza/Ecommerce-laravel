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
                        @include('digital-world.layouts.partials.new-posts') {{-- Load News Posts --}}
                        @include('digital-world.layouts.partials.left-sidebar') {{-- Load Sidebar Left --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('script')

    <script>
        $('#post-favorite-btn').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'حذف پست از علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'حذف پست از علاقه مندی ها');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'افزودن پست به علاقه مندی ها');
                        $(element).attr('data-bs-original-title', 'افزودن پست به علاقه مندی ها');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#post-like-btn').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).children().first().addClass('text-danger');
                        $(element).attr('data-original-title', 'آن لایک کردن');
                        $(element).attr('data-bs-original-title', 'آن لایک کردن');
                    } else if (result.status == 2) {
                        $(element).children().first().removeClass('text-danger')
                        $(element).attr('data-original-title', 'لایک کردن');
                        $(element).attr('data-bs-original-title', 'لایک کردن');
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>

    <script>
        $('#follow-author').click(function () {
            var url = $(this).attr('data-url');
            var element = $(this);
            $.ajax({
                url: url,
                success: function (result) {
                    if (result.status == 1) {
                        $(element).removeClass('text-primary').addClass('text-danger');
                        $(element).innerText = "";
                        $(element).text("دنبال نکردن نویسنده");
                    } else if (result.status == 2) {
                        $(element).removeClass('text-danger').addClass('text-primary');
                        $(element).innerText = "";
                        $(element).text("دنبال کردن نویسنده");
                    } else if (result.status == 3) {
                        $('.toast').toast('show');
                    }
                }
            })
        })
    </script>
@endsection
