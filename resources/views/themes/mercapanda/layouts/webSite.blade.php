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
  <title>{{$ConfigTheme_->name_theme}}</title>
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
    
	<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
  
  <!-- Theme style App -->
  <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">

  <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/styles.css') }}" rel="stylesheet">
  <link href="{{asset('assets/'.$ConfigTheme_->name_theme.'/css/master.css') }}" rel="stylesheet">

  <!-- Bootstrap 4.0-->
  
  <link rel="stylesheet" href="{{asset('components/bootstrap/carousel.css') }} ">
 
</head>
<body >
  
  <!-- Site wrapper -->
  @include('themes.'.$ConfigTheme_->name_theme.'.layouts.headerWeb')
  <!-- Contenido -->
  <main role="main">
      @yield('content-theme')
      @include('themes.'.$ConfigTheme_->name_theme.'.layouts.footerWeb')
  </main>

  <!-- jQuery 3 -->
  <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
  <!-- popper -->
  <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
  <!-- Bootstrap 4.0-->
  <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>

  <script src="{{asset('components/select2/select2.full.js')}}"></script>

  <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>


    
</body>
</html>
