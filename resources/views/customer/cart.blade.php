@extends('layouts.customer')

@section('content')

<div class="container" style="margin-top:2%">
    <h2 class="text-center" style="padding-bottom:2%">Orders</h2>
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
                        <img src="{{ asset('media/thumbnails/'.$item->attributes['package']['image']) }}" class="mr-3" alt="..." width="128" height="128">
                        <div class="media-body">
                            <h5 class="mt-0">{{ $item->name }}</h5>
                            {{ $item->attributes['package']['short_description'] }}
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
    <div class="row" style="margin-bottom:2%">
        <div class="col-lg-8">
            <div class="card">
                <h5 class="card-header">Event Details</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('order:checkout') }}" id="checkout">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}">
                                
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name')}}">

                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="inputEmail4">Phone Number</label>
                                <input type="no" class="form-control @error('phoneNo') is-invalid @enderror" name="phoneNo" id="phoneNo" value="{{ old('phoneNo')}}">
                                
                                @error('phoneNo')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Event Date</label>
                                <input type="date" class="form-control @error('eventDate') is-invalid @enderror" name="eventDate" id="eventDate" value="{{ old('eventDate')}}">

                                @error('eventDate')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" id="address" value="{{ old('address')}}">

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }} 
                                </div>
                            @enderror
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <h5 class="card-header">Order Summary</h5>
                <div class="card-body">
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
                    </table>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6">
                            <a href="{{ route('order:clear') }}" class="btn btn-danger btn-block">Clear Cart</a>
                        </div>
                        <div class="col-lg-6">
                                <button type="submit" form="checkout" class="btn btn-success btn-block">Checkout</button>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
    
</div>

@endsection