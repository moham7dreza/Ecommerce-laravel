<?php

namespace App\Http\Controllers\ItCity\PC;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PcSmartAssembleController extends Controller
{
    public function index()
    {
        return view('it-city.pc.smart-assemble.index');
    }
}
