<?php $__env->startSection('head-tag'); ?>
    <title>نمودار فروش</title>
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/chart.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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

    <div class="jumbotron shade pt-5">
        <section class="row">
            <section class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="monthly-sales-chart"></div>
                    <p class="highcharts-description">
                        
                    </p>
                </figure>
            </section>
            <section class="col-md-6">
                <figure class="highcharts-figure">
                    <div id="weekly-sales-chart"></div>
                    <p class="highcharts-description">

                    </p>
                </figure>
            </section>
        </section>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
        fetch('<?php echo e(route('api.market.report.weekly.sales')); ?>', {headers: {Accept: 'application/json'}})
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
        fetch('<?php echo e(route('api.market.report.monthly.sales')); ?>', {headers: {Accept: 'application/json'}})
            .then(result => result.json())
            .then(result => {
                monthlySalesChart.series[0].setData(result.data);
                console.log(result.data)
            })
            .catch(error => console.log(error));

    </script>

    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    


    

    
    
    
    
    

    
    
    
    
    
    

    
    
    

    
    
    

    
    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

    
    
    
    
    

    
    
    
    

    
    
    
    
    
    
    
    
    

    
    
    
    
    
    
    
    
    
    

    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('panel.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/panel/report/charts/sales/index.blade.php ENDPATH**/ ?>