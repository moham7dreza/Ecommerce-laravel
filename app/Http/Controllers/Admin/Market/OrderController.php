<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Market\Order;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:permission-product-new-orders')->only(['newOrders']);
        $this->middleware('can:permission-product-sending-orders')->only(['sending']);
        $this->middleware('can:permission-product-canceled-orders')->only(['canceled']);
        $this->middleware('can:permission-product-all-orders')->only(['all']);
        $this->middleware('can:permission-product-unpaid-orders')->only(['unpaid']);
        $this->middleware('can:permission-product-returned-orders')->only(['returned']);
        $this->middleware('can:permission-product-order-show,
                                        permission-product-returned-order-show,
                                        permission-product-canceled-order-show,
                                        permission-product-sending-order-show,
                                        permission-product-unpaid-order-show,
                                        permission-product-new-order-show')->only(['show']);
        $this->middleware('can:permission-product-order-detail
                                        permission-product-returned-order-detail,
                                        permission-product-canceled-order-detail,
                                        permission-product-sending-order-detail,
                                        permission-product-unpaid-order-detail,
                                        permission-product-new-order-detail')->only(['detail']);
        $this->middleware('can:permission-product-order-status
                                        permission-product-returned-order-status,
                                        permission-product-canceled-order-status,
                                        permission-product-sending-order-status,
                                        permission-product-unpaid-order-status,
                                        permission-product-new-order-status')->only(['changeOrderStatus']);
        $this->middleware('can:permission-product-order-send-status
                                        permission-product-returned-order-send-status,
                                        permission-product-canceled-order-send-status,
                                        permission-product-sending-order-send-status,
                                        permission-product-unpaid-order-send-status,
                                        permission-product-new-order-send-status')->only(['changeSendStatus']);
    }

    public function newOrders()
    {
        $orders = Order::where('order_status', 0)->get();
        foreach ($orders as $order) {
            $order->order_status = 1;
            $result = $order->save();
        }
        return view('admin.market.order.index', compact('orders'));
    }

    public function sending()
    {
        $orders = Order::where('delivery_status', 1)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function unpaid()
    {
        $orders = Order::where('payment_status', 0)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function canceled()
    {
        $orders = Order::where('order_status', 4)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function returned()
    {
        $orders = Order::where('order_status', 5)->get();
        return view('admin.market.order.index', compact('orders'));
    }

    public function all()
    {
        $orders = Order::all();
        return view('admin.market.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('admin.market.order.show', compact('order'));
    }

    public function detail(Order $order)
    {
        return view('admin.market.order.detail', compact('order'));
    }

    public function changeSendStatus(Order $order)
    {
        switch ($order->delivery_status) {
            case 0:
                $order->delivery_status = 1;
                break;
            case 1:
                $order->delivery_status = 2;
                break;
            case 2:
                $order->delivery_status = 3;
                break;
            default :
                $order->delivery_status = 0;
        }
        $order->save();
        return back();
    }

    public function changeOrderStatus(Order $order)
    {
        switch ($order->order_status) {
            case 1:
                $order->order_status = 2;
                break;
            case 2:
                $order->order_status = 3;
                break;
            case 3:
                $order->order_status = 4;
                break;
            case 4:
                $order->order_status = 5;
                break;
            case 5:
                $order->order_status = 6;
                break;
            default :
                $order->order_status = 1;
        }
        $order->save();
        return back();
    }

    public function cancelOrder(Order $order)
    {
        $order->order_status = 4;
        $order->save();
        return back();
    }
}
