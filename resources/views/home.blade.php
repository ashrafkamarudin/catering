<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sneaky Catering - Home</title>
	<link rel="icon" href="img/Fevicon.png" type="image/png">

  <link rel="stylesheet" href="/sneaky/vendors/bootstrap/bootstrap.min.css">
  <link rel="stylesheet" href="sneaky/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="sneaky/vendors/owl-carousel/owl.theme.default.min.css">
  <link rel="stylesheet" href="sneaky/vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="sneaky/vendors/Magnific-Popup/magnific-popup.css">
  <link rel="stylesheet" href="sneaky/vendors/fontawesome/css/all.min.css">
  <link rel="stylesheet" href="sneaky/assets/css/style.css">
</head>
<body>

  <!--================ Header Menu Area start =================-->
  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container box_1620">
          <a class="navbar-brand logo_h" href="index.html"><img src="sneaky/img/logo.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav justify-content-end">
                {{ dd( Auth::User() ) }}
              <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
              <li class="nav-item "><a class="nav-link" href="index.html"><span class="badge badge-dark"><i class="fas fa-shopping-cart"></i></span></a></li>
              <!-- <li class="nav-item"><a class="nav-link" href="about.html">About</a></li> 
              <li class="nav-item"><a class="nav-link" href="menu.html">Menu</a>
              <li class="nav-item"><a class="nav-link" href="chef.html">Chef</a>

              <li class="nav-item submenu dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                  aria-expanded="false">Blog</a>
                <ul class="dropdown-menu">
                  <li class="nav-item"><a class="nav-link" href="blog.html">Blog Single</a></li>
                  <li class="nav-item"><a class="nav-link" href="blog-details.html">Blog Details</a></li>
                </ul>
							</li>
              <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li> -->
            </ul>
          </div> 
        </div>
      </nav>
    </div>
  </header>
  <!--================Header Menu Area =================-->

  <!--================Hero Banner Section start =================-->
  <section class="hero-banner">
    <div class="hero-wrapper">
      <div class="hero-left">
        <h1 class="hero-title">Foods the <br> most precious things</h1>
        <div class="d-sm-flex flex-wrap">
          <a class="button button-hero button-shadow" href="#">Book Now</a>
          <a class="hero-banner__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto">Watch Video</a>          
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
        <div class="featured-item">
          <img class="card-img rounded-0" src="sneaky/img/home/featured1.png" alt="">
          <div class="item-body">
            <a href="#">
              <h3>Mountain Mike Pizza</h3>
            </a>
            <p>Whales and darkness moving</p>
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">$35</h3>
            </div>
            <div class="text-center">
                <button class="button border-0" type="submit">Make Reservation</button>
            </div>
          </div>
        </div>
        <div class="featured-item">
          <img class="card-img rounded-0" src="sneaky/img/home/featured2.png" alt="">
          <div class="item-body">
            <a href="#">
              <h3>Patatas Bravas</h3>
            </a>
            <p>Whales and darkness moving</p>
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">$30</h3>
            </div>
            <div class="text-center">
                <button class="button border-0" type="submit">Make Reservation</button>
            </div>
          </div>
        </div>
        <div class="featured-item">
          <img class="card-img rounded-0" src="sneaky/img/home/featured3.png" alt="">
          <div class="item-body">
            <a href="#">
              <h3>Pulled Sandwich</h3>
            </a>
            <p>Whales and darkness moving</p>
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">$20</h3>
            </div>
            <div class="text-center">
                <button class="button border-0" type="submit">Make Reservation</button>
            </div>
          </div>
        </div>
        <div class="featured-item">
          <img class="card-img rounded-0" src="sneaky/img/home/featured1.png" alt="">
          <div class="item-body">
            <a href="#">
              <h3>Mountain Mike Pizza</h3>
            </a>
            <p>Whales and darkness moving</p>
            <div class="d-flex justify-content-between">
              <ul class="rating-star">
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
                <li><i class="ti-star"></i></li>
              </ul>
              <h3 class="price-tag">$35</h3>
            </div>
            <div class="text-center">
                <button class="button border-0" type="submit">Make Reservation</button>
            </div>
          </div>
        </div>
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
  <section class="section-margin">
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
  </section>
  <!--================Chef section end =================-->  


  <!--================Reservation section start =================-->  
  <section class="bg-lightGray section-padding">
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
            <h3>Book A Catering</h3>
            <p>by register with us</p>
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
  </section>
  <!--================Reservation section end =================-->  

  <!-- ================ start footer Area ================= -->
  <footer class="footer-area section-gap">
		<div class="container">
			<div class="footer-bottom row align-items-center text-center text-lg-left">
				<p class="footer-text m-0 col-lg-8 col-md-12"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="ti-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
				<div class="col-lg-4 col-md-12 text-center text-lg-right footer-social">
					<a href="#"><i class="ti-facebook"></i></a>
					<a href="#"><i class="ti-twitter-alt"></i></a>
					<a href="#"><i class="ti-dribbble"></i></a>
					<a href="#"><i class="ti-linkedin"></i></a>
				</div>
			</div>
		</div>
	</footer>
  <!-- ================ End footer Area ================= -->




  <script src="sneaky/vendors/jquery/jquery-3.2.1.min.js"></script>
  <script src="sneaky/vendors/bootstrap/bootstrap.bundle.min.js"></script>
  <script src="sneaky/vendors/owl-carousel/owl.carousel.min.js"></script>
  <script src="sneaky/vendors/nice-select/jquery.nice-select.min.js"></script>
  <script src="sneaky/vendors/Magnific-Popup/jquery.magnific-popup.min.js"></script>
  <script src="sneaky/assets/js/jquery.ajaxchimp.min.js"></script>
  <script src="sneaky/assets/js/mail-script.js"></script>
  <script src="sneaky/assets/js/main.js"></script>
</body>
</html>