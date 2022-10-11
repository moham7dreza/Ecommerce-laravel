<?php

namespace App\Http\Controllers\Admin\Report;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function salesChart()
    {
        $payments = Payment::query()->orderBy('updated_at', 'desc')->get()->pluck('amount');
        return view('admin.report.charts.sales.index', compact('payments'));
    }
}
