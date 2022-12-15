@extends('digital-world.layouts.master')
@section('head-tag')
    <!-- MINIFIED -->
   {!! SEO::generate(true) !!}
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
        $(document).ready(function () {
            var posts = {!! \App\Models\Content\Post::query()->where('status', \App\Models\Content\Post::STATUS_ACTIVE)->latest()->get() !!};
            posts.map(function (post) {
                var id = post.id;
                var target = `#post-favorite-btn-${id}`;
                $(target).click(function () {
                    var url = $(this).attr('data-url');
                    var element = $(this);
                    $.ajax({
                        url: url,
                        success: function (result) {
                            if (result.status == 1) {
                                $(element).children().first().addClass('text-danger');
                                $(element).attr('data-original-title', 'حذف پست از علاقه مندی ها');
                                $(element).attr('data-bs-original-title', 'حذف پست از علاقه مندی ها');
                                successToast('ادمین  با موفقیت فعال شد')
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
            });
        });

        function successToast(message) {

            var successToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-success text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '<span aria-hidden="true">&times;</span>\n' +
                '</button>\n' +
                '</section>\n' +
                '</section>';

            $('.toast-wrapper').append(successToastTag);
            $('.toast').toast('show').delay(5500).queue(function () {
                $(this).remove();
            })
        }

        function errorToast(message) {

            var errorToastTag = '<section class="toast" data-delay="5000">\n' +
                '<section class="toast-body py-3 d-flex bg-danger text-white">\n' +
                '<strong class="ml-auto">' + message + '</strong>\n' +
                '<button type="button" class="mr-2 close" data-dismiss="toast" aria-label="Close">\n' +
                '<span aria-hidden="true">&times;</span>\n' +
                '</button>\n' +
                '</section>\n' +
                '</section>';

            $('.toast-wrapper').append(errorToastTag);
            $('.toast').toast('show').delay(5500).queue(function () {
                $(this).remove();
            })
        }

    </script>

    <script>
        $(document).ready(function () {
            var posts = {!! \App\Models\Content\Post::query()->where('status', \App\Models\Content\Post::STATUS_ACTIVE)->latest()->get() !!};
            posts.map(function (post) {
                var id = post.id;
                var target = `#post-like-btn-${id}`;
                $(target).click(function () {
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
            });
        });
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
