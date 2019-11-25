@extends('layouts.customer')

@section('content')

<div class="container" style="margin-top:2%">
    <h2 class="text-center" style="padding-bottom:2%">Orders</h2>
    <a href="{{ route('order:clear') }}">Clear Cart</a>
    <table class="table table-borderless">
    <thead >
        <tr >
        <th scope="col" class="border" style="text-align:center">No.</th>
        <th scope="col" class="border" style="text-align:center">Name</th>
        <th scope="col" class="border" style="text-align:center" width="13%">Quantity</th>
        <th scope="col" class="border" style="text-align:right">Price</th>
        </tr>
    </thead>
    <tbody class="border">
        @foreach ($items as $key =>$item)
            <tr>
                <th scope="row" class="border-bottom" style="text-align:center">{{$key+1}}</th>
                <td class="border-bottom">
                    <div class="media">
                        <img src="{{ asset('media/thumbnails/'.$item->attributes['package']->image) }}" class="mr-3" alt="..." width="128" height="128">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $item->name }}</h5>
                            {{ $item->attributes['package']->short_description }}
                        </div>
                    </div>
                </td>
                <td class="border-bottom" class="text-center"  style="width:12%">
                    <div class="input-group form-row" >
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button"><i class="fas fa-plus"></i></button>
                        </div>
                        <input type="text" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1" value="{{ $item->quantity }}">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button"><i class="fas fa-minus"></i></button>
                        </div>
                    </div>
                </td>
                <td class="border-bottom" align="right">RM {{ $item->price }}</td>
            </tr>
            
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" class="border" align="right"><b>Total</b></td>
            <td class="border" align="right"><b>RM {{ $total }}</b></td>
        </tr>
    </tfoot>
    </table>

    <div class="col-lg-4 offset-lg-8">
        <table class="table table-borderless">
            <tr>
                <td>Total</td>
                <td>RM {{ $total }}</td>
            </tr>
            <tr>
                <td>Services Charges</td>
                <td>RM {{ $services = 0}}</td>
            </tr>
            <tr class="border-top border-dark">
                <td>Total Amount</td>
                <td>RM {{ $total + $services }}</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit" form="checkout" class="button"> Proceed to Checkout</button></td>

                <form method="GET" action="{{ route('order:checkout') }}" id="checkout">
                </form>
            </tr>
        </table>
    </div>
</div>

@endsection