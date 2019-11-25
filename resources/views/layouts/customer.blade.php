<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sneaky Catering - Home</title>
	<link rel="icon" href="{{ asset('sneaky/img/Fevicon.png')}}" type="image/png">

  <link rel="stylesheet" href="{{ asset('sneaky/vendors/bootstrap/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/vendors/themify-icons/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/vendors/owl-carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/vendors/owl-carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/vendors/Magnific-Popup/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/vendors/fontawesome/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('sneaky/assets/css/style.css') }}">
</head>
<body>

  @include('customer.navbar')

  @yield('content')

  @include('customer.footer')

  <script src="{{ asset('sneaky/vendors/jquery/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('sneaky/vendors/bootstrap/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('sneaky/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('sneaky/vendors/nice-select/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('sneaky/vendors/Magnific-Popup/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('sneaky/assets/js/jquery.ajaxchimp.min.js') }}"></script>
  <script src="{{ asset('sneaky/assets/js/mail-script.js') }}"></script>
  <script src="{{ asset('sneaky/assets/js/main.js') }}"></script>

  @yield('script')
</body>
</html>