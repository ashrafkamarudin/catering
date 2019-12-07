@extends('layouts.customer')

@section('content')

<!--================Hero Banner Section start =================-->
<section class="hero-banner hero-banner-sm" style="height:90vh">
    <div class="hero-wrapper">
        <div class="hero-right">
            <div class="owl-carousel owl-theme w-100 hero-carousel">
                <div class="hero-carousel-item">
                    <img class="img-fluid" src="{{ asset('media/images/'.$package->image) }}" alt="">
                    <img class="img-fluid" src="img/banner/hero-banner-sm.png" alt="">
                </div>
            </div>
        </div>
        <div class="hero-left" style="padding-left:5% !important">

            <h1 class="hero-title">{{ $package->name }}</h1>
            <p>{{ $package->description }}</p>
            <p>
                {!! $package->content !!}
            </p>
            <ul class="hero-info d-none d-md-block">
                <li>
                    <img src="{{ asset('sneaky/img/banner/fas-service-icon.png') }}" alt="">
                    <h4>Fast Service</h4>
                </li>
                <li>
                    <img src="{{ asset('sneaky/img/banner/fresh-food-icon.png') }}" alt="">
                    <h4>Fresh Food</h4>
                </li>
                <li>
                    <img src="{{ asset('sneaky/img/banner/support-icon.png') }}" alt="">
                    <h4>24/7 Support</h4>
                </li>
            </ul><br>
            <div class="card" style="width: 28rem;">
                    <div class="card-body">
    
                        <h5 class="card-title text-center">Order</h5>
                        <h6 class="card-subtitle text-center mb-2 text-muted">Price per PAX is RM {{ $package->price }}</h6>
                        <form method="POST" action="{{ route('order:add', $package->id) }}">
                        @csrf
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="number" class="form-control" name="quantity" placeholder="Total">  
                                <div class="input-group-prepend">
                                    <div class="input-group-text"> / PAX</div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100" type="submit">Add To Cart</button>
                        </form>
                    </div>
                </div>
        </div>
        <ul class="social-icons d-none d-lg-block">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter"></i></a></li>
            <li><a href="#"><i class="ti-instagram"></i></a></li>
        </ul>
    </div>
</section>
<!--================Hero Banner Section end =================-->

@endsection