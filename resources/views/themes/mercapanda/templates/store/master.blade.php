<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="theme-color" content="#9EB934">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
  <title>{{$Config_->name_theme}}</title>
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
    

  <!-- Slick -->
  <link rel="stylesheet" href="{{asset('components/slick/slick.css') }} ">
  <link rel="stylesheet" href="{{asset('components/slick/slick-theme.css') }} ">


	<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
  
  <!-- Theme style App -->
  <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">

  <link href="{{asset('assets/'.$Config_->name_theme.'/css/styles.css') }}" rel="stylesheet">
  <link href="{{asset('assets/'.$Config_->name_theme.'/css/master.css') }}" rel="stylesheet">

  <!-- Store Requerid v 1.0 -->
  <link rel="stylesheet" href="{{asset('components/store/style.css') }} ">
  <!-- Bootstrap 4.0-->
  
  <link rel="stylesheet" href="{{asset('components/bootstrap/carousel.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap-datepicker/bootstrap-datepicker.min.css') }} ">
 
</head>
<body >
  
  <!-- Site wrapper -->
  @include('themes.'.$Config_->name_theme.'.templates.'.$Config_->templateDefault.'.header')
  <!-- Contenido -->
  <main role="main">
      @yield('content-theme')
      @include('themes.'.$Config_->name_theme.'.templates.'.$Config_->templateDefault.'.footer')
  </main>
  
  <script type='text/javascript' async defer>
    var Protocol_ = window.location.protocol;
    var UrlHost_ = Protocol_+"//"+"{{$_SERVER["HTTP_HOST"]}}";
  </script>
  
  <!-- jQuery 3 -->
  <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
  <!-- popper -->
  <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
  <!-- Bootstrap 4.0-->
  <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>

  <script src="{{asset('components/select2/select2.full.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  
  
	<!-- FastClick -->
	<script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>

  <script type='text/javascript' src="{{asset('components/fastclick/lib/fastclick.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/validations/validation.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.extensions.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/pwstrength-bootstrap.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/zxcvbn.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/password-meter-active.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

  <script>
    ! function(window, document, $) {
    "use strict";
    $("input,select,textarea").not("[type=submit]").jqBootstrapValidation();
        }(window, document, jQuery);
        jQuery('.input_text').keypress(function(tecla) {
              if((tecla.charCode < 97 || tecla.charCode > 122) && (tecla.charCode < 65 || tecla.charCode > 90) && (tecla.charCode != 45)) return false;
    });
    
  </script>
  <script type='text/javascript' src="{{asset('components/advanced-element.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/template.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/core.master.js')}}"></script>
  @include('errors.global_app')
  
  <script type='text/javascript' src="{{asset('components/steps/jquery.steps.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/steps/steps.js')}}"></script>
  
  <script type='text/javascript' src="{{asset('components/store/js.cookie.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/store/config.js')}}"></script>
  <!-- slick  -->
  <script type='text/javascript' src="{{asset('components/slick/slick.js')}}"></script>
  
</body>
</html>
