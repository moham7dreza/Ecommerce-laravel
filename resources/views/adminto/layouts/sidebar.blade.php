<div class="left-side-menu">
    <div class="slimscroll-menu">
        <div class="user-box text-center">
            <img src="{{ auth()->user()->image() }}" alt="{{ auth()->user()->fullName }}" title="{{ auth()->user()->fullName }}" class="rounded-circle img-thumbnail avatar-lg">
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown">{{ auth()->user()->fullName }}</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user mr-1"></i>
                        <span>حساب کاربری</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings mr-1"></i>
                        <span>تنظیمات</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock mr-1"></i>
                        <span>قفل کردن صفحه</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out mr-1"></i>
                        <span>خروج</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">{{ auth()->user()->roles[0]->name }}</p>
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="#" class="text-muted">
                        <i class="mdi mdi-settings"></i>
                    </a>
                </li>

                <li class="list-inline-item">
                    <a href="#" class="text-custom">
                        <i class="mdi mdi-power"></i>
                    </a>
                </li>
            </ul>
        </div>

{{--        @include('adminto.layouts.partials.side-menu')--}}
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">ناوبری</li>

                <li>
                    <a href="{{ route('adminto.home') }}">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span> پیشخوان </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.category.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> دسته بندی </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.post.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> پست ها </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.comment.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> نظرات </span>
                    </a>
                </li>


                <li>
                    <a href="{{ route('adminto.menu.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> منو </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.user.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> کاربران </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.role.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> نقش ها </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.banner.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> تبلیغات </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('adminto.setting.index') }}">
                        <i class="mdi mdi-format-font"></i>
                        <span> تنظیمات </span>
                    </a>
                </li>
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
