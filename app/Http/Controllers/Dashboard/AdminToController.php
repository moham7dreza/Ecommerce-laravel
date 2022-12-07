<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\DashboardRepo;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class AdminToController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-admin-to-panel')->only(['home']);
    }

    public function home(DashboardRepo $dashboardRepo): Factory|View|Application
    {
        return view('adminto.index', compact(['dashboardRepo']));
    }
}
