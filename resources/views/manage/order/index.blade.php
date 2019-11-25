@extends('layouts.manage')

@section('content')
    <div class="row">
        @if ($orders->isEmpty())
            <div class="col-lg-12 justify-content-center" 
                style="
                height: 50vh;
                display: -webkit-box;
                display: -webkit-flex;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center
                ">
                <div class="text-center">
                    <i class="nc-icon nc-delivery-fast text-danger" style="font-size:60px;"></i>
                    <br>
                    Aww,
                    Your Order List is Empty, <br>
                    Please wait for new order and it will appear here.<br><br>
                    If you don't have any packages, add one now!
                    <br>
                    <a href="{{ route('manage:package:create') }}" class="btn btn-primary btn-large">Create New Package</a>
                    <br><br>
                </div>     
            </div>
        @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> 
                        List of Order 
                    </h4>
                    <p class="card-category"> All of your catering orders is here </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Order #
                                </th>
                                <th>
                                    Items
                                </th>
                                <th>
                                    Request Date
                                </th>
                                <th>
                                    Payment Status
                                </th>
                                <th>
                                    Order Status
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($orders as $key => $order)
                                    <tr>
                                        <td>
                                            {{ $key+1 }}
                                        </td>
                                        <td>
                                            <ul>
                                            @foreach ($order->items as $item)
                                                <li>{{ json_decode($item->item)->name }} x {{ json_decode($item->item)->quantity }}</li>
                                            @endforeach
                                            <ul>
                                        </td>
                                        <td>
                                            {{ $order->created_at->format('F d, Y') }}
                                        </td>
                                        <td align="center">
                                            <span class="badge badge-info p-1">{{ $order->paymentStatus }}</span>
                                        </td>
                                        <td align="center">
                                            @foreach (collect(explode(',', $order->orderStatus)) as $item)
                                                @switch($item)
                                                    @case('Pending Approval')
                                                        <span class="badge badge-info p-1"> {{ $item }} </span>
                                                        @break

                                                    @case('Approved')
                                                        <span class="badge badge-success p-1"> {{ $item }} </span>
                                                        @break
                                                    
                                                    @case('Completed') 
                                                        <span class="badge badge-primary p-1"> {{ $item }} </span>
                                                        @break
                                                    @default
                                                        <span>Something went wrong, please try again</span>
                                                @endswitch
                                            @endforeach
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('manage:order:show', $order->id) }}"  class="btn btn-primary btn-round">view</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $orders->links() }}
                        
                    </div>
                </div>
            </div>
        </div>

                        
        @endif
    </div>
@endsection
