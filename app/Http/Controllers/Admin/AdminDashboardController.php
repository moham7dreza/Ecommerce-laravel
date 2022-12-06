<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Log;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;


class AdminDashboardController extends Controller
{
    public function index(): Factory|View|Application
    {
//        $logs = Activity::all();
        $logs = Log::query()->latest()->paginate(5);
        return view('admin.index', compact(['logs']));
    }
}
