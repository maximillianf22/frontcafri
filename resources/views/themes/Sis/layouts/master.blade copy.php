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
  <title>Dashboard</title>

  <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
	<!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap-extend.min.css') }} ">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">
  
  <link rel="stylesheet" href="{{asset('components/fonts/fonts.css') }} ">
  <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">
  <link href="{{asset('assets/'.$Template_->name_theme.'/css/master.css') }}" rel="stylesheet">
  <link href="{{asset('assets/'.$Template_->name_theme.'/css/styles.css') }}" rel="stylesheet">

</head>
<body class="hold-transition skin-blue-light sidebar-mini">

  <div class="wrapper">
    @include('themes.'.$Template_->name_theme.'.templates.header')
    @include('themes.'.$Template_->name_theme.'.templates.sidebar')
    @yield('content-theme')
    @include('themes.'.$Template_->name_theme.'.templates.footer')
    <div class="control-sidebar-bg"></div>
  </div>

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
  <!-- SlimScroll -->
  <script src="{{asset('components/select2/select2.full.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
     
  <!-- FastClick -->
  <script type='text/javascript' src="{{asset('components/fastclick/lib/fastclick.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/validations/validation.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/input-mask/jquery.inputmask.extensions.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/pwstrength-bootstrap.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/zxcvbn.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/password-meter/password-meter-active.js')}}"></script>
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
  @include('errors.global_app')
      
</body>
</html>