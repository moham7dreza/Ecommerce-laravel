<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Dashboard\DashboardRepo;
use Illuminate\Http\Request;

class AdminToController extends Controller
{
    public function home(DashboardRepo $dashboardRepo)
    {
        return view('adminto.index', compact(['dashboardRepo']));
    }
}
