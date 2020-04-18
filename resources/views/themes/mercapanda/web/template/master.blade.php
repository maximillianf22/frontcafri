<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
  <title>WebSite</title>
  
	<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
  <!-- Bootstrap 4.0-->
  <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  <link rel="stylesheet" href="{{asset('components/bootstrap/carousel.css') }} ">
 
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  @include('themes.'.$ConfigTheme_->name_theme.'.web.template.header')
  <!-- Contenido -->
  <main role="main">
    @yield('content-theme')
    @include('themes.'.$ConfigTheme_->name_theme.'.web.template.footer')
  </main>
  <div class="control-sidebar-bg"></div>
</div>

  <!-- jQuery 3 -->
  <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/jquery.min.js')}}"></script>
  <!-- popper -->
  <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/popper.min.js')}}"></script>
  <!-- Bootstrap 4.0-->
  <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/bootstrap.min.js')}}"></script>

  <script src="{{asset('components/select2/select2.full.js')}}"></script>

  <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>

      
    
</body>
</html>
