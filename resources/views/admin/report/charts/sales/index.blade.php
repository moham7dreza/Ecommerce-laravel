@extends('admin.layouts.master')
@section('head-tag')
    <title>نمودار فروش</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/css/chart.css') }}">
@endsection

@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">گزارشات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمودار فروش</li>
        </ol>
    </nav>

    <div class="mt-5">
        <h3>Column Chart</h3>

        <div id="chart_column">

        </div>

        {!! $chart->render('ColumnChart' , 'YearCount' , 'chart_column') !!}
    </div>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header border-bottom mb-2">
                    <h5>
                        نمودار فروش ماهیانه
                    </h5>
                </section>

                <section class="col-md-12 border-bottom">
                    <figure class="highcharts-figure">
                        <div id="monthly-sales-chart"></div>
                        <p class="highcharts-description">
                            نمودار فروش ماهیانه
                        </p>
                    </figure>
                </section>
            </section>
        </section>
    </section>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header border-bottom mb-2">
                    <h5>
                        نمودار فروش هفتگی
                    </h5>
                </section>

                <section class="col-md-12 border-bottom">
                    <figure class="highcharts-figure">
                        <div id="weekly-sales-chart"></div>
                        <p class="highcharts-description">
                            نمودار فروش هفتگی
                        </p>
                    </figure>
                </section>
            </section>
        </section>
    </section>

{{--    <section class="row">--}}
{{--        <section class="col-12">--}}
{{--            <section class="main-body-container">--}}
{{--                <section class="main-body-container-header border-bottom mb-2">--}}
{{--                    <h5>--}}
{{--                        Highcharts Demos › Ajax loaded data, clickable points نمودار--}}
{{--                    </h5>--}}
{{--                </section>--}}

{{--                <section class="col-md-12 border-bottom">--}}
{{--                    <figure class="highcharts-figure">--}}
{{--                        <div id="container-3"></div>--}}
{{--                        <p class="highcharts-description">--}}
{{--                            Basic line chart showing trends in a dataset. This chart includes the--}}
{{--                            <code>series-label</code> module, which adds a label to each line for--}}
{{--                            enhanced readability.--}}
{{--                        </p>--}}
{{--                    </figure>--}}
{{--                </section>--}}
{{--            </section>--}}
{{--        </section>--}}
{{--    </section>--}}
@endsection
@section('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>

{{--    <script>--}}
{{--        Highcharts.chart('container-1', {--}}

{{--            title: {--}}
{{--                text: 'U.S Solar Employment Growth by Job Category, 2010-2020'--}}
{{--            },--}}

{{--            subtitle: {--}}
{{--                text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>'--}}
{{--            },--}}

{{--            yAxis: {--}}
{{--                title: {--}}
{{--                    text: 'Number of Employees'--}}
{{--                }--}}
{{--            },--}}

{{--            xAxis: {--}}
{{--                accessibility: {--}}
{{--                    rangeDescription: 'Range: 2010 to 2050'--}}
{{--                }--}}
{{--            },--}}

{{--            legend: {--}}
{{--                layout: 'vertical',--}}
{{--                align: 'right',--}}
{{--                verticalAlign: 'middle'--}}
{{--            },--}}

{{--            plotOptions: {--}}
{{--                series: {--}}
{{--                    label: {--}}
{{--                        connectorAllowed: false--}}
{{--                    },--}}
{{--                    pointStart: 2010--}}
{{--                }--}}
{{--            },--}}

{{--            series: [{--}}
{{--                name: 'Installation & Developers',--}}
{{--                data: [43934, 48656, 65165, 81827, 112143, 142383,--}}
{{--                    171533, 165174, 155157, 161454, 154610]--}}
{{--            }, {--}}
{{--                name: 'Manufacturing',--}}
{{--                data: [24916, 37941, 29742, 29851, 32490, 30282,--}}
{{--                    38121, 36885, 33726, 34243, 31050]--}}
{{--            }, {--}}
{{--                name: 'Sales & Distribution',--}}
{{--                data: [11744, 30000, 16005, 19771, 20185, 24377,--}}
{{--                    32147, 30912, 29243, 29213, 25663]--}}
{{--            }, {--}}
{{--                name: 'Operations & Maintenance',--}}
{{--                data: [null, null, null, null, null, null, null,--}}
{{--                    null, 11164, 11218, 10077]--}}
{{--            }, {--}}
{{--                name: 'Other',--}}
{{--                data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,--}}
{{--                    17300, 13053, 11906, 10073]--}}
{{--            }],--}}

{{--            responsive: {--}}
{{--                rules: [{--}}
{{--                    condition: {--}}
{{--                        maxWidth: 500--}}
{{--                    },--}}
{{--                    chartOptions: {--}}
{{--                        legend: {--}}
{{--                            layout: 'horizontal',--}}
{{--                            align: 'center',--}}
{{--                            verticalAlign: 'bottom'--}}
{{--                        }--}}
{{--                    }--}}
{{--                }]--}}
{{--            }--}}

{{--        });--}}
{{--    </script>--}}

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
                monthlySalesChart.series[0].setData(result.data);console.log(result.data)
            })
            .catch(error => console.log(error));

    </script>

