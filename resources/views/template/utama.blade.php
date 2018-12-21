<!doctype html>
<html lang="en">
<!-- <html class="no-js" lang="zxx"> -->
  <head>

    <!-- Impor logo bantyuk -->
    <!-- <link rel="shortcut icon" type="image/x-icon" href="{{asset('/img/tab/tab.png')}}"> -->

    <title>BantuYuk!</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <!-- Bootstrap CSS offline-->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap4/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap4/bootstrap-grid.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap4/bootstrap-reboot.min.css')}}">

    <!-- Dari Template -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/linearicons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/responsive.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/sweetalert.css')}}">

    <!-- Tambahan CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/styleFooterCopyright.css')}}">
    @yield('css')

    <script src="{{asset('/js/vendor/modernizr-2.8.3.min.js')}}"></script>

  </head>

  <body data-spy="scroll" data-target=".mainmenu-area">

    <!-- LOADING -->
    <!-- <div class="preloader">
        <span><i class="lnr lnr-sun"></i></span>
    </div> -->

    @include('template.navbar')    

    @yield('content')

    @include('template.footer')  

    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="{{asset('/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/vendor/jquery-ui.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/vendor/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/contact-form.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/ajaxchimp.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/scrollUp.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('/js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')
    @yield('js')
    <script type="text/javascript" src="{{asset('/js/main.js')}}"></script>

  </body>

</html>