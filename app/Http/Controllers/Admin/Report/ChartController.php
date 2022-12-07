<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Khill\Lavacharts\Lavacharts;

class ChartController extends Controller
{
    public function salesChart(): Factory|View|Application
    {
        $chart = new Lavacharts();
        $data = $chart->DataTable();
        $data->addStringColumn('سال')
            ->addNumberColumn('تعداد')
            ->addRow(['1390', rand(1000, 9000)])
            ->addRow(['1391', rand(1000, 9000)])
            ->addRow(['1392', rand(1000, 9000)])
            ->addRow(['1393', rand(1000, 9000)])
            ->addRow(['1394', rand(1000, 9000)])
            ->addRow(['1395', rand(1000, 9000)])
            ->addRow(['1396', rand(1000, 9000)])
            ->addRow(['1397', rand(1000, 9000)])
            ->addRow(['1398', rand(1000, 9000)])
            ->addRow(['1399', rand(1000, 9000)])
            ->addRow(['1400', rand(1000, 9000)]);
        $chart->ColumnChart('YearCount', $data, [
            'title' => 'تعداد در سال',
            'titleTextStyle' => [
                'fontSize' => 14,
                'color' => 'green',
                'background' => 'red'
            ],
            'elementId' => 'chart_column',
            'fontName' => 'tahoma'
        ]);
        return view('admin.report.charts.sales.index', compact(['chart']));
    }
}
