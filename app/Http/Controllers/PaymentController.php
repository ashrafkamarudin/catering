<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class PaymentController extends Controller
{

    public function makePayment()
    {
        
        $items = [];

        foreach (Cart::session(auth()->user()->id)->getContent() as $item) {
            $items[] = [
                'name' => $item->name,
                'description' => '-',
                'images' => [config('app.url').'/media/thumbnails/'.$item->image],
                'amount' => $item->price . '00',
                'currency' => 'myr',
                'quantity' => $item->quantity,
            ];
        }

        $stripeSession = app('StripeService')->oneTimePayment($items);

        return view('checkout')->withSession($stripeSession);
    }

    public function oneTimePaymentWebhook()
    {
        $response = app('StripeService')->onCheckoutSessionCompleted();
        return $response;
    }

    public function displaySuccessPage()
    {
        return view('success');
    }

    public function displayFailPage()
    {
        return view('fail');
    }
}
