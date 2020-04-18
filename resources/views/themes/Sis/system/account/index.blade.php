@extends('themes.'.$ConfigTheme_->name_theme.'.layouts.master')
@section('content-theme')
     <section class="content-wrapper">
          <section class="content-header">
               <h1>Opciones de la cuenta</h1>
               <!--
               <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
               <li class="breadcrumb-item"><a href="#">Examples</a></li>
               <li class="breadcrumb-item active">Blank page</li>
               </ol>
               -->
               <ol class="breadcrumb">
               <span class="btn btn-sm btn-file btn-danger btn-outline brd-radius" style="font-weight:normal !important "  data-toggle="modal" data-target="#modal-center">
                    Eliminar mi Cuenta 
               </span>
               </ol>
          </section>

          <section class="pad-all">
          <form id="FrmAccount" action="{{route('account.update',$UserAccount_->id)}}" method="post"  name="formAccount" files="true" enctype="multipart/form-data">
               @csrf
               @method('PUT')

               <div class="row pad-all">
                    
                    <div class="pad-all  col-lg-5 col-md-5 col-sm-5 col-xs-12">
                         <div class="box pad">

                              <div class="box-body">
                                   <div class="single-cards-item pad-top">
                                        <br /><br /><br />
                                        <div class="single-product-text">
                                             @if (file_exists( public_path().'/content/upload/avatars/'.$UserAccount_->imageProfile ))
                                                  <img id="previewProfileImage" src="{{ asset('/content/upload/avatars/'.$UserAccount_->imageProfile) }}" alt="Avatar Perfil">
                                             @else
                                                  <img id="previewProfileImage" src="{{ asset('/content/upload/defaultavatar_large.png') }}" alt="Avatar">
                                             @endif
                                             <!--<h4><a class="cards-hd-dn" href="#">{{ $UserAccount_->nameUser.' '.$UserAccount_->lastnameUser }}</a></h4>-->
                                        </div>
                                        <div class="text-center pad-no">
                                             <span class="btn btn-sm btn-file btn-primary btn-outline brd-radius">
                                                  Cambiar mi imagen de perfil<input type="file" accept="image/*" id="profilePicture" name="profilePicture" data-id="{{ $UserAccount_->id }}"  onchange='getFilename(this)'>
                                             </span>
                                        </div>
                                   </div>
                                   
                              </div>
                         </div>

                         <div class="box">
                              <div class="box-header" >
                                   <h4 class="box-title">Actualizar mi Contraseña</h4>
                              </div>
                              <div class="box-body">
                                   <div class="row">
                                        <div class="col-6">
                                             <div id="pwd-container2">
                                                  <div class="form-group">
                                                  <div class="controls">
                                                       <label class="control-label" for="username">Nueva Contraseña</label>
                                                       <input type="password" name="password" class="form-control example2" id="password" placeholder="Password" value="" minlength="6">
                                                  </div>
                                                  </div>
                                                  <div class="form-group mg-b-pass">
                                                       <div class="pwstrength_viewport_verdict text-strong-password"></div>
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="col-6">
                                             <div class="form-group has-feedback">
                                             <div class="controls">
                                                  <label class="control-label" for="username">Repetir Contraseña</label>
                                                  <input type="password" name="password2" data-validation-match-match="password" class="form-control"  placeholder="Repetir Contraseña">
                                             </div>
                                             </div>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12 pad-all  ">
                         
                         <div class="box">
                              <div class="box-body">

                                   <div class="row">
                                        <div class="col-6">
                                             <label class="control-label" for="username">Nombre(s)</label>
                                             <div class="form-group ">
                                                  <input id="name" type="text" name="first_name" class="form-control " placeholder="Nombres" required value="{{ $UserAccount_->nameUser }}">
                                             </div>
                                        </div>
                                        <div class="col-6">
                                             <label class="control-label" for="username">Apellidos(s)</label>
                                             <div class="form-group has-feedback">
                                                  <input id="last_name" type="text" name="last_name" class="form-control " placeholder="Apellidos"  required value="{{ $UserAccount_->lastnameUser }}">
                                             </div>
                                        </div>
                                   </div>
                              
                                   <div class="form-group has-feedback">
                                        <label class="control-label" for="username">Cuenta de Correo</label> <span class="text-success"> {{ ($UserAccount_->emailVerified==11) ? 'confirmado Ok' : 'no verificado' }}</span>
                                        <div class="controls">
                                             <input type="text" value="{{ $UserAccount_->email }}" name="email" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Ingrese un Correo Valido">
                                        </div>
                                        <span class="help-block small">Tu cuenta de correo es utilizada para inicio de session y recuperar tu cuenta.</span>
                                   </div>
                              </div>
                         </div>

                         <div class="box">
                              <div class="box-body">
                                   <div class="form-group has-feedback">
                                        <div class="col-8">
                                             <label class="control-label" for="username">Celular</label>
                                             <input type="text" id="Celular" name="celular" class="form-control" placeholder="Celular" data-inputmask="'mask':[ '(999) 999-9999']" data-mask value="{{ $UserAccount_->celularUser }}" >
                                             <span class="help-block small">Puede ser usada para recuperar tu cuenta.</span>
                                        </div>
                                   </div>
                              </div>
                         </div>

                         
                         <div class="col-12 text-center">
                              <button id="updAccountUser" type="submit" class="btn btn-info  brd-radius  ">Actualizar Datos </button>
                         </div>
                    </div>
               </div>
          </form>
          <!-- Modal -->
          <div class="modal center-modal fade" id="modal-center" tabindex="-1">
               <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title">Eliminar cuenta</h5>
                    <button type="button" class="close" data-dismiss="modal" style="margin-top:-15px">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <p>Estás a punto de eliminar tu cuenta, Perderás al acceso de forma permanente. No podrás volver a iniciar sesión, en caso de querer recuperar la cuenta deberas ponerte en contacto con nosotros</p>
                    </div>
                    <div class="modal-footer modal-footer-uniform">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a href="{{route('account.delete',$UserAccount_->id)}}" type="button" class="btn btn-bold btn-pure btn-danger float-right brd-radius">Dar de baja mi cuenta</a>
                    </div>
               </div>
               </div>
          </div>
          <!-- /.modal -->
          </section>

          <script language="javascript" type="text/javascript">
          

          </script>
          
     </section>
@endsection