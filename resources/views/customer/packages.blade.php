@extends('layouts.customer')

@section('content')

<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 text-center">
            <h2> Available Packages </h2>
            <p>Find packages fit for your purpose here.</p>
        </div>
    </div>
    <br><br>
    <div class="row mb-5">
        @foreach ($packages as $package)
            <div class="col-md-6">
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{ asset('media/thumbnails/'.$package->image) }}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $package->name }} ( <small class="text-muted">RM {{ $package->price }}</small> )</h5>
                                <p class="card-text">{{ $package->description }}</p>
                                <p>
                                <a href="#" class="card-link pull-right">Details</a>

                                <form method="POST" action="{{ route('order:add', $package->id) }}">
                                    @csrf
                                    <button class="btn btn-primary pull-right"><i class="fas fa-shopping-cart"></i></button>
                                </form>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection