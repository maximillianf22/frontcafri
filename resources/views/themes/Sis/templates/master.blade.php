<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
     <meta name="description" content="Portal Web Probienestar">
     <meta name="author" content="develop app">
     <meta name="csrf-token" content="{{ csrf_token() }}">
     <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
     <title>Dashboard</title>

     <link rel="stylesheet" href="{{asset('assets/'.$theme_->name_theme.'/css/bootstrap.min.css') }} ">
     <link rel="stylesheet" href="{{asset('assets/'.$theme_->name_theme.'/css/bootstrap-extend.css') }} ">
     
     <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
     <link rel="stylesheet" href="{{asset('vendor/line-icons/1.0.1/LineIcons.min.css') }} ">
     
     <link href="{{asset('assets/'.$theme_->name_theme.'/css/base.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$theme_->name_theme.'/css/master.css') }}" rel="stylesheet">
     <script src="{{asset('assets/'.$theme_->name_theme.'/js/jquery.min.js')}}"></script>
</head>

<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
          <div id="container" class="effect aside-float aside-bright mainnav-lg pad-no">
               <div id="loader_content" class="content_loading hidden " style="display:none"><div class="overlay_loading"></div></div>
               @include('themes.'.$theme_->name_theme.'.templates.header')
               @include('themes.'.$theme_->name_theme.'.templates.aside')
              

               <div class="content-wrapper">
               <!-- Content Header (Page header) -->
                @yield('content-theme')
               <!-- /.content -->
               </div>




               @include('themes.'.$theme_->name_theme.'.templates.footer')
          </div>
          <script type='text/javascript' async defer> 
               var Protocol_ = window.location.protocol;
               var UrlHost_ = Protocol_+"//"+"{{$_SERVER["HTTP_HOST"]}}";
          </script>
</div>
    
     <!-- jQuery 3 -->

     <!-- popper -->
     <script src="{{asset('assets/'.$theme_->name_theme.'/js/popper.min.js')}}"></script>
     <!-- Bootstrap 4.0-->
     <script src="{{asset('assets/'.$theme_->name_theme.'/js/bootstrap.min.js')}}"></script>

     <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/fastclick/lib/fastclick.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
     <script src="{{asset('plugins/template.js')}}"></script>    
     <script type='text/javascript' src="{{asset('components/surveys/survey.master.js')}}"></script>
</body>
</html>