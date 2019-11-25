<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Session;

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
        //dd(collect(explode(",",$order->orderStatus))->contains('Approved'));
        return view('manage.order.show')
                ->withOrder($order)
                ->withStatuses(collect(explode(",",$order->orderStatus)));
    }

    public function approve(Order $order)
    {
        $order->update([
            'orderStatus'   => 'Approved'
        ]);

        Session::flash('success', Sprintf('Order has been approved'));

        return redirect()->route('manage:order:show', $order->id);
    }
    
    public function complete(Order $order)
    {
        if (collect(explode(',', $order->orderStatus))->contains('Approved') == false) {
            Session::flash('error', Sprintf('Order must be approve first.'));
            return back();
        }

        if ($order->paymentStatus == 'Pending') {
            Session::flash('error', Sprintf('Order must be fully paid first.'));
            return back();
        }

        $order->update([
            'orderStatus'   => implode(",",array_merge([$order->orderStatus], ['Completed']))
        ]);
    
        Session::flash('success', Sprintf('Order is now complete.'));

        return redirect()->route('manage:order:show', $order->id);
    }
}
