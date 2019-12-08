<?php

namespace App\Http\Controllers\Manage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Package;
use App\Sale;
use App\Order;
use App\User;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $package = Package::all();
        $sale = Sale::all();
        $order = Order::all();
        $customer = User::all();

        return view('manage.dashboard')
            ->withPackageCount($package->count())
            ->withOrderCount($order->count())
            ->withRevenue($sale->sum('totalAmount'))
            ->withCustomer($customer->count());
    }
}
