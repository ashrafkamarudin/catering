@extends('layouts.customer')

@section('content')

<!--================Hero Banner Section start =================-->
<section class="hero-banner">
<div class="hero-wrapper">
    <div class="hero-left">
    <h1 class="hero-title">Foods the <br> most precious things</h1>
    <div class="d-sm-flex flex-wrap">
        <a class="button button-hero button-shadow" href="/package">Book Now</a>          
    </div>
    <ul class="hero-info d-none d-lg-block">
        <li>
        <img src="sneaky/img/banner/fas-service-icon.png" alt="">
        <h4>Fast Service</h4>
        </li>
        <li>
        <img src="sneaky/img/banner/fresh-food-icon.png" alt="">
        <h4>Fresh Food</h4>
        </li>
        <li>
        <img src="sneaky/img/banner/support-icon.png" alt="">
        <h4>24/7 Support</h4>
        </li>
    </ul>
    </div>
    <div class="hero-right">
    <div class="owl-carousel owl-theme hero-carousel">
        <div class="hero-carousel-item">
        <img class="img-fluid" src="sneaky/img/banner/hero-banner1.png" alt="">
        </div>
        <div class="hero-carousel-item">
        <img class="img-fluid" src="sneaky/img/banner/hero-banner2.png" alt="">
        </div>
        <div class="hero-carousel-item">
        <img class="img-fluid" src="sneaky/img/banner/hero-banner1.png" alt="">
        </div>
        <div class="hero-carousel-item">
        <img class="img-fluid" src="sneaky/img/banner/hero-banner2.png" alt="">
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


<!--================About Section start =================-->
<section class="about section-margin pb-xl-70">
<div class="container">
    <div class="row">
    <div class="col-md-6 col-xl-6 mb-5 mb-md-0 pb-5 pb-md-0">
        <div class="img-styleBox">
        <div class="styleBox-border">
            <img class="styleBox-img1 img-fluid" src="sneaky/img/home/about-img1.png" alt="">
        </div>
        <img class="styleBox-img2 img-fluid" src="sneaky/img/home/about-img2.png" alt="">
        </div>
    </div>
    <div class="col-md-6 pl-md-5 pl-xl-0 offset-xl-1 col-xl-5">
        <div class="section-intro mb-lg-4">
        <h4 class="intro-title">About Us</h4>
        <h2>We speak the good food language</h2>
        </div>
        <p>Living first us creepeth she'd earth second be sixth hath likeness greater image said sixth was without male place fowl evening an grass form living fish and rule lesser for blessed can't saw third one signs moving stars light divided was two you him appear midst cattle for they are gathering.</p>
        <a class="button button-shadow mt-2 mt-lg-4" href="#">Learn More</a>
    </div>
    </div>
</div>
</section>
<!--================About Section End =================-->


<!--================Featured Section Start =================-->
<section class="section-margin mb-lg-100">
<div class="container">
    <div class="section-intro mb-75px">
    <h4 class="intro-title">Featured Food</h4>
    <h2>Fresh taste and great price</h2>
    </div>

   
    <div class="owl-carousel owl-theme featured-carousel">
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
                <form method="POST" action="{{ route('order:add', $package->id) }}">
                    @csrf
                    <button class="button border-0" style="margin-top:2%" type="submit">Make Order</button>
                </form>
            </div>
            </div>
        </div> 
        @endforeach
    </div>
</div>
</section>
<!--================Featured Section End =================-->

<!--================Offer Section Start =================-->
<!-- <section class="bg-lightGray section-padding">
<div class="container">
    <div class="row no-gutters">
    <div class="col-sm">
        <img class="card-img rounded-0" src="sneaky/img/home/offer-img.png" alt="">
    </div>
    <div class="col-sm">
        <div class="offer-card offer-card-position">
        <h3>Italian Pizza Offer</h3>
        <h2>50% OFF</h2>
        <a class="button" href="#">Read More</a>
        </div>
    </div>
    </div>
</div>
</section> -->
<!--================Offer Section End =================-->

<!--================CTA section start =================-->  
<!-- <section class="cta-area text-center">
<div class="container">
    <p>Some Trendy And Popular Courses Offerd</p>
    <h2>Under replenish give saying thing</h2>
    <a class="button" href="#">Reservation</a>
</div>
</section> -->
<!--================CTA section end =================-->  


<!--================Chef section start =================-->  
{{-- <section class="section-margin">
<div class="container">
    <div class="section-intro mb-75px">
    <h4 class="intro-title">Our Chef</h4>
    <h2>Talent & experience member</h2>
    </div>

    <div class="row">
    <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
        <div class="chef-card">
        <img class="card-img rounded-0" src="sneaky/img/home/chef-1.png" alt="">
        <div class="chef-footer">
            <h4>Daniesl Laran</h4>
            <p>Executive Chef</p>
        </div>

        <div class="chef-overlay">
            <ul class="social-icons">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li><a href="#"><i class="ti-skype"></i></a></li>
            <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            </ul>
        </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
        <div class="chef-card">
        <img class="card-img rounded-0" src="sneaky/img/home/chef-2.png" alt="">
        <div class="chef-footer">
            <h4>Daniesl Laran</h4>
            <p>Executive Chef</p>
        </div>

        <div class="chef-overlay">
            <ul class="social-icons">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li><a href="#"><i class="ti-skype"></i></a></li>
            <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            </ul>
        </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-4 mb-4 mb-lg-0">
        <div class="chef-card">
        <img class="card-img rounded-0" src="sneaky/img/home/chef-3.png" alt="">
        <div class="chef-footer">
            <h4>Daniesl Laran</h4>
            <p>Executive Chef</p>
        </div>

        <div class="chef-overlay">
            <ul class="social-icons">
            <li><a href="#"><i class="ti-facebook"></i></a></li>
            <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
            <li><a href="#"><i class="ti-skype"></i></a></li>
            <li><a href="#"><i class="ti-vimeo-alt"></i></a></li>
            </ul>
        </div>
        </div>
    </div>
    </div>
</div>
</section> --}}
<!--================Chef section end =================-->  


<!--================Reservation section start =================-->  
{{-- <section class="bg-lightGray section-padding">
<div class="container">
    <div class="row align-items-center">
    <div class="col-md-6 col-xl-5 mb-4 mb-md-0">
        <div class="section-intro">
        <h4 class="intro-title">Reservation</h4>
        <h2 class="mb-3">Get experience from sneaky</h2>
        </div>
        <p>Him given and midst tree form seas she'd saw give evening one every make hath moveth you're appear female heaven had signs own days saw they're have let midst given him given and midst tree. Form seas she'd saw give evening</p>
    </div>
    <div class="col-md-6 offset-xl-2 col-xl-5">
        <div class="search-wrapper">
        <h3>Join Us !!</h3>
        <form class="search-form" action="#">
            <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Your Name">
                <div class="input-group-append">
                <span class="input-group-text"><i class="ti-user"></i></span>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Email Address">
                <div class="input-group-append">
                <span class="input-group-text"><i class="ti-email"></i></span>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Phone Number">
                <div class="input-group-append">
                <span class="input-group-text"><i class="ti-headphone-alt"></i></span>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Select Date">
                <div class="input-group-append">
                <span class="input-group-text"><i class="ti-notepad"></i></span>
                </div>
            </div>
            </div>
            <div class="form-group">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Select People">
                <div class="input-group-append">
                <span class="input-group-text"><i class="ti-layout-column3"></i></span>
                </div>
            </div>
            </div>
            <div class="form-group form-group-position">
            <button class="button border-0" type="submit">Make Reservation</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</div>
</section> --}}
<!--================Reservation section end =================-->  
@endsection