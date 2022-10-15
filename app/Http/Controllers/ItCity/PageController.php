<?php

namespace App\Http\Controllers\ItCity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutUs()
    {
        return view('it-city.pages.about-us');
    }

    public function contactUs()
    {
        return view('it-city.pages.contact-us');
    }

    public function warrantyRules()
    {
        return view('it-city.pages.warranty-rules');
    }

    public function faq()
    {
        return view('it-city.pages.faq');
    }

    public function installment()
    {
        return view('it-city.pages.installment');
    }

    public function whyThisShop()
    {
        return view('it-city.pages.why-this-shop');
    }

    public function howToBuy()
    {
        return view('it-city.pages.how-to-buy');
    }

    public function price()
    {
        return view('it-city.pages.price');
    }

    public function career()
    {
        return view('it-city.pages.career');
    }

    public function privacyPolicy()
    {
        return view('it-city.pages.privacy-policy');
    }

    public function makeAppointment()
    {
        return view('it-city.pages.make-appointment');
    }

    public function smartAssembleSystem()
    {
        return view('it-city.pages.smart-assemble-system');
    }
}
