@extends('themes.'.$theme_->name_theme.'.templates.master')
@section('content-theme')

     <section class="content-header pad-no title-survey">
          Diseñador de Encuesta / {{$Template_->name }}
     </section>
     
     <section class="survey-wizard pad-all">
          Diseñar Encuesta&nbsp;&nbsp;<i class="lni-arrow-right"></i>&nbsp;&nbsp; Vista Previa Encuesta &nbsp;&nbsp;<i class="lni-arrow-right"></i>&nbsp;&nbsp;Finalizar y Publicar  
          
     </section>

     <section class="content bg-theme" >
          <div class="row">
               <div class="col-3 ">
                    <!--bodega de preguntas -->
                    <div class="box ">
                         <div class="box-header  ">
                              <b><i class="lni-magnifier"></i>&nbsp;Banco de Preguntas</b>
                         </div>
                         <div class="box-body p-0">
                              <div class="pad-all">
                                   @if(sizeof($Categories_)>0)
                                        @foreach($Categories_ as $type_ )
                                        <a class="media media-single " href="#">
                                             <span class="title">{{$type_->name}}</span>
                                             <span class="badge badge-pill "><i class="lni-chevron-right"></i></span>
                                        </a>
                                        @endforeach
                                   @else
                                   @endif  
                              </div>
                              <div class="brd-r pad-all"></div>
                         </div>
                    </div>
               </div>

               <div class="col-8 bg-white brd-r">
                    <div class="row " id="design-survey">
                         <div class="col-12 pad-all survey-top-header">
                              Página 1 de 1
                              <div class="tot-page-question float-right"> Preguntas <span class="badge-pill "> 3 </span></div>
                         </div>

                         <div class="col-12 pad-all survey-header">
                              <div class="btn btn-outline  btn-edit-name float-right">Editar Nombre </div>
                              <strong>{{$Template_->name }} </strong>
                         </div>
                         
                         <div class="col-12 pad-all body-content" style="margin-top:5px; ">

                              <div id="content-questions-survey">
                                   @include('themes.'. $theme_->name_theme .'.survey.template_questions')
                              </div>

                              <div class="col-12 text-center new_question_add" style="" >
                                  <div class="row bg-white br-1 bl-1 bt-1 border-dark pad-all "><i class="lni-cog"></i>&nbsp; Configuración General de la Pregunta</div>
                                  <div class="row pad-all br-1 bl-1 border-dark  ">
                                   
                                        <div class="col col-sm-8 questions_title">
                                             <input type="text" class="form-control" placeholder="Titulo de la Pregunta " style="border:none">
                                        </div>
                                        <div class="col col-sm-4 questions_type" style="border-left:none !important ">
                                             @include('themes.'. $theme_->name_theme .'.survey.questions_type')
                                        </div>
                                       
                                  </div>
                                  
                                  <div class="row bl-1 br-1 border-dark ">
                                       <div class="line-separated bt-1 border-dark"></div>
                                  </div>
                                  
                                  <div class="row pad-all br-1 bl-1 border-dark  ">
                                   
                                       
                                       
                                  </div>
                                  
                                  <div class="row pad-all br-1 bl-1 bb-1 border-dark  bg-white ">
                                        <div class="col">
                                             <button type="button" class="btn btn-success float-right">Guardar Pregunta </button>
                                             <button type="button" class="btn btn-outline-dark float-right" style="margin-right:5px;">Cancelar </button> &nbsp; 
                                        </div>
                                  </div>

                                   
                              </div>

                              <div class="col-12 pad-all text-center" style="padding:20px">
                                   <button type="button" id="Question_addSurvey" data-template="{{ $Template_->id }}" data-token="{{ $Template_->token }}" class="btn btn-bold btn-outline btn-primary " data-dismiss="modal"><i class="lni-plus"></i> Agregar Nueva Pregunta  </button>
                              </div>


                         </div>
                        
                    </div>
               </div>
          </div>
     </section>
@endsection