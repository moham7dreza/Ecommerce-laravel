@extends('panel.layouts.master')

@section('head-tag')
    <title>پنل اصلی</title>
@endsection

@section('content')

        <!-- content -->
        <!-- breadcrumb -->

        <div class="row  m-1 pb-4 mb-3 ">
            <div class="col-xs-12  col-sm-12  col-md-12  col-lg-12 p-2">
                <div class="page-header breadcrumb-header ">
                    <div class="row align-items-end ">
                        <div class="col-lg-8">
                            <div class="page-header-title text-left-rtl">
                                <div class="d-inline">
                                    <h3 class="lite-text ">داشبورد</h3>
                                    <span class="lite-text ">گزارش ها و آمار</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item "><a href="#"><i class="fas fa-home"></i></a></li>
                                <li class="breadcrumb-item active">داشبورد</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- alert -->
        <!-- <div class="row m-1 pb-3 ">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="alert alert-danger alert-shade alert-dismissible fade show" role="alert">
                    <strong>Danger!</strong> Your Disk is Low.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>

        </div> -->
       @include('panel.partials.counter')


        <div class="row m-2 mb-1">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 p-2">
                <div class="alert text-dir-rtl text-right  alert-third alert-shade alert-dismissible fade show"
                     role="alert">
                    <strong>هشدار!</strong> این یک متن هشدار است.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="row m-1">
            @include('panel.partials.chart')
            @include('panel.partials.weather')
        </div>
        <div class="row mb-2 m-2">
            <div class="col-xl-8 col-md-6 col-sm-6 p-2">
                <div class="box-dash h-100 pastel animate__animated animate__flipInY b-second"><i
                        class="fab far fa-clock" aria-hidden="true"></i>

                    <span>27</span>
                    <hr class="m-0 ">
                    <span>بازدید</span>
                    <a href="#" class="small-box-footer">اطلاعات بیشتر <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            @include('panel.partials.clock')

        </div>
        <div class="row m-1">
            <div class="col-xs-1 col-sm-1 col-md-4 col-lg-4 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">نمودار دایره ای</h5>

                        <hr>
                        <canvas id="myChart4" width="10" height="11"></canvas>
                        <hr class="hr-dashed">
                        <p class="text-center c-danger">نمونه ای از نمودار</p>
                    </div>

                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                @include('panel.partials.latest')
            </div>

        </div>


        <div class="row m-1">
            <div class="col-xs-1 col-sm-1 col-md-8 col-lg-8 p-2">
                <div class="alert col-12  alert-success alert-shade-white bd-side alert-dismissible fade show"
                     role="alert">
                    <strong>هشدار!</strong>این یک متن هشدار است.

                </div>
                <div id="accordion " class="accordion card shade outlined o-forth w-100">
                    <div class="">
                        <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link c-grey w-100 m-0 text-right" data-toggle="collapse"
                                        data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    عنوان شماره یک
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="card-body">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                                ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                                شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای
                                طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                                سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link c-grey collapsed w-100 m-0 text-right"
                                        data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                        aria-controls="collapseTwo">
                                    عنوان شماره دو
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                             data-parent="#accordion">
                            <div class="card-body">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                                ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                                شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای
                                طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                                سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="card-header mr-3 ml-3 pr-0 pl-0" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link c-grey collapsed w-100 m-0 text-right"
                                        data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                    عنوان شماره سه
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                             data-parent="#accordion">
                            <div class="card-body">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از
                                طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که
                                لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود
                                ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده،
                                شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای
                                طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد،
                                در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط
                                سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی
                                سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 p-2">
                <div class="card shade h-100">
                    <div class="card-body">
                        <h5 class="card-title">نمودار قطبی</h5>

                        <hr>
                        <canvas id="myChart2" width="10" height="13"></canvas>

                    </div>

                </div>
            </div>

        </div>
@endsection
