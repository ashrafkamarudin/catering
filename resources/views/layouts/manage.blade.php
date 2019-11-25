<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Catering App
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('paper-dashboard/assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('paper-dashboard/assets/css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <!-- <link href="paper-dashboard/assets/demo/demo.css" rel="stylesheet" /> -->

    <style>
    .custom-table {
        table-layout: fixed;
        width: 100%;
    }
    .custom-table td {
        text-overflow: ellipsis;
        word-wrap: break-word;
    }

    /* Column widths are based on these cells */
    .column-title {
        width: 25%;
    }
    .column-content {
        width: 75%;
    }
    </style>
</head>
<body class="">
    <div class="wrapper ">
        @include('manage.sidebar')
            
        <div class="main-panel">
            @include('manage.navbar')
            <div class="content">
                @yield('content')
            </div>
            <!-- @include('manage.footer') -->
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{ asset('paper-dashboard/assets/js/core/jquery.min.js')}}"></script>
    <script src="{{ asset('paper-dashboard/assets/js/core/popper.min.js')}}"></script>
    <script src="{{ asset('paper-dashboard/assets/js/core/bootstrap.min.js')}}"></script>
    <script src="{{ asset('paper-dashboard/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <!--  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>    -->
    <!-- Chart JS -->
    <script src="{{ asset('paper-dashboard/assets/js/plugins/chartjs.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{ asset('paper-dashboard/assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('paper-dashboard/assets/js/paper-dashboard.min.js?v=2.0.0" type="text/javascript')}}"></script>
    <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
    <!--  <script src="{{ asset('paper-dashboard/assets/demo/demo.js')}}"></script> -->
    <script>
        $(document).ready(function() {
        // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
        demo.initChartsPages();
        });
    </script>

    @include('notification')
     
</body>

</html>