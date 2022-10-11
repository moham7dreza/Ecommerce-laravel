<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function salesChart()
    {
        return view('admin.report.charts.sales.index');
    }
}
