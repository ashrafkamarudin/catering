@extends('layouts.manage')

@section('content')
    <div class="row">
        @if ($sales->isEmpty())
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
                    <i class="nc-icon nc-diamond text-danger" style="font-size:60px;"></i>
                    <br>
                    Aww,
                    Your Packages List is Empty, <br>
                    Please add new package and it will appear here.
                    <br>
                    <a href="{{ route('manage:package:create') }}" class="btn btn-primary btn-large">Create New Package</a>
                    <br><br>
                </div>     
            </div>
        @else
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('manage:package:create') }}" class="btn btn-primary pull-right">Create New Package</a>
                    <h4 class="card-title"> 
                        List of Package 
                    </h4>
                    <p class="card-category"> All of your catering packages is here </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                                <th>
                                    Receipt #
                                </th>
                                <th>
                                    Items
                                </th>
                                <th>
                                    Tax
                                </th>
                                <th>
                                    Sub Total
                                </th>
                                <th>
                                    Total Amount
                                </th>
                                <th>
                                    Payment Date
                                </th>
                                <th class="text-right">
                                    Action
                                </th>
                            </thead>
                            <tbody>

                                @foreach ($sales as $key => $sale)
                                    <tr>
                                        <td>
                                            {{ $sale->receiptNumber }}
                                        </td>
                                        <td>
                                            Total : {{ collect(json_decode($sale->items)->count()) }}
                                        </td>
                                        <td>
                                            RM {{ $sale->tax }}
                                        </td>
                                        <td>
                                            RM {{ $sale->subTotal }}
                                        </td>
                                        <td>
                                            RM {{ $sale->totalAmount }}
                                        </td>
                                        <td>
                                            {{ $sale->paid_at->format('F d, Y - h:i a') }}
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('manage:package:show', $sale->id) }}"  class="btn btn-primary btn-round">view</a>
                                            <a href="{{ route('manage:package:edit', $sale->id) }}"  class="btn btn-success btn-round">edit</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                    </div>
                </div>
            </div>
        </div>

                        
        @endif
    </div>
@endsection
