<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class ChartController extends Controller
{
    public function salesChart(): Factory|View|Application
    {
        return view('admin.report.charts.sales.index');
    }
}
