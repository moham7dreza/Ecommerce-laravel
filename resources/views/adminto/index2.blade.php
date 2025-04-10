@extends('adminto.layouts.master')

@section('head-tag')
    <title>{{ config('app.name') }}</title>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-4">درآمد کل</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#f05050 "
                                   data-bgColor="#F9B9B9" value="58"
                                   data-skin="tron" data-angleOffset="180" data-readOnly=true
                                   data-thickness=".15"/>
                        </div>

                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> 256 </h2>
                            <p class="text-muted mb-1">درآمد امروز</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-3">آنالیز فروش</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-right">
                            <span class="badge badge-success badge-pill float-left mt-3">32% <i
                                    class="mdi mdi-trending-up"></i> </span>
                            <h2 class="font-weight-normal mb-1"> 8451 </h2>
                            <p class="text-muted mb-3">درآمد امروز</p>
                        </div>
                        <div class="progress progress-bar-alt-success progress-sm">
                            <div class="progress-bar bg-success" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% تکمیل شده</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-4">آمار</h4>

                    <div class="widget-chart-1">
                        <div class="widget-chart-box-1 float-left" dir="ltr">
                            <input data-plugin="knob" data-width="80" data-height="80" data-fgColor="#ffbd4a"
                                   data-bgColor="#FFE6BA" value="80"
                                   data-skin="tron" data-angleOffset="180" data-readOnly=true
                                   data-thickness=".15"/>
                        </div>
                        <div class="widget-detail-1 text-right">
                            <h2 class="font-weight-normal pt-2 mb-1"> 4569 </h2>
                            <p class="text-muted mb-1">درآمد امروز</p>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-3">فروش روزانه</h4>

                    <div class="widget-box-2">
                        <div class="widget-detail-2 text-right">
                            <span class="badge badge-pink badge-pill float-left mt-3">32% <i
                                    class="mdi mdi-trending-up"></i> </span>
                            <h2 class="font-weight-normal mb-1"> 158 </h2>
                            <p class="text-muted mb-3">درآمد امروز</p>
                        </div>
                        <div class="progress progress-bar-alt-pink progress-sm">
                            <div class="progress-bar bg-pink" role="progressbar"
                                 aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                 style="width: 77%;">
                                <span class="sr-only">77% تکمیل شده</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0">فروش روزانه</h4>

                    <div class="widget-chart text-center">
                        <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                        <ul class="list-inline chart-detail-list mb-0">
                            <li class="list-inline-item">
                                <h5 style="color: #ff8acc;"><i class="fa fa-circle mr-1"></i>سری آ</h5>
                            </li>
                            <li class="list-inline-item">
                                <h5 style="color: #5b69bc;"><i class="fa fa-circle mr-1"></i>سری ب</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">آمار</h4>
                    <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>
                    <h4 class="header-title mt-0">درآمد کل</h4>
                    <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div>
                        <div class="avatar-lg float-left mr-3">
                            <img src="/adminto-assets/images/users/user-3.jpg" class="img-fluid rounded-circle"
                                 alt="کاربر">
                        </div>
                        <div class="wid-u-info">
                            <h5 class="mt-0">قائم امیدی</h5>
                            <p class="text-muted mb-1 font-13 text-truncate">ghaemomidi@yahoo.com</p>
                            <small class="text-warning"><b>مدیر</b></small>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div>
                        <div class="avatar-lg float-left mr-3">
                            <img src="/adminto-assets/images/users/user-2.jpg" class="img-fluid rounded-circle"
                                 alt="کاربر">
                        </div>
                        <div class="wid-u-info">
                            <h5 class="mt-0"> علی شعبانی</h5>
                            <p class="text-muted mb-1 font-13 text-truncate">ghaemomidi@yahoo.com</p>
                            <small class="text-pink"><b>تیم پشتیبانی</b></small>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div>
                        <div class="avatar-lg float-left mr-3">
                            <img src="/adminto-assets/images/users/user-1.jpg" class="img-fluid rounded-circle"
                                 alt="کاربر">
                        </div>
                        <div class="wid-u-info">
                            <h5 class="mt-0">وحید</h5>
                            <p class="text-muted mb-1 font-13 text-truncate">ghaemomidi@yahoo.com</p>
                            <small class="text-success"><b>طراح</b></small>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card-box widget-user">
                    <div>
                        <div class="avatar-lg float-left mr-3">
                            <img src="/adminto-assets/images/users/user-10.jpg" class="img-fluid rounded-circle"
                                 alt="کاربر">
                        </div>
                        <div class="wid-u-info">
                            <h5 class="mt-0">نسیم</h5>
                            <p class="text-muted mb-1 font-13 text-truncate">ghaemomidi@yahoo.com</p>
                            <small class="text-info"><b>توسعه دهنده</b></small>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-4">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mb-3">صندوق ورودی</h4>

                    <div class="inbox-widget">

                        <div class="inbox-item">
                            <a href="#">
                                <div class="inbox-item-img"><img src="/adminto-assets/images/users/user-1.jpg"
                                                                 class="rounded-circle" alt="تصویر"></div>
                                <h5 class="inbox-item-author mt-0 mb-1">قائم امیدی</h5>
                                <p class="inbox-item-text">سلام! من آنلاینم...</p>
                                <p class="inbox-item-date">13:40 بعدازظهر</p>
                            </a>
                        </div>

                        <div class="inbox-item">
                            <a href="#">
                                <div class="inbox-item-img"><img src="/adminto-assets/images/users/user-2.jpg"
                                                                 class="rounded-circle" alt="تصویر"></div>
                                <h5 class="inbox-item-author mt-0 mb-1">نسیم</h5>
                                <p class="inbox-item-text">پروژه تموم شد. لطفا چک کن...</p>
                                <p class="inbox-item-date">13:34 بعدازظهر</p>
                            </a>
                        </div>

                        <div class="inbox-item">
                            <a href="#">
                                <div class="inbox-item-img"><img src="/adminto-assets/images/users/user-3.jpg"
                                                                 class="rounded-circle" alt="تصویر"></div>
                                <h5 class="inbox-item-author mt-0 mb-1">وحید</h5>
                                <p class="inbox-item-text">این قالب عالیه!</p>
                                <p class="inbox-item-date">13:17 بعدازظهر</p>
                            </a>
                        </div>

                        <div class="inbox-item">
                            <a href="#">
                                <div class="inbox-item-img"><img src="/adminto-assets/images/users/user-4.jpg"
                                                                 class="rounded-circle" alt="تصویر"></div>
                                <h5 class="inbox-item-author mt-0 mb-1">سجاد</h5>
                                <p class="inbox-item-text">از صحبت باهات خوشحال شدم</p>
                                <p class="inbox-item-date">12:20 بعدازظهر</p>
                            </a>
                        </div>

                        <div class="inbox-item">
                            <a href="#">
                                <div class="inbox-item-img"><img src="/adminto-assets/images/users/user-5.jpg"
                                                                 class="rounded-circle" alt="تصویر"></div>
                                <h5 class="inbox-item-author mt-0 mb-1">شایان</h5>
                                <p class="inbox-item-text">سلام! من آنلاینم...</p>
                                <p class="inbox-item-date">10:15 صبح</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-8">
                <div class="card-box">
                    <div class="dropdown float-right">
                        <a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown"
                           aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">اقدام دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">گزینه دیگر</a>
                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item">لینک جدا</a>
                        </div>
                    </div>

                    <h4 class="header-title mt-0 mb-3">آخرین پروژه ها</h4>

                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>نام پروژه</th>
                                <th>تاریخ شروع</th>
                                <th>تاریخ تحویل</th>
                                <th>وضعیت</th>
                                <th>انجام دهنده</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>قالب مدیریت ادمین تو نگارش 1</td>
                                <td>01/01/2017</td>
                                <td>26/04/2017</td>
                                <td><span class="badge badge-danger">منتشر شده</span></td>
                                <td>قائم</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>سایت ادمین تو نگارش 1</td>
                                <td>01/01/2017</td>
                                <td>26/04/2017</td>
                                <td><span class="badge badge-success">منتشر شده</span></td>
                                <td>امیر حسین</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>قالب مدیریتی ادمین تو نگارش 1.1</td>
                                <td>01/05/2017</td>
                                <td>10/05/2017</td>
                                <td><span class="badge badge-pink">در انتظار</span></td>
                                <td>قائم</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>سایت ادمین تو نگارش 1.1</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge badge-purple">در حال انجام</span>
                                </td>
                                <td>امیر حسین</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>قالب مدیریتی ادمین تو نگارش 1.3</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge badge-warning">به زودی</span></td>
                                <td>قائم</td>
                            </tr>

                            <tr>
                                <td>6</td>
                                <td>قالب مدیریتی ادمین تو نگارش 1.3</td>
                                <td>01/01/2017</td>
                                <td>31/05/2017</td>
                                <td><span class="badge badge-primary">به زودی</span></td>
                                <td>امیر حسین</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div>
@endsection
