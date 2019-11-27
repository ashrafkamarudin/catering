@extends('layouts.customer')

@section('content')

<div class="container">
    <div class="row" style="height:90vh;">
        <div class="col-lg-12 text-center" style="margin:auto;">
            <div class="row" style="margin-top:-91px;">
                <div class="col-lg-12">
                    <h2> Check Out </h2>

                    <p class="mt-5">Your order ID is</p>
                    <h2 style="margin-top: -10px"> {{ $order->uuid }} </h2>
                    <p>Please make sure you order the right items</p>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <button id="pay-button" class="btn btn-primary">
                        Proceed to Pay
                    </button>
                </div>
            </div>

            @foreach ($order->items as $item)
                
            <div class="media p-2 mt-5" style="background:#9e9e9e21;max-width:450px;margin:auto">
                <img class="mr-3" width="64px" height="64px" src="{{ asset('media/thumbnails/'.json_decode($item->item)->attributes->package->image) }}" alt="Generic placeholder image">
                <div class="media-body">
                    <h5 class="mt-0">{{ json_decode($item->item)->name }} x {{ json_decode($item->item)->quantity }}</h5>
                    {{ json_decode($item->item)->attributes->package->short_description }}
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>

@endsection

@section('script')
<script src="https://js.stripe.com/v3/"></script>

<script>
// window.onload=function(){
//   document.getElementById("pay-button").click();
// };

var stripe = Stripe('pk_test_65wAWRCaupNlIbKuGoOxE1hQ00WP11fkr1');

const payButton = document.getElementById('pay-button');
const sessionId = '{!! $session->id !!}';
payButton.addEventListener('click', async (e) => {
    stripe.redirectToCheckout({
        sessionId: sessionId
    });
});
</script>
@endsection

