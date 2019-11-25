<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::paginate(5);

        return view('manage.order.index')->withOrders($orders);
    }

    public function show(order $order)
    {
        return view('manage.order.show')->withOrder($order);
    }

    public function approve(Order $order)
    {
        $order->update([
            'orderStatus'   => 'Approved'
        ]);

        Session::flash('success', Sprintf('Order has been approved'));

        return redirect()->route('manage:package:show', $order->id);
    }
    
    public function complete(Order $order)
    {
        Session::flash('success', Sprintf('Order is now complete.'));

        return redirect()->route('manage:package:show', $order->id);
    }
}
