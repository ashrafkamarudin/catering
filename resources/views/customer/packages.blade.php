@extends('layouts.customer')

@section('content')

<div class="container"  style="margin-top:2%">
    @if ($packages->isEmpty())
        <div class="row" style="height: 90vh">
            <div class="col-lg-12 text-center" style="margin:auto;">
                <div style="margin-top: -200px">
                    <h2>No Available Packages </h2>
                    <img src="{{asset('sneaky/img/packages/packagees.svg')}}" alt="" style="height: 256px;width:256px">
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2> Available Packages </h2>
                <p>Find packages fit for your purpose here.</p>
            </div>
        </div>
        <br><br>
        <div class="row"style="margin-left:2%">
            @foreach ($packages as $package)
            <div class="featured-item">
                <img class="card-img rounded-0" src="{{ asset('media/thumbnails/'.$package->image) }}" alt="">
                <div class="item-body">
                <a href="#">
                    <h3>{{$package->name}} (<small class="price-tag">RM {{$package->price}}</small>)</h3>
                </a>
                <p>{{$package->short_description}}</p>
                <div style="text-align:right">
                    {{-- <ul class="rating-star">
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    <li><i class="ti-star"></i></li>
                    </ul> --}}
                    
                </div>
                <div class="text-center">
                    <a href="{{ route('package:show', $package->id) }}" class="button border-0" style="margin-top:2%">View Package</a>
                </div>
                </div>
            </div> 
            @endforeach
        </div>
    @endif 
</div>

@endsection