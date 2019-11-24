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
            'success_url' => env('APP_URL').'/payment/success?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => env('APP_URL').'/payment/cancel',
            ]);

        return $session;
    }

    public function onCheckoutSessionCompleted()
    {   
        \Log::info('inside');

        $payload = @file_get_contents('php://input');
        $sig_header = request()->server('HTTP_STRIPE_SIGNATURE');
        //request()->header('HTTP_STRIPE_SIGNATURE');
        $event = null;

        \Log::info('incomplete');
        \Log::info(request()->header('HTTP_STRIPE_SIGNATURE'));

        try {
            $event = \Stripe\Webhook::constructEvent(
                $payload, $sig_header, $this->webhookSecret
            );
        } catch(\UnexpectedValueException $e) {
            // Invalid payload
            \Log::info('invalid payload');
            http_response_code(400);
            exit();
        } catch(\Stripe\Exception\SignatureVerificationException $e) {
            // Invalid signature
            \Log::info('invalid signature');
            http_response_code(400);
            exit();
        }
        \Log::info('almost');
        // Handle the checkout.session.completed event
        if ($event->type == 'checkout.session.completed') {
            $session = $event->data->object;
            \Log::info('complete');

            // Fulfill the purchase...
            $this->generatePaymentReceipt($session);
        }

        http_response_code(200);

        return response()->json($session);
    }

    public function generatePaymentReceipt($StripeRequest)
    {
        \Log::info(Order::all());
        \Log::info($order = Order::where('stripeSessionId', $StripeRequest->id)->first());

        DB::transaction(function () use ($StripeRequest) {
            
            Sale::create([
                'user_id' => 1,
                'payment_id' => $StripeRequest->payment_intent,
                'receiptNumber' => Carbon::now()->timestamp,
                'items' => json_encode($StripeRequest->display_items),
                'tax'   => 0,
                'subTotal'  => 0,
                'totalAmount' => 0,
                'paid_at'   => now(),
            ]);

            $order = Order::where('stripeSessionId', $StripeRequest->id)->first();

            $order->update([
                'paymentStatus' => 'Paid'
            ]);

            return true;
        });

        return true;
    }
}