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
    <title>Login</title>
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
     <link href="{{asset('assets/'.$ConfigTheme_->nameDirectory.'/css/styles.css') }}" rel="stylesheet">
     <link href="{{asset('assets/'.$ConfigTheme_->nameDirectory.'/css/master.css') }}" rel="stylesheet">
     
    
</head>
<body class="hold-transition ">
<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3></h3>
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                         @if(!empty($ConfigTheme_))
                         <div class="logo-theme">
                              <a href="{{route('index')}}" style="color:none !important; background:none !important">
                              @if(!empty($ConfigTheme_->logo))
                                   @if (file_exists( public_path().'/content/upload/theme/'.$ConfigTheme_->logo ))
                                        <img id="previewProfileImage" src="{{ asset('/content/upload/theme/'.$ConfigTheme_->logo) }}" alt="{{$ConfigTheme_->nameDirectory}}">
                                   @else
                                        Logo no cargado
                                   @endif
                              @else
                                   Aqui el logo del tema
                              @endif
                              </a>
                         </div>
                         @endif
                        <form action="{{route('loginAuth')}}" method="post" id="loginForm">
                        @csrf
                            <div class="form-group">
                               <input type="text" placeholder="{{ $FieldDefaultAuth_ }}" title="Please enter you username" required value="" name="{{ $FieldDefaultAuth_ }}" id="username" class="form-control">
                                <span class="help-block small">Usuario unico en la aplicación</span>
                            </div>
                            <div class="form-group has-feedback">
                                <span class="view-password " style="margin-top:5px">show</span>
                                <input type="password" title="Ingrese su Contraseña" placeholder="Password" required value="" name="password" id="password" class="form-control">
                                <span class="ion ion-locked form-control-feedback"></span>
                            </div>
                         <div class="col-12 text-center">
                              <button type="submit" class="btn btn-bg-theme btn-block margin-top-10 " style="background:#AFDBF6 !important; color:#000">Iniciar Sesión</button>
                         </div>
                         </form>

                         <div class="form-group has-feedback">
                              <div class="col-12 terms_Conditions text-center pad-top ">
                                   <a href="{{route('recoverAuth')}}" ><div class="info-term">Olvide mi Contraseña?</div></a>
                              </div>
                         </div>
                         <div class="form-group has-feedback">
                              <div class="col-12 terms_Conditions text-center">
                                   <a href="{{route('signupAuth')}}" ><div class="info-term">¿No Tienes Cuenta? <strong>Regístrate</strong></div></a>
                              </div>
                         </div>

                         <!--
                        <div class="social-auth-links text-center">
                              <b>Ingresar</b><br />
                              Con tu cuenta de redes sociales
                              <div class="social-account-options">
                                   <a href="#" class="btn btn-outline btn-primary"><i class="fa fa-facebook"></i>Facebook</a>
                                   <a href="#" class="btn btn-outline btn-danger"><i class="fa fa-google-plus"></i>Gmail</a>
                              </div>
                         </div>
                    -->
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
                    Copyright © 2019. All rights reserved. Template by <a href="http://www.developapp.co"><strong>Developapp sas</strong></a>
               </div>
		</div>   
    </div>
     
      <!-- jQuery 3 -->
      <script type='text/javascript' src="{{asset('components/bootstrap/jquery.min.js')}}"></script>
     <!-- popper -->
     <script type='text/javascript' src="{{asset('components/bootstrap/popper.min.js')}}"></script>
     <!-- Bootstrap 4.0-->
     <script type='text/javascript' src="{{asset('components/bootstrap/bootstrap.min.js')}}"></script>

     <script src="{{asset('components/select2/select2.full.js')}}"></script>


     <script type='text/javascript' src="{{asset('components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/jquery-toast/jquery.toast.js')}}"></script>
     <script type='text/javascript' src="{{asset('components/core.js')}}"></script>
    <!--
     <script type='text/javascript' src="{{asset('components/jquery-toast/config.toast.js')}}"></script>
    -->
    @include('errors.global_app')
</body>
</html>
