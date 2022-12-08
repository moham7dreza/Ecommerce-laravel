<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Admin\HomeRepo;
use App\Models\User;
use App\Models\User\Permission;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-adminty-panel')->only(['index']);
    }

    public function index(HomeRepo $homeRepo): Factory|View|Application
    {
        return view('admin.index', compact(['homeRepo']));
    }
}