{{--    <script>--}}
{{--        // A point click event that uses the Renderer to draw a label next to the point--}}
{{--        // On subsequent clicks, move the existing label instead of creating a new one.--}}
{{--        Highcharts.addEvent(Highcharts.Point, 'click', function () {--}}
{{--            if (this.series.options.className.indexOf('popup-on-click') !== -1) {--}}
{{--                const chart = this.series.chart;--}}
{{--                const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);--}}
{{--                const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;--}}

{{--                const anchorX = this.plotX + this.series.xAxis.pos;--}}
{{--                const anchorY = this.plotY + this.series.yAxis.pos;--}}
{{--                const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';--}}
{{--                const x = align === 'left' ? anchorX + 10 : anchorX - 10;--}}
{{--                const y = anchorY - 30;--}}
{{--                if (!chart.sticky) {--}}
{{--                    chart.sticky = chart.renderer--}}
{{--                        .label(text, x, y, 'callout', anchorX, anchorY)--}}
{{--                        .attr({--}}
{{--                            align,--}}
{{--                            fill: 'rgba(0, 0, 0, 0.75)',--}}
{{--                            padding: 10,--}}
{{--                            zIndex: 7 // Above series, below tooltip--}}
{{--                        })--}}
{{--                        .css({--}}
{{--                            color: 'white'--}}
{{--                        })--}}
{{--                        .on('click', function () {--}}
{{--                            chart.sticky = chart.sticky.destroy();--}}
{{--                        })--}}
{{--                        .add();--}}
{{--                } else {--}}
{{--                    chart.sticky--}}
{{--                        .attr({align, text})--}}
{{--                        .animate({anchorX, anchorY, x, y}, {duration: 250});--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}


{{--        Highcharts.chart('container-3', {--}}

{{--            chart: {--}}
{{--                scrollablePlotArea: {--}}
{{--                    minWidth: 700--}}
{{--                }--}}
{{--            },--}}

{{--            data: {--}}
{{--                csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',--}}
{{--                beforeParse: function (csv) {--}}
{{--                    return csv.replace(/\n\n/g, '\n');--}}
{{--                }--}}
{{--            },--}}

{{--            title: {--}}
{{--                text: 'Daily sessions at www.highcharts.com'--}}
{{--            },--}}

{{--            subtitle: {--}}
{{--                text: 'Source: Google Analytics'--}}
{{--            },--}}

{{--            xAxis: {--}}
{{--                tickInterval: 7 * 24 * 3600 * 1000, // one week--}}
{{--                tickWidth: 0,--}}
{{--                gridLineWidth: 1,--}}
{{--                labels: {--}}
{{--                    align: 'left',--}}
{{--                    x: 3,--}}
{{--                    y: -3--}}
{{--                }--}}
{{--            },--}}

{{--            yAxis: [{ // left y axis--}}
{{--                title: {--}}
{{--                    text: null--}}
{{--                },--}}
{{--                labels: {--}}
{{--                    align: 'left',--}}
{{--                    x: 3,--}}
{{--                    y: 16,--}}
{{--                    format: '{value:.,0f}'--}}
{{--                },--}}
{{--                showFirstLabel: false--}}
{{--            }, { // right y axis--}}
{{--                linkedTo: 0,--}}
{{--                gridLineWidth: 0,--}}
{{--                opposite: true,--}}
{{--                title: {--}}
{{--                    text: null--}}
{{--                },--}}
{{--                labels: {--}}
{{--                    align: 'right',--}}
{{--                    x: -3,--}}
{{--                    y: 16,--}}
{{--                    format: '{value:.,0f}'--}}
{{--                },--}}
{{--                showFirstLabel: false--}}
{{--            }],--}}

{{--            legend: {--}}
{{--                align: 'left',--}}
{{--                verticalAlign: 'top',--}}
{{--                borderWidth: 0--}}
{{--            },--}}

{{--            tooltip: {--}}
{{--                shared: true,--}}
{{--                crosshairs: true--}}
{{--            },--}}

{{--            plotOptions: {--}}
{{--                series: {--}}
{{--                    cursor: 'pointer',--}}
{{--                    className: 'popup-on-click',--}}
{{--                    marker: {--}}
{{--                        lineWidth: 1--}}
{{--                    }--}}
{{--                }--}}
{{--            },--}}

{{--            series: [{--}}
{{--                name: 'All sessions',--}}
{{--                lineWidth: 4,--}}
{{--                marker: {--}}
{{--                    radius: 4--}}
{{--                }--}}
{{--            }, {--}}
{{--                name: 'New users'--}}
{{--            }]--}}
{{--        });--}}

{{--    </script>--}}
@endsection
