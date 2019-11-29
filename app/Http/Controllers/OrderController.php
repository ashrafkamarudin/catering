<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Package;
use App\Order;
use App\OrderItem;
use Cart;
use DB;
use Session;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $cartContent = app('CartService')->getContent();

        return view('customer.cart')
            ->withItems($cartContent['content'])
            ->withTotal($cartContent['total']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(){

        // need to change to place order

        $cartContent = app('CartService')->getContent();

        if ($cartContent['content']->isEmpty()) {
            Session::flash('error', 'Please add at least one item to Order List');

            return redirect()->route('order:list');
        }

        $items = [];
        foreach ($cartContent['content'] as $item) {
            $items[] = [
                'name'          => $item->name,
                'description'   => $item->attributes['package']['short_description'],
                'images'        => [config('app.url').'/media/thumbnails/'.$item->attributes['package']['image']],
                'amount'        => $item->price . '00',
                'currency'      => 'myr',
                'quantity'      => $item->quantity,
            ];
        }

        $stripeSession = app('StripeService')->oneTimePayment($items);

        $order = DB::transaction(function () use ($cartContent, $stripeSession) {
            $order = Order::create([
                'uuid'                      => (string) Str::uuid(),
                'user_id'                   => auth()->user()->id,
                'paymentStatus'             => 'Pending',
                'orderStatus'               => 'Pending Approval',
                'subTotal'                  => 0,
                'total'                     => $cartContent['total'],
                'stripeSessionId'           => $stripeSession->id,
                'stripeSessionIdExpiry_at'  => Carbon::now()->addHours(24),
            ]);

            foreach ($cartContent['content'] as $item) {
                OrderItem::create([
                    'order_id'  => $order->id,
                    'item'          => json_encode($item)
                ]);
            }

            return $order;
        });

        $order->load(['items']);

        app('CartService')->clear();

        return view('checkout')
                ->withOrder($order)
                ->withSession($stripeSession);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Package $package)
    {
        app('CartService')->add([
            'id'            => $package->id,
            'name'          => $package->name,
            'price'         => $package->price,
            'quantity'      => 1,
            'attributes'    => [
                'package'=> $package->only(['image', 'short_description']),
            ]
        ]);

        return redirect()->back();
    }
    
    public function clear()
    {
        app('CartService')->clear();

        return back();
    }
}
