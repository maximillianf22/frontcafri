@extends('themes.'.$ConfigTheme_->name_theme.'.layouts.surveyBuilder')
@section('content-theme')
<div class="builder-content">
     <section class="survey-title-builder pad-all bg-white">
          <div class="row pad-all t-section-name">
               <span class="pad-lft"> Diseñador de Encuesta / {{$Template_->name }}</span>
          </div>
     </section>

     <section class="content-wrapper pad-top ">
          
          <div class="row pad-all br-radius">
               <div class="col-lg-1"></div>
               
               <div class="col-lg-10 pad-all bg-white br-radius " id="design-survey" data-id="{{$Template_->id}}" data-token="{{$Template_->token}}" data-category="{{$Template_->idCategorie}}" data-author="">
               
               <div class="row pad-lft pad-rgt " id="design-survey">
                    <div class="col-12 pad-all survey-top-header">
                         Página 1 de 1
                         <div class="tot-page-question float-right"> 
                              <span class="badge " style="background:#00BF6F40;color:#212121;font-size:11px;padding:3px 10px 5px">Preguntas  3</span>
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="lni-frame-expand"></i>&nbsp;&nbsp;&nbsp;<i class="lni-zoom-in"></i> 
                         </div>
                    </div>
                    
                    <div class="col-12 pad-all survey-header">
                         <div class="btn btn-edit-name float-right">Editar Nombre </div>
                         <strong>{{$Template_->name }} </strong>
                    </div>

                    <div class="col-12 pad-all body-content" >
                         <div id="content-questions-survey">
                              @include('themes.'. $ConfigTheme_->name_theme .'.system.survey.template_questions')
                         </div>

                         <div id="add-question-survey" class="col-12 text-center new_question_add " style="display:none" >
                              <div class="row br-1 bl-1 bt-1 border-dark pad-top pad-lft " style="font-weight:border;color:#666;font-size:12px">
                                   Configurar Nueva Pregunta.
                              </div>
                              <div class="row pad-all">
                                   <div class="col col-sm-8 questions_title" style="border:none !important ">
                                        <input id="name_question_new" name="name_question_new" type="text" class="form-control" placeholder="Titulo de la Pregunta " style="border:none !important ">
                                        <input id="new_category_question" name="new_category_question" value="{{$Template_->id_categorie}}" type="hidden" class="form-control"  style="border:none !important ">
                                   </div>
                                   <div class="col col-sm-4 questions_type" style="border:none !important ">
                                        @include('themes.'. $ConfigTheme_->name_theme .'.system.survey.questions_type')
                                   </div>
                              </div>
                              <!--
                              <div class="row bl-1 br-1 border-dark ">
                                   <div class="line-separated bt-1 border-dark"></div>
                              </div>
                              -->
                              
                              <div class="row pad-all br-1 bl-1 bb-1 bg-white ">
                                   <div class="col-lg-12 pad-btm pad-top ">
                                        <button id="add-new-question-template" type="button" class="btn btn-dark float-right" style="font-size:11px;">GUARDAR PREGUNTA</button>
                                        <button id="close-new-question-template" type="button" class="btn float-right" style="font-size:11px; margin-right:10px;">CANCELAR </button> &nbsp; 
                                   </div>
                              </div>
                         </div>

                         <div class="col-12 pad-all text-center" style="padding:20px">
                              <button type="button" id="Question_addSurvey" data-template="{{ $Template_->id }}" data-token="{{ $Template_->token }}" class="btn btn-bold btn-outline btn-dark " data-dismiss="modal"><i class="lni-plus"></i> Agregar Nueva Pregunta  </button>
                         </div>
                    </div>

               </div>
               

              
               </div>
               <div class="col-lg-1"></div>
          </div>

          


     </section>

</div>
@endsection