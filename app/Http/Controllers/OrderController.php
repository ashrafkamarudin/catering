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
use App\Http\Requests\Order\CreateOrderRequest;

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

    public function checkout(Order $order)
    {
        $stripeSession = $this->getStripeSession($order);

        return view('checkout')
            ->withOrder($order)
            ->withSession($stripeSession);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStripeSession(Order $order){
        // need to change to place order

        $order->load(['items']);

        $items = [];
        foreach ($order->items as $item) {

            $decodedItem = json_decode($item->item);
            $items[] = [
                'name'          => $decodedItem->name,
                'description'   => $decodedItem->attributes->package->short_description,
                'images'        => [config('app.url').'/media/thumbnails/'.$decodedItem->attributes->package->image],
                'amount'        => $decodedItem->price . '00',
                'currency'      => 'myr',
                'quantity'      => $decodedItem->quantity,
            ];
        }

        $stripeSession = app('StripeService')->oneTimePayment($items);

        $order->update([
            'stripeSessionId'   => $stripeSession->id
        ]);

        return $stripeSession;
    }

    public function create(CreateOrderRequest $request)
    {
        $cartContent = app('CartService')->getContent();

        if ($cartContent['content']->isEmpty()) {
            Session::flash('error', 'Please add at least one item to Order List');

            return redirect()->route('order:list');
        }

        $order = DB::transaction(function () use ($cartContent, $request) {
            $order = Order::create([
                'uuid'                      => (string) Str::uuid(),
                'user_id'                   => auth()->user()->id,
                'paymentStatus'             => 'Pending',
                'orderStatus'               => 'Pending Approval',
                'email'                     => $request->email,
                'name'                      => $request->name,
                'phoneNo'                   => $request->phoneNo,
                'eventDate'                 => $request->eventDate,
                'address'                   => $request->address,
                'subTotal'                  => 0,
                'total'                     => $cartContent['total'],
                'stripeSessionId'           => '',
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

        //app('CartService')->clear();

        return redirect()->route('order:checkout', $order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Package $package)
    {
        app('CartService')->add([
            'id'            => $package->id,
            'name'          => $package->name,
            'price'         => $package->price,
            'quantity'      => $request->get('quantity'),
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

    public function customer(Package $package, $id){

        $orders = Order::where('user_id', $id)->get();

        return view('customer.order')->withOrders($orders);
    }
}
