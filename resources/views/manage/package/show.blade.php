@extends('layouts.manage')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-plain">
            <div class="card-header">
                <h4 class="card-title"> Package Information </h4>
                <p class="card-category"> Full Package details </p>
            </div>
            <div class="card-body">
                <table class="table table-responsive-md custom-table">
                    <tbody>
                        <tr>
                            <td class="column-title">
                                Package Name
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>{{ $package->name }}</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Description
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link">
                                    <b>{{ $package->description }}</b>
                                </a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Content
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link">
                                    <b>{{ $package->content }}</b>
                                </a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Price
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>RM {{ $package->price }} / PAX</b></a>
                            <td>
                        </tr>
                        <tr>
                            <td class="column-title">
                                Created at
                            <td>
                            <td class="column-content">
                                <a href="#" class="nav-link"><b>{{ $package->created_at->format('F d, Y') }}</b></a>
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
                    <h3 class="card-title">Featured Image</h3>
                    <p class="card-category">  </p>
                </div>
                <div class="card-body">
                    <img src="{{ asset('media/images/' . $package->image) }}">
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
                <a href="{{ route('manage:package:edit', $package->id) }}"  class="btn btn-success btn-round">edit</a>
                <a href="{{ route('manage:package:show', $package->id) }}"  
                   class="btn btn-danger btn-round"  
                   data-toggle="modal" 
                   data-target="#deleteModal">delete</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="exampleModalLongTitle">Are you sure ?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="deleteUserForm" method="POST" action="{{ route('manage:package:destroy', $package->id)}}">
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