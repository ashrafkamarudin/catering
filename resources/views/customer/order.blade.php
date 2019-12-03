@extends('layouts.customer')

@section('content')

<h2 class="text-center" style="margin-top:2%"> Order Summary</h2>

<div class="container">
    <div class="card">
        <form>
            <div class="row">
                <div class="col-md-3" style="padding-top:1%;padding-left:2%">
                    <div class="form-group">
                        <h5 for="formGroupExampleInput">Order Id</h5>
                        <input type="text" class="form-control" name="package" id="package" placeholder="">
                    </div>             
                </div>
                <div class="col-md-3" style="padding-top:1%;padding-left:2%">
                    <div class="form-group">
                        <h5 for="formGroupExampleInput">Event Date</h5>
                        <input type="date" class="form-control" name="eventDate" id="eventDate">
                    </div>             
                </div>
                <div class="col-md-3"></div>
                <div class="col-md-3" style="padding-top:4%;padding-right:2%">
                    <button type="submit" class="btn btn-success btn-block"> Submit</button>            
                </div>
            </div>
        </form>
    </div>

    <table class="table table-bordered" style="margin-top:2%">
        <thead>
            <tr>
                <th scope="col" class="text-center">No.</th>
                <th scope="col" class="text-center">Order Id</th>
                <th scope="col" class="text-center">Event Date</th>
                <th scope="col" class="text-center">Price</th>
                <th scope="col" class="text-center">Status</th>
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
                </tr>
            @endforeach 
        </tbody>
    </table>
</div>
@endsection