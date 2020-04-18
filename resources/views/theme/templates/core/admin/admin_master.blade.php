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
     <title>@yield('title', 'Inicio')</title>

     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
     <link rel="stylesheet" href="{{asset('components/glyphicons/glyphicon.css') }} ">
   
     <!-- Bootstrap 4.0
     <link rel="stylesheet" href="{{ asset('assets/administrator/vendor_components/bootstrap/dist/css/bootstrap.min.css')}}">
     -->
     <!-- Bootstrap 4.0-->
     <link rel="stylesheet" href="{{ asset('assets/administrator/vendor_components/bootstrap/dist/css/bootstrap-extend.css')}}">
     <!-- Theme style -->
     <link rel="stylesheet" href="{{ asset('assets/administrator/css/master_style.css')}}">
     <link rel="stylesheet" href="{{asset('components/bootstrap-switch/switch.css') }} ">

 
     
     <link rel="stylesheet" href="{{asset('components/timepicker/bootstrap-timepicker.min.css') }} ">
     <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
    
     <!--
     <link rel="stylesheet" href="{{ asset('assets/administrator/css/skins/_all-skins.css')}}">
     <link rel="stylesheet" href="{{asset('assets/administrator/css/style.css')}}">
     -->
     
     <link rel="stylesheet" href="{{asset('assets/administrator/css/store.css')}}">
     <link rel="stylesheet" href="{{asset('components/theme/core.v2.css') }} ">
     
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
     <div id="loader_content" class="content_loading d-none">
          <div class="overlay_loading"></div>
          <div class="text_loading text-dark text-center"><b>Cargando...</b></div>
     </div>
     <div class="wrapper">
          @include('theme.includes.defines')
          @include(JPATH_COMPONENTS . 'administrator.comp_head.index')
          @include(JPATH_COMPONENTS . 'administrator.comp_sidebar.index')

          @yield('content-theme')
          @include(JPATH_COMPONENTS . 'administrator.comp_footer.index')
          <div class="control-sidebar-bg"></div>
     </div>

     <script type='text/javascript' async defer>
          var Protocol_ = window.location.protocol;
          var UrlHost_ = Protocol_+"//"+"{{$_SERVER["HTTP_HOST"]}}";
     </script>

     <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/cookiesJs/js.cookie.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/timepicker/bootstrap-timepicker.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
     <!-- SlimScroll -->
     <script src="{{ asset('assets/administrator/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
     <!-- FastClick -->
     <script src="{{ asset('assets/administrator/vendor_components/fastclick/lib/fastclick.js')}}"></script>
     <!-- MinimalPro Admin App -->
     <script src="{{ asset('assets/administrator/js/template.js')}}"></script>

     <script type='text/javascript' src="{{asset('components/bootstrap-notify/bootstrap-notify.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/bootstrap-notify/style-notify.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/store/config-store.js')}}"></script>


     <script>
          $('.timepicker').timepicker({
               showInputs: false
          });
     </script>

</body>
</html>