<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Http\Repositories\Panel\PanelRepo;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index(PanelRepo $panelRepo)
    {
        return view('panel.index', compact(['panelRepo']));
    }

    public function admintoHome()
    {
        return view('adminto.index');
    }
}
