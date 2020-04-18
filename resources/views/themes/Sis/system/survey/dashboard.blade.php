@extends('themes.'.$ConfigTheme_->name_theme.'.layouts.master')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1><i class="lni-control-panel"></i> Panel de Control | Encuestas </h1>
          <!--
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="breadcrumb-item"><a href="#">Examples</a></li>
          <li class="breadcrumb-item active">Blank page</li>
          </ol>
          -->
          <ol class="breadcrumb">
               <button type="button" class="btn btn-outline btn-dark" data-toggle="modal" data-target="#modal-survey-new">Diseñar Nueva Encuesta</button>
          </ol>
     </section>
     
     <section class="pad-all ">
          <div class="row pad-all">
               <div class="col-lg-10 pad-btm sv-title-options">Mis Encuestas</div>
               <div class="col-lg-10 pad-btm ">
               @if(sizeof($Survey_)>=1)
                    @foreach($Survey_ as $Survey)
                    <div class="box">
                         <div class="box-body surveysRpt">
                              <div class="row state-template text-danger pad-lft "><span>Borrador</span></div>
                              <div class="row state-template pad-lft ">
                                   <div class="col-lg-5">
                                        <div class="nameSurvey">{{$Survey->name}}</div>
                                        <div class="dateSurvey text-fade"><i class="lni-calendar"></i> Creada : {{$Survey->created_at}}</div>
                                   </div>
                                   <div class="col-lg-2 bl-3 ">
                                        <div class="InfoSurvey text-center">0</div>
                                        <div class="labelSurvey text-center  text-fade">Preguntas</div>
                                   </div>
                                   <div class="col-lg-2 bx-2 h-30px" style="border-left:1px solid #CCC; border-right:1px solid #CCC">
                                        <div class="InfoSurvey text-center">0</div>
                                        <div class="labelSurvey text-center text-fade">Encuestadores</div>
                                   </div>
                                   <div class="col-lg-2">
                                        <div class="InfoSurvey text-center">0</div>
                                        <div class="labelSurvey text-center text-fade">Encuestados</div>
                                   </div>
                                   <div class="col-lg-1 text-center">
                                        
                                        
                                        
                                        <div class="btn-group">
                                        <i type="button" class="lni-more-alt" data-toggle="dropdown" style="boder:none; background:none;cursor:pointer"></i>
                                             <div class="dropdown-menu">
                                                       <a class="dropdown-item" href="{{route('survey.create.design',[$Survey->token])}}"><i class="lni-pencil-alt"></i> Editar Encuesta</a>
                                                       <a class="dropdown-item" href="#"><i class="lni-share"></i> Clonar Encuesta</a>
                                                       <a class="dropdown-item" href="#"><i class="lni-telegram"></i> Enviar Encuesta</a>
                                                       <div class="dropdown-divider"></div>
                                                       <a class="dropdown-item" href="#"><i class="lni-trash"></i> Eliminar Encuesta</a>
                                                  </div>
                                        </div>


                                   </div>
                              </div>
                         </div>
                    </div>
                    @endforeach
               @else
                    Sin encuestas realizadas
               @endif
          </div>
     </section>

<!--
     <section class="pad-all">
     
          <div class="col">
               <div class="box">
               <div class="box-body">
                    
                    <button type="button" class="btn btn-outline btn-success" data-toggle="modal" data-target="#modal-fill">
                         <i class="lni-pencil-alt"></i>  Diseñar Nueva Encuesta
                    </button>
                    <a href="#" class="btn btn-outline btn-success"><i class="lni-stamp"></i> Clonar desde una Encuesta Existente</a>
               </div>
               </div>
          </div>
        --> 
          <div class="modal modal-fill fade modal-design" data-backdrop="false" id="modal-survey-new" tabindex="-1">
               <div class="modal-dialog">
               <div class="modal-content modal-design-content ">
                    <div class="modal-header"><h5 class="modal-title"><i class="lni-information"></i> Datos Generales de la Encuesta. </h5></div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <div class="col ">
                                   <input class="form-control" type="text" name="name_survey" value="" id="name_survey" placeholder="Nombre de la Encuesta">
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col ">
                                   <select id="categorie_survey" class="form-control " name="categorie_survey" style="width: 100%;">
                                        @if(sizeof($Categories_)>0)
                                        @foreach($Categories_ as $type_ )
                                             <option value="{{$type_->id}}">{{$type_->name}}</option>
                                             @endforeach
                                        @else
                                        @endif 
                                   </select>     
                              </div>
                         </div>
                         <div class="form-group row">
                              <div class="col ">
                                   <input class="form-control" type="hidden" name="token_survey" value="<?php echo  date('YmdHi').rand(1,100).rand(1,5000)*2; ?>" id="token_survey" placeholder="Nombre de la Encuesta">
                              </div>
                         </div>
                    </div>
                    <div class="modal-footer pad-all">
                    <button type="button" class="btn btn-bold btn-pure btn-secondary " data-dismiss="modal">Cerrar </button>
                    <button id="survey_create"  type="button" class="btn btn-bold btn-pure btn-success float-right" data-dismiss="modal">Crear Nueva Encuesta </button>
                    </div>
               </div>
               </div>
          </div>
     </section>

</section>
@endsection
