@extends('Panel::layouts.master')

@section('head-tag')
    <title>داشبورد اصلی</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/chart.css') }}">
@endsection

@section('content')
{{--    @can('permission-super-admin')--}}

{{--        <!-- Counters cards --->--}}
{{--        <section class="row">--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.user.customer.index') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-custom-yellow text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->customersCount() }}</h5>--}}
{{--                                    <p>تعداد مشتریان سیستم</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.content.post.index') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-custom-green text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->postsCount() }}</h5>--}}
{{--                                    <p>تعداد پست ها</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.market.comment.index') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-custom-pink text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->commentsCount() }}</h5>--}}
{{--                                    <p>تعداد نظرات</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.market.order.all') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-custom-yellow text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->ordersCount() }}</h5>--}}
{{--                                    <p>تعداد سفارشات</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.market.payment.index') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-danger text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->paymentsCount() }}</h5>--}}
{{--                                    <p>تعداد پرداخت ها</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.market.discount.amazingSale') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-success text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->activeAmazingSalesCount() }}</h5>--}}
{{--                                    <p>تعداد تخفیفات شگفت انگیز فعال</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.user.admin-user.index') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-warning text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->adminUsersCount() }}</h5>--}}
{{--                                    <p>تعداد ادمین های سیستم</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}
{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="{{ route('admin.ticket.newTickets') }}" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-primary text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->newTicketsCount() }}</h5>--}}
{{--                                    <p>تعداد تیکت های جدید</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}

{{--            <section class="col-lg-3 col-md-6 col-12">--}}
{{--                <a href="#" class="text-decoration-none d-block mb-4">--}}
{{--                    <section class="card bg-primary text-white">--}}
{{--                        <section class="card-body">--}}
{{--                            <section class="d-flex justify-content-between">--}}
{{--                                <section class="info-box-body">--}}
{{--                                    <h5>{{ $homeRepo->customerHomeViewCount() }}</h5>--}}
{{--                                    <p>تعداد بازدید از فروشگاه</p>--}}
{{--                                </section>--}}
{{--                                <section class="info-box-icon">--}}
{{--                                    <i class="fas fa-chart-line"></i>--}}
{{--                                </section>--}}
{{--                            </section>--}}
{{--                        </section>--}}
{{--                        <section class="card-footer info-box-footer">--}}
{{--                            <i class="fas fa-clock mx-2"></i> به روز رسانی شده در : {{ jalaliDate(now()) }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </a>--}}
{{--            </section>--}}

{{--        </section>--}}
{{--        <hr>--}}
{{--@mobile--}}
{{--    <p>This is the MOBILE template!</p>--}}
{{--@endmobile--}}

{{--        <!-- common discount alert --->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                @php--}}
{{--                    $discount = $homeRepo->activeCommonDiscount();--}}
{{--                @endphp--}}
{{--                @if(!is_null($discount))--}}
{{--                    <div class="alert alert-primary" role="alert">--}}
{{--                        یک تخفیف عمومی <strong>{{ $discount->percentage }}</strong>درصدی با عنوان--}}
{{--                        <strong>{{ $discount->title }}</strong> تا تاریخ--}}
{{--                        <strong>{{ jalaliDate($discount->end_date) }}</strong> فعال است. برای<a--}}
{{--                            href="{{ route('admin.market.discount.commonDiscount.edit', $discount) }}"--}}
{{--                            class="alert-link"> ویرایش </a>کلیک کن--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <div class="alert alert-primary" role="alert">--}}
{{--                        هیچ تخفیف عمومی فعال نیست. برای افزودن <a--}}
{{--                            href="{{ route('admin.market.discount.commonDiscount.create') }}"--}}
{{--                            class="alert-link">تخفیف</a> کلیک کن--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--            </section>--}}
{{--        </section>--}}

{{--        <!-- last weekly sales -->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                <div class="alert alert-info" role="alert">--}}
{{--                    کل فروش هفته جاری <strong>{{ $homeRepo->lastWeeklySalesAmount() }} تومان</strong> و کل فروش ماه جاری--}}
{{--                    <strong>{{ $homeRepo->lastMonthlySalesAmount() }} تومان</strong> است. برای مشاهده<a--}}
{{--                        href="{{ route('admin.market.order.show', $homeRepo->lastOrder()->id) }}"--}}
{{--                        class="alert-link"> جزئیات </a>آخرین سفارش کلیک کن--}}
{{--                </div>--}}
{{--            </section>--}}
{{--        </section>--}}

{{--        <!-- activity logs --->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                <section class="main-body-container">--}}
{{--                    <section class="main-body-container-header">--}}
{{--                        <h5>--}}
{{--                            بخش لاگ--}}
{{--                        </h5>--}}
{{--                        <p>--}}
{{--                            در این بخش اطلاعاتی در مورد عملیات CRUD به شما داده می شود--}}
{{--                        </p>--}}
{{--                    </section>--}}
{{--                    <section class="body-content">--}}
{{--                        <section class="table-responsive">--}}
{{--                            <table class="table table-striped table-hover">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>عنوان</th>--}}
{{--                                    <th>توضیحات</th>--}}
{{--                                    <th>نام انجام دهنده</th>--}}
{{--                                    <th>اطلاعات کلی</th>--}}
{{--                                    <th>تاریخ ثبت</th>--}}
{{--                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @forelse($homeRepo->logs() as $log)--}}
{{--                                    <tr>--}}
{{--                                        <th>{{ $log->id }}</th>--}}
{{--                                        <td>{{ $log->log_name }}</td>--}}
{{--                                        <td>{{ $log->description() }}</td>--}}
{{--                                        <td>{{ $log->causerName() }}</td>--}}
{{--                                        <td dir="rtl">--}}
{{--                                            @if(empty($log->properties()))--}}
{{--                                                <span class="text-danger">ویژگی ندارد</span>--}}
{{--                                            @else--}}
{{--                                                @foreach($log->properties() as $key => $value)--}}
{{--                                                    {{ $key . ' => ' . $value }} <br>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}
{{--                                        </td>--}}
{{--                                        <td>{{ $log->getFaUpdatedDate() }}</td>--}}
{{--                                        <td class="width-22-rem text-left">--}}
{{--                                            <a href="{{ $log->path() }}" class="btn btn-primary btn-sm"><i--}}
{{--                                                    class="fa fa-edit"></i></a>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @empty--}}
{{--                                    <tr>--}}
{{--                                        <td>هیج عملیاتی صورت نگرفته است.</td>--}}
{{--                                    </tr>--}}
{{--                                @endforelse--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            {{ $homeRepo->logs()->links() }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </section>--}}
{{--            </section>--}}
{{--        </section>--}}


{{--        <!-- All comments --->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                <section class="main-body-container">--}}
{{--                    <section class="main-body-container-header">--}}
{{--                        <h5>--}}
{{--                            نظرات--}}
{{--                        </h5>--}}
{{--                        <p>--}}
{{--                            تمامی کامنت های اخیر ایجاد شده--}}
{{--                        </p>--}}
{{--                    </section>--}}
{{--                    <section class="body-content">--}}
{{--                        <section class="table-responsive">--}}
{{--                            <table class="table table-striped table-hover">--}}
{{--                                <thead>--}}
{{--                                <tr>--}}
{{--                                    <th>#</th>--}}
{{--                                    <th>نظر</th>--}}
{{--                                    <th>پاسخ به</th>--}}
{{--                                    <th>نویسنده نظر</th>--}}
{{--                                    <th>نام</th>--}}
{{--                                    <th>وضعیت تایید</th>--}}
{{--                                    <th>وضعیت کامنت</th>--}}
{{--                                    <th class="max-width-16-rem text-center"><i class="fa fa-cogs"></i> تنظیمات</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                @foreach ($homeRepo->latestComments() as $key => $comment)--}}

{{--                                    <tr>--}}
{{--                                        <th>{{ $key + 1 }}</th>--}}
{{--                                        <td>{{ $comment->limitedBody() }}</td>--}}
{{--                                        <td>{{ $comment->textParentBody() }}</td>--}}
{{--                                        <td>{{ $comment->textAuthorName()  }}</td>--}}
{{--                                        <td>{{ $comment->getCommentableName() }}</td>--}}
{{--                                        <td>{{ $comment->textApprove() }} </td>--}}
{{--                                        <td>{{ $comment->textStatus() }} </td>--}}

{{--                                        <td class="width-8-rem text-left">--}}
{{--                                            <div class="dropdown">--}}
{{--                                                <a href="#" class="btn btn-success btn-sm btn-block dorpdown-toggle"--}}
{{--                                                   role="button" id="dropdownMenuLink" data-toggle="dropdown"--}}
{{--                                                   aria-expanded="false">--}}
{{--                                                    <i class="fa fa-tools"></i>--}}
{{--                                                </a>--}}
{{--                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">--}}

{{--                                                    <a href="{{ $comment->getCommentablePath() }}"--}}
{{--                                                       class="dropdown-item text-right"><i class="fa fa-eye"></i> نمایش--}}
{{--                                                    </a>--}}

{{--                                                    <a href="{{ $comment->commentAdminPath() }}"--}}
{{--                                                       class="dropdown-item text-right"><i class="fa fa-edit"></i>--}}
{{--                                                        ویرایش </a>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}

{{--                                    </tr>--}}
{{--                                @endforeach--}}

{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                            {{ $homeRepo->latestComments()->links() }}--}}
{{--                        </section>--}}
{{--                    </section>--}}
{{--                </section>--}}
{{--            </section>--}}
{{--        </section>--}}

{{--        <!-- sales Charts -->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                <section class="main-body-container d-flex justify-content-center align-items-center">--}}
{{--                    <section class="col-md-6">--}}
{{--                        <figure class="highcharts-figure">--}}
{{--                            <div id="monthly-sales-chart"></div>--}}
{{--                            <p class="highcharts-description">--}}
{{--                                نمودار فروش ماهیانه--}}
{{--                            </p>--}}
{{--                        </figure>--}}
{{--                    </section>--}}
{{--                    <section class="col-md-6">--}}
{{--                        <figure class="highcharts-figure">--}}
{{--                            <div id="weekly-sales-chart"></div>--}}
{{--                            <p class="highcharts-description">--}}
{{--                                نمودار فروش هفتگی--}}
{{--                            </p>--}}
{{--                        </figure>--}}
{{--                    </section>--}}
{{--                </section>--}}
{{--            </section>--}}
{{--        </section>--}}

{{--        <!-- users -->--}}
{{--        <section class="row">--}}
{{--            <section class="col-12">--}}
{{--                <section class="main-body-container">--}}
{{--                    <section class="main-body-container-header">--}}
{{--                        <h5>--}}
{{--                            بخش کاربران--}}
{{--                        </h5>--}}
{{--                        <p>--}}
{{--                            در این بخش اطلاعاتی در مورد کاربران به شما داده می شود--}}
{{--                        </p>--}}
{{--                    </section>--}}
{{--                    <section class="body-content">--}}
{{--                        <p>--}}
{{--                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی--}}
{{--                            تکنولوژی--}}
{{--                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا--}}
{{--                            با--}}
{{--                            نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در--}}
{{--                            زبان--}}
{{--                            فارسی ایجاد کرد. در این صورت--}}
{{--                            می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد--}}
{{--                            وزمان--}}
{{--                            مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا--}}
{{--                            مورد--}}
{{--                            استفاده قرار گیرد.--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی--}}
{{--                            تکنولوژی--}}
{{--                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا--}}
{{--                            با--}}
{{--                            نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در--}}
{{--                            زبان--}}
{{--                            فارسی ایجاد کرد. در این صورت--}}
{{--                            می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد--}}
{{--                            وزمان--}}
{{--                            مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا--}}
{{--                            مورد--}}
{{--                            استفاده قرار گیرد.--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.--}}
{{--                            چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی--}}
{{--                            تکنولوژی--}}
{{--                            مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.--}}
{{--                            کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا--}}
{{--                            با--}}
{{--                            نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در--}}
{{--                            زبان--}}
{{--                            فارسی ایجاد کرد. در این صورت--}}
{{--                            می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد--}}
{{--                            وزمان--}}
{{--                            مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا--}}
{{--                            مورد--}}
{{--                            استفاده قرار گیرد.--}}
{{--                        </p>--}}
{{--                    </section>--}}
{{--                </section>--}}
{{--            </section>--}}
{{--        </section>--}}
{{--    @endcan--}}
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script>
        // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
        weeklySalesChartData = []
        var weeklySalesChart = Highcharts.chart('weekly-sales-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'نمودار فروش هفتگی'
            },
            subtitle: {
                text: 'منبع داده : ' +
                    '<a href="" ' +
                    'target="_blank">techzilla.com</a>'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                categories: ['شنبه', 'یکشنبه', 'دوشنبه', 'سه شنبه', 'چهارشنبه', 'پنج شنبه', 'جمعه']
                // type: 'category'
            },
            yAxis: {
                title: {
                    text: 'مبلغ فروش بر حسب تومان'
                }
            },
            plotOptions: {
                // line: {
                //     dataLabels: {
                //         enabled: true
                //     },
                //     enableMouseTracking: false
                // },
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true,
                        format: '{point.y:.0f}'
                    }
                }
            },
            legend: {
                enabled: false
            },
            series: [
                {
                    name: "فروش هفتگی",
                    colorByPoint: true,
                    data: weeklySalesChartData,
                },
            ]
        });
        fetch('{{ route('api.market.report.weekly.sales') }}', {headers: {Accept: 'application/json'}})
            .then(result => result.json())
            .then(result => {
                weeklySalesChart.series[0].setData(result.data);
            })
            .catch(error => console.log(error));

    </script>

    <script>
        // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
        monthlySalesChartData = []
        var monthlySalesChart = Highcharts.chart('monthly-sales-chart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'نمودار فروش ماهیانه'
            },
            subtitle: {
                text: 'منبع داده : ' +
                    '<a href="" ' +
                    'target="_blank">techzilla.com</a>'
            },
            accessibility: {
                announceNewData: {
                    enabled: true
                }
            },
            xAxis: {
                categories: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند']
                // type: 'category'
            },
            yAxis: {
                title: {
                    text: 'مبلغ فروش بر حسب تومان'
                }
            },
            plotOptions: {
                // line: {
                //     dataLabels: {
                //         enabled: true
                //     },
                //     enableMouseTracking: false
                // },
                series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: false,
                        format: '{point.y:.0f}'
                    }
                }
            },
            legend: {
                enabled: false
            },
            series: [
                {
                    name: "فروش ماهیانه",
                    colorByPoint: true,
                    data: monthlySalesChart,
                },
            ]
        });
        fetch('{{ route('api.market.report.monthly.sales') }}', {headers: {Accept: 'application/json'}})
            .then(result => result.json())
            .then(result => {
                monthlySalesChart.series[0].setData(result.data);
                // console.log(result.data)
            })
            .catch(error => console.log(error));

    </script>
@endsection
