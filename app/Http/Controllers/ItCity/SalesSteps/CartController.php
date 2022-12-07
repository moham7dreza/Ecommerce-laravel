<?php

namespace App\Http\Controllers\ItCity\SalesSteps;

use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function cart()
    {
        return view('it-city.store.sales-steps.cart');
    }

    public function checkout()
    {
        return view('it-city.store.sales-steps.checkout');
    }
}
