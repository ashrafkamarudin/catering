@extends('layouts.customer')

@section('content')

<h2 class="text-center" style="margin-top:2%"> Order Summary</h2>

<div class="container">

    <table class="table table-bordered" style="margin-top:2%">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Order Id</th>
                <th scope="col" class="text-center">Event Date</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Status</th>
                <th scope="col" class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row" class="text-center">{{$order->id}}</th>
                    <td class="text-center">{{$order->uuid}}</td>
                    <td class="text-center">{{$order->eventDate}}</td>
                    <td class="text-right">RM {{$order->total}}</td>
                    <td class="text-center">{{$order->paymentStatus}}</td>
                    <td class="text-center">
                        <a href="{{ route('order:checkout', $order) }}">Checkout</a>
                    </td>
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection