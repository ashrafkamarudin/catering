<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;
use Session;
use App\Package;
use App\Order;
use App\OrderItem;

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

        $content = app('CartService')->getItems();

        if ($content->isEmpty()) {
            Session::flash('error', 'Please add at least one item to Order List');

            return redirect()->route('cart:cart');
        }

        DB::transaction(function () use ($content) {
            $order = Order::create([
                'status' => 'pending'
            ]);

            foreach ($content as $item) {
                OrderItem::create([
                    'order_id'  => $order->id,
                    'item'          => json_encode($item)
                ]);
            }

            return true;
        });

        app('CartService')->clear();

        $items = [];

        foreach ($content as $item) {
            $items[] = [
                'name'          => $item->name,
                'description'   => '-',
                'images'        => [env('APP_URL').'/media/thumbnails/'.$item->image],
                'amount'        => $item->price . '00',
                'currency'      => 'myr',
                'quantity'      => $item->quantity,
            ];
        }

        $stripeSession = app('StripeService')->oneTimePayment($items);

        return view('checkout')
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
            'attributes'    => array('image'=> $package->image,)
        ]);

        return redirect()->back();
    }
}
