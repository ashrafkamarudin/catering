@extends('layouts.manage')

@section('content')
<div class="row">
    <div class="col-xs-12 col-md-10">
        <div class="card p-5">
            <div class="card-header">
                <div class="pull-right">
                    <button class="btn btn-success" @click="print()">Print</button>
                </div>
                <h5 class="card-title text-center">Receipt for order # </h5>
            </div>
            <div class="card-body p-5">
                <div class="row">
                    <div class="col-xs-12">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-md-4">
                        <address>
                            <strong>Paid By:</strong>
                            
                        </address>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <address>
                            <strong>Paid to:</strong>
                            <br>
                            Adam Catering
                            <br>
                            Address 1,
                            <br>
                            Street Name,
                            <br>
                            PosCode City,
                            <br>
                            State,
                            <br>
                            Malaysia
                            <br>
                        </address>
                    </div>
                    <div class="col-xs-6 col-md-4">
                        <table class="table">
                            <tr style="mb-1">
                                <td><strong>Receipt #</strong></td>
                                <td>{{ $sale->receiptNumber }}</td>
                            </tr>
                            <tr style="mt-5">
                                <td><strong>Receipt Date</strong></td>
                                <td>{{ $sale->created_at }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6 col-md-6">
                        <address>
                            <strong>Date of payment:</strong><br>
                            {{ $sale->paid_at }}<br><br>
                        </address>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h4>Receipt Summary</h4>

                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th width=70%>
                                        Item
                                    </th>
                                    <th width=10%>
                                        Quantity
                                    </th>
                                    <th width=10%>
                                        Sub Total
                                    </th>
                                    <th width=10%>
                                        Total
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach (json_decode($sale->items) as $item)
                                        <tr>
                                            <td>
                                                {{ $item->custom->name }}<br>
                                                Description : {{ $item->custom->description }}
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td> RM {{ substr($item->amount*$item->quantity, 0, -2) }} . {{ substr($item->amount*$item->quantity,-2) }}</td>
                                            <td> RM {{ substr($item->amount*$item->quantity, 0, -2) }} . {{ substr($item->amount*$item->quantity,-2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong> Sub Total</strong></td>
                                        <td> RM {{ $sale->tax }} </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong> Tax</strong></td>
                                        <td> RM {{ $sale->subTotal }} </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total </strong></td>
                                        <td> RM {{ $sale->totalAmount }} </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
