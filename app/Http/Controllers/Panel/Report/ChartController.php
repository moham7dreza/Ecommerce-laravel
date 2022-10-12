<?php

namespace App\Http\Controllers\Panel\Report;

use App\Http\Controllers\Controller;

class ChartController extends Controller
{
    public function salesChart()
    {
        return view('panel.report.charts.sales.index');
    }
}
