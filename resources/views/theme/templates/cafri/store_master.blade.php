<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="description" content="">
  <meta name="theme-color" content="#000000">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="icon" type="image/ico" href="{{ asset('/content/upload/app/favicon.ico') }}"/>
  <title>Cafri</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
  <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">
  <link rel="stylesheet" href="{{asset('components/theme/master.v1.css') }} ">

  <!--- theme default --->
  <link rel="stylesheet" href="{{asset('components/theme/core.theme.css') }} ">
  <link type="text/css" href="{{ asset('front') }}/css/argonCategory.min.css?v=1.0.2" rel="stylesheet">
<style type="text/css">
  .modal-body {
    max-height: calc(110vh - 250px) !important ;
    overflow-y: auto !important;
}
</style>
</head>
<body onload="iLoadPage();">
    @include(JPATH_COMPONENTS . 'core.comp_head.index')
    <!-- Contenido main -->
    <main role="main">
      @yield('content-store-theme')
    </main>
    @include(JPATH_COMPONENTS . 'core.comp_footer.index')
  <script type='text/javascript' async defer>
    var Protocol_ = window.location.protocol;
    var UrlHost_ = Protocol_+"//"+"{{$_SERVER["HTTP_HOST"]}}";
  </script>
    
  <!-- <script data-main="js/main" src="js/require.js"></script>  -->
  <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/cookiesJs/js.cookie.js')}}"></script>

  
  <script type='text/javascript' src="{{asset('components/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>

  <script type='text/javascript' src="{{asset('components/store/config-store.js')}}"></script>
 
  <script type='text/javascript' src="{{asset('components/select2/select2.full.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
	<!-- FastClick -->
	<script type='text/javascript' src="{{asset('components/fastclick/lib/fastclick.js')}}"></script>
  <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
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
  @include('errors.global_app')
</body>
</html>
