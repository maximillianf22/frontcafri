<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="develop app">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/ico" href="{{ asset('favicon.ico')}}"/>
    <title>Inicio de sesión | {{$themeDefault_}}</title>
    <!--
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    -->
    <link href="https://cdn.lineicons.com/1.0.1/LineIcons.min.css" rel="stylesheet">

     <link rel="stylesheet" href="{{asset('components/jquery-toast/jquery.toast.css') }} ">
     <!-- Bootstrap 4.0-->
     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap.min.css') }} ">
     <!-- Bootstrap 4.0-->
     <link rel="stylesheet" href="{{asset('components/bootstrap/bootstrap-extend.css') }} ">
     <link rel="stylesheet" href="{{asset('components/bootstrap/master_style.css') }} ">
     <link rel="stylesheet" href="{{asset('components/fonts/fonts.css') }} ">

     <!-- Theme style App -->
     <link href="{{asset('assets/'.$themeDefault_.'/css/master.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$themeDefault_.'/css/styles.css') }}" rel="stylesheet">


</head>
<body class="hold-transition ">
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>{{$themeDefault_}}</h3>
				<p>Inicio de sesión</p>
			</div>
			<div class="content-error">
				<div class="hpanel">
          <div class="panel-body">
            <form action="{{route('admin.loginAuth')}}" method="post" id="loginForm">
              @csrf
              <div class="form-group">
                <label class="control-label" for="username">Username</label>
                <input type="text" placeholder="{{ $FieldDefaultAuth_ }}" title="Please enter you username" required value="" name="{{ $FieldDefaultAuth_ }}" id="username" class="form-control">
                {{-- <span class="help-block small">Usuario unico en la aplicación</span> --}}
              </div>
              <div class="form-group has-feedback">
                <label class="control-label" for="password">Password</label>
                <span class="view-password " style="margin-top:33px">show</span>
                <input type="password" title="Ingrese su Contraseña" placeholder="Password" required value="" name="password" id="password" class="form-control">
                <span class="ion ion-locked form-control-feedback"></span>
              </div>
              <div class="row">
                <div class="col-6 text-left">
                  <div class="checkbox">
                  <input type="checkbox" id="basic_checkbox_1" >
                  <label for="basic_checkbox_1">Recordame</label>
                  </div>
                </div>
                <div class="col-6 text-right">
                  <a href="{{route('recoverAuth')}}" style="background:none !important;color:#006DF0; font-weight:normal; padding:none; font-size:12px; margin-top:-3px"><i class="ion ion-locked"></i> Olvide mi Contraseña?</a>
                </div>
              </div>
              <div class="row">
                <div class="col-12 text-center">
                  <button type="submit" class="btn btn-info btn-block margin-top-10 ">Iniciar Sesión</button>
                </div>
              </div>
            </form>
          </div>
        </div>
			</div>
			<div class="text-center login-footer">
				<p>Copyright © 2019. Todos los derechos reservados.</p>
			</div>
		</div>
    </div>


     <!-- jQuery 3 -->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/jquery.min.js')}}"></script>
     <!-- popper -->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/popper.min.js')}}"></script>
     <!-- Bootstrap 4.0-->
     <script type='text/javascript' src="{{asset('components/Bootstrap-v4.3.1/bootstrap.min.js')}}"></script>


     <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/core.js')}}"></script>
    <!--
     <script type='text/javascript' src="{{asset('components/jquery-toast/config.toast.js')}}"></script>
    -->
    @include('errors.global_app')
</body>
</html>
