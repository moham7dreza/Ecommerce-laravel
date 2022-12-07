@extends('admin.layouts.master')

@section('head-tag')
    <title>داشبورد اصلی</title>
@endsection

@section('content')
    @can('permission-super-admin')
        <section class="row">
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.user.customer.index') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-yellow text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->customersCount() }}</h5>
                                    <p>تعداد مشتریان سیستم</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.content.post.index') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-green text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->postsCount() }}</h5>
                                    <p>تعداد پست ها</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.market.comment.index') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-pink text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->commentsCount() }}</h5>
                                    <p>تعداد نظرات</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.market.order.all') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-custom-yellow text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->ordersCount() }}</h5>
                                    <p>تعداد سفارشات</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.market.payment.index') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-danger text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->paymentsCount() }}</h5>
                                    <p>تعداد پرداخت ها</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.market.discount.amazingSale') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-success text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->activeAmazingSalesCount() }}</h5>
                                    <p>تعداد تخفیفات شگفت انگیز فعال</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.user.admin-user.index') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-warning text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->adminUsersCount() }}</h5>
                                    <p>تعداد ادمین های سیستم</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>
            <section class="col-lg-3 col-md-6 col-12">
                <a href="{{ route('admin.ticket.newTickets') }}" class="text-decoration-none d-block mb-4">
                    <section class="card bg-primary text-white">
                        <section class="card-body">
                            <section class="d-flex justify-content-between">
                                <section class="info-box-body">
                                    <h5>{{ $homeRepo->newTicketsCount() }}</h5>
                                    <p>تعداد تیکت های جدید</p>
                                </section>
                                <section class="info-box-icon">
                                    <i class="fas fa-chart-line"></i>
                                </section>
                            </section>
                        </section>
                        <section class="card-footer info-box-footer">
                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}
                        </section>
                    </section>
                </a>
            </section>

        </section>

        <section class="row">
            <section class="col-12">
                <section class="main-body-container">
                    <section class="main-body-container-header">
                        <h5>
                            بخش لاگ
                        </h5>
                        <p>
                            در این بخش اطلاعاتی در مورد عملیات CRUD به شما داده می شود
                        </p>
                    </section>
                    <section class="body-content">
                        <section class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>عنوان</th>
                                    <th>توضیحات</th>
                                    <th>نام انجام دهنده</th>
                                    <th>اطلاعات کلی</th>
                                    <th>تاریخ ثبت</th>
                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($logs as $log)
                                    <tr>
                                        <th>{{ $log->id }}</th>
                                        <td>{{ $log->log_name }}</td>
                                        <td>{{ $log->description() }}</td>
                                        <td>{{ $log->causerName() }}</td>
                                        <td dir="rtl">
                                            @if(empty($log->properties()))
                                                <span class="text-danger">ویژگی ندارد</span>
                                            @else
                                                @foreach($log->properties() as $key => $value)
                                                    {{ $key . ' => ' . $value }} <br>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>{{ $log->getFaUpdatedDate() }}</td>
                                        <td class="width-22-rem text-left">
                                            <a href="{{ $log->path() }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $logs->links() }}
                        </section>
                    </section>
                </section>
            </section>
        </section>
    @endcan
    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header">
                    <h5>
                        بخش کاربران
                    </h5>
                    <p>
                        در این بخش اطلاعاتی در مورد کاربران به شما داده می شود
                    </p>
                </section>
                <section class="body-content">
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                    <p>
                        لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.
                        کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با
                        نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان
                        فارسی ایجاد کرد. در این صورت
                        می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان
                        مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد
                        استفاده قرار گیرد.
                    </p>
                </section>
            </section>
        </section>
    </section>

@endsection
