<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\HomeRepo;
use App\Models\Log;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AdminDashboardController extends Controller
{
    public function index(HomeRepo $homeRepo): Factory|View|Application
    {
//        $logs = Activity::all();
        $logs = Log::query()->latest()->paginate(5);
        return view('admin.index', compact(['logs', 'homeRepo']));
    }
}
