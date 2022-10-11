<?php $__env->startSection('head-tag'); ?>
    <title>نمودار فروش</title>
    <link rel="stylesheet" href="<?php echo e(asset('admin-assets/css/chart.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item font-size-12"><a href="#">خانه</a></li>
            <li class="breadcrumb-item font-size-12"><a href="#">گزارشات</a></li>
            <li class="breadcrumb-item font-size-12 active" aria-current="page"> نمودار فروش</li>
        </ol>
    </nav>

    <section class="row">
        <section class="col-12">
            <section class="main-body-container">
                <section class="main-body-container-header border-bottom mb-2">
                    <h5>
                        Highcharts Demos › Ajax loaded data, clickable points نمودار
                    </h5>
                </section>

                <section class="col-md-12 border-bottom">
                    <figure class="highcharts-figure">
                        <div id="container-2"></div>
                        <p class="highcharts-description">
                            Basic line chart showing trends in a dataset. This chart includes the
                            <code>series-label</code> module, which adds a label to each line for
                            enhanced readability.
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
                        Highcharts Demos › Ajax loaded data, clickable points نمودار
                    </h5>
                </section>

                <section class="col-md-12 border-bottom">
                    <figure class="highcharts-figure">
                        <div id="container-3"></div>
                        <p class="highcharts-description">
                            Basic line chart showing trends in a dataset. This chart includes the
                            <code>series-label</code> module, which adds a label to each line for
                            enhanced readability.
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
                        Highcharts Demos › Ajax loaded data, clickable points نمودار
                    </h5>
                </section>

                <section class="col-md-12 border-bottom">
                    <figure class="highcharts-figure">
                        <div id="container-1"></div>
                        <p class="highcharts-description">
                            Basic line chart showing trends in a dataset. This chart includes the
                            <code>series-label</code> module, which adds a label to each line for
                            enhanced readability.
                        </p>
                    </figure>
                </section>
            </section>
        </section>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>

    <script>
        Highcharts.chart('container-1', {

            title: {
                text: 'U.S Solar Employment Growth by Job Category, 2010-2020'
            },

            subtitle: {
                text: 'Source: <a href="https://irecusa.org/programs/solar-jobs-census/" target="_blank">IREC</a>'
            },

            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2050'
                }
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Installation & Developers',
                data: [43934, 48656, 65165, 81827, 112143, 142383,
                    171533, 165174, 155157, 161454, 154610]
            }, {
                name: 'Manufacturing',
                data: [24916, 37941, 29742, 29851, 32490, 30282,
                    38121, 36885, 33726, 34243, 31050]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 30000, 16005, 19771, 20185, 24377,
                    32147, 30912, 29243, 29213, 25663]
            }, {
                name: 'Operations & Maintenance',
                data: [null, null, null, null, null, null, null,
                    null, 11164, 11218, 10077]
            }, {
                name: 'Other',
                data: [21908, 5548, 8105, 11248, 8989, 11816, 18274,
                    17300, 13053, 11906, 10073]
            }],

            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>

    <script>
        // Data retrieved https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature
        Highcharts.chart('container-2', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Monthly Average Temperature'
            },
            subtitle: {
                text: 'Source: ' +
                    '<a href="https://en.wikipedia.org/wiki/List_of_cities_by_average_temperature" ' +
                    'target="_blank">Wikipedia.com</a>'
            },
            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },
            yAxis: {
                title: {
                    text: 'Temperature (°C)'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Reggane',
                data: [16.0, 18.2, 23.1, 27.9, 32.2, 36.4, 39.8, 38.4, 35.5, 29.2,
                    22.0, 17.8]
            }, {
                name: 'Tallinn',
                data: [-2.9, -3.6, -0.6, 4.8, 10.2, 14.5, 17.6, 16.5, 12.0, 6.5,
                    2.0, -0.9]
            }]
        });

    </script>

    <script>
        // A point click event that uses the Renderer to draw a label next to the point
        // On subsequent clicks, move the existing label instead of creating a new one.
        Highcharts.addEvent(Highcharts.Point, 'click', function () {
            if (this.series.options.className.indexOf('popup-on-click') !== -1) {
                const chart = this.series.chart;
                const date = Highcharts.dateFormat('%A, %b %e, %Y', this.x);
                const text = `<b>${date}</b><br/>${this.y} ${this.series.name}`;

                const anchorX = this.plotX + this.series.xAxis.pos;
                const anchorY = this.plotY + this.series.yAxis.pos;
                const align = anchorX < chart.chartWidth - 200 ? 'left' : 'right';
                const x = align === 'left' ? anchorX + 10 : anchorX - 10;
                const y = anchorY - 30;
                if (!chart.sticky) {
                    chart.sticky = chart.renderer
                        .label(text, x, y, 'callout',  anchorX, anchorY)
                        .attr({
                            align,
                            fill: 'rgba(0, 0, 0, 0.75)',
                            padding: 10,
                            zIndex: 7 // Above series, below tooltip
                        })
                        .css({
                            color: 'white'
                        })
                        .on('click', function () {
                            chart.sticky = chart.sticky.destroy();
                        })
                        .add();
                } else {
                    chart.sticky
                        .attr({ align, text })
                        .animate({ anchorX, anchorY, x, y }, { duration: 250 });
                }
            }
        });


        Highcharts.chart('container-3', {

            chart: {
                scrollablePlotArea: {
                    minWidth: 700
                }
            },

            data: {
                csvURL: 'https://cdn.jsdelivr.net/gh/highcharts/highcharts@v7.0.0/samples/data/analytics.csv',
                beforeParse: function (csv) {
                    return csv.replace(/\n\n/g, '\n');
                }
            },

            title: {
                text: 'Daily sessions at www.highcharts.com'
            },

            subtitle: {
                text: 'Source: Google Analytics'
            },

            xAxis: {
                tickInterval: 7 * 24 * 3600 * 1000, // one week
                tickWidth: 0,
                gridLineWidth: 1,
                labels: {
                    align: 'left',
                    x: 3,
                    y: -3
                }
            },

            yAxis: [{ // left y axis
                title: {
                    text: null
                },
                labels: {
                    align: 'left',
                    x: 3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }, { // right y axis
                linkedTo: 0,
                gridLineWidth: 0,
                opposite: true,
                title: {
                    text: null
                },
                labels: {
                    align: 'right',
                    x: -3,
                    y: 16,
                    format: '{value:.,0f}'
                },
                showFirstLabel: false
            }],

            legend: {
                align: 'left',
                verticalAlign: 'top',
                borderWidth: 0
            },

            tooltip: {
                shared: true,
                crosshairs: true
            },

            plotOptions: {
                series: {
                    cursor: 'pointer',
                    className: 'popup-on-click',
                    marker: {
                        lineWidth: 1
                    }
                }
            },

            series: [{
                name: 'All sessions',
                lineWidth: 4,
                marker: {
                    radius: 4
                }
            }, {
                name: 'New users'
            }]
        });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\CODEX\techzilla\resources\views/admin/report/charts/sales/index.blade.php ENDPATH**/ ?>