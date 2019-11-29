<?php

namespace App\Services;

use App\Services\BaseService;
use App\User;
use App\Sale;
use App\Order;
use Carbon\Carbon;
use Cart;
use DB;

class StripeService extends BaseService 
{
    private $apiKey;
    private $secretKey;
    private $webhookSecret;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->apiKey = config('services.stripe.key');
        $this->secretKey = config('services.stripe.secret');
        $this->webhookSecret = config('services.stripe.webhook.secret');

        \Stripe\Stripe::setApiKey($this->secretKey);
    }

    public function oneTimePayment($items)
    {

        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [$items],
            'success_url' => config('app.url') .'/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => config('app.url') .'/payment/cancel',
            ]);

        return $session;
    }

    public function onCheckoutSessionCompleted()
    {   
        $payload = @file_get_contents('php://input');
        $sig_header = request()->server('HTTP_STRIPE_SIGNATURE');
        //request()->header('HTTP_STRIPE_SIGNATURE');
        $event = null;

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $this->webhookSecret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            http_response_code(400);
            exit();
        }
        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;

            // Fulfill the purchase...
            $this->generatePaymentReceipt($session);
        }

        http_response_code(200);

        return response()->json($session);
    }

    public function generatePaymentReceipt($StripeRequest)
    {
        DB::transaction(function () use ($StripeRequest) {

            $order = Order::where('stripeSessionId', $StripeRequest->id)->first();

            $order->update([
                'paymentStatus' => 'Paid'
            ]);

            \Log::info($order);
            
            Sale::create([
                'user_id' => $order->user_id,
                'payment_id' => $StripeRequest->payment_intent,
                'receiptNumber' => Carbon::now()->timestamp,
                'items' => json_encode($StripeRequest->display_items),
                'tax'   => 0,
                'subTotal'  => $order->subTotal,
                'totalAmount' => $order->total,
                'paid_at'   => now(),
            ]);

            return true;
        });

        return true;
    }
}