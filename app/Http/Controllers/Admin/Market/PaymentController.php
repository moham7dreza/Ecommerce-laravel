<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Payment;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-product-all-payments')->only(['index']);
        $this->middleware('can:permission-product-online-payments')->only(['online']);
        $this->middleware('can:permission-product-offline-payments')->only(['offline']);
        $this->middleware('can:permission-product-cash-payments')->only(['cash']);
        $this->middleware('can:permission-product-payment-cancel,
                                        permission-product-online-payment-cancel,
                                        permission-product-offline-payment-cancel,
                                        permission-product-cash-payment-cancel')->only(['canceled']);
        $this->middleware('can:permission-product-payment-return,
                                        permission-product-online-payment-return,
                                        permission-product-offline-payment-return,
                                        permission-product-cash-payment-return')->only(['returned']);
        $this->middleware('can:permission-product-payment-show,
                                        permission-product-online-payment-show,
                                        permission-product-offline-payment-show,
                                        permission-product-cash-payment-show')->only(['show']);
    }

    public function index()
    {
        $payments = Payment::all();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function offline()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OfflinePayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function online()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\OnlinePayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function cash()
    {
        $payments = Payment::where('paymentable_type', 'App\Models\Market\CashPayment')->get();
        return view('admin.market.payment.index', compact('payments'));
    }

    public function canceled(Payment $payment)
    {
        $payment->status = 2;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر شما با موفقیت انجام شد');
    }

    public function returned(Payment $payment)
    {
        $payment->status = 3;
        $payment->save();
        return redirect()->route('admin.market.payment.index')->with('swal-success', 'تغییر شما با موفقیت انجام شد');
    }

    public function show(Payment $payment)
    {
        return view('admin.market.payment.show', compact('payment'));
    }
}
