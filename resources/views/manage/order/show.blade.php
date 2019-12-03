@extends('layouts.manage')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-plain">
            <div class="card-header">
                <h4 class="card-title"> Order Information </h4>
                <p class="card-category"> Full Customer's Order details </p>
            </div>
            <div class="card-body">
                <table class="table table-responsive-md custom-table">
                    <tbody>
                        <tr>
                            <td class="column-title">
                                Order Number
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>{{ $order->id }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Commence Date
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>{{ $order->created_at->format('F d, Y') }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Event Address
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>{{ $order->address }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Payment Status
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link">
                                    <b><span class="badge badge-info p-2">{{ $order->paymentStatus }}</span></b>
                                </a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Order Status
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link">
                                    <b>
                                        @foreach ($statuses as $status)
                                            @switch($status)
                                                @case('Pending Approval')
                                                    <span class="badge badge-info p-2"> {{ $status }} </span>
                                                    @break

                                                @case('Approved')
                                                    <span class="badge badge-success p-2"> {{ $status }} </span>
                                                    @break
                                                
                                                @case('Completed') 
                                                    <span class="badge badge-primary p-2"> {{ $status }} </span>
                                                    @break
                                                @default
                                                    <span>Something went wrong, please try again</span>
                                            @endswitch
                                        @endforeach
                                    </b>
                                </a>
                            <td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Order Item(s)</h3>
                <p class="card-category">  </p>
            </div>
            <div class="card-body">
                <ol>
                    @foreach ($order->items as $item)
                        <li><strong class="ml-4">{{ json_decode($item->item)->name }} x {{ json_decode($item->item)->quantity }}</strong></li>
                    @endforeach
                </ol>
            </div>
        </div>

    </div>
    <div class="col-md-2">
        <div class="card p-2">
            <div class="card-header">
                <h4 class="card-title"> Tools </h4>
                <p class="card-category">  </p>
            </div>
            <div class="card-body">
                <a href="{{ route('manage:order:show', $order->id) }}"  
                        class="btn btn-success btn-round"  
                        data-toggle="modal" 
                        data-target="#approveModal"
                        {{ $statuses->contains('Approved') ? 'disabled' : '' }}>Approve</a>
                <a href="{{ route('manage:order:show', $order->id) }}"  
                   class="btn btn-primary btn-round"  
                   data-toggle="modal" 
                   data-target="#completeModal"
                   {{ $statuses->contains('Completed') ? 'disabled' : '' }}>Complete</a>
                <a href="{{ route('manage:order:show', $order->id) }}"  
                   class="btn btn-danger btn-round"  
                   data-toggle="modal" 
                   data-target="#deleteModal"
                   {{ $statuses->contains('Completed') ? 'disabled' : '' }}>Cancel</a>
            </div>
        </div>
    </div>
</div>

<!-- Approve Modal -->
<div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid p-5">
                    <h5 class="text-center mb-4">Are you sure ?</h5>
                    <form id="approvalForm" class="text-center" method="POST" action="{{ route('manage:order:approve', $order->id)}}">
                        @csrf
                        <input type="hidden" value="approve" name="approval">
                        <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success ml-auto" form="approvalForm" >Approve</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Complete Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container-fluid p-5">
                    <h5 class="text-center mb-4">Are you sure ?</h5>
                    <form id="completeForm" class="text-center" method="POST" action="{{ route('manage:order:complete', $order->id)}}">
                        @csrf
                        <input type="hidden" value="complete" name="complete">
                        <button type="button" class="btn btn-secondary ml-auto" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary ml-auto" form="completeForm" >Complete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="completeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteUserForm" method="POST" action="{{ route('manage:package:destroy', $order->id)}}">
                    @method('delete')
                    @csrf
                    <div class="form-group">
                        <label for="inputConfirm">If you really want to delete this package please enter <b class="text-danger">YES</b> in the input below</label>
                        <input type="text" name="confirm" class="form-control" id="inputConfirm" aria-describedby="confirmHelp" placeholder='Enter "YES"'>
                        <small id="confirmHelp" class="form-text text-muted">You won't be able to retrieve this package again after deletion.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger" form="deleteUserForm" >Delete</button>
            </div>
        </div>
    </div>
</div>
@endsection