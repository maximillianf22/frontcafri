@extends('themes.'.$theme_->name_theme.'.templates.master')
@section('content-theme')
     <section class="content">
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
     <!-- modal new survey -->
     <div class="modal modal-fill fade modal-design" data-backdrop="false" id="modal-fill" tabindex="-1">
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
                              <select id="categorie_survey" class="form-control select2" name="categorie_survey" style="width: 100%;">
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
               <!--<a href="{{route('survey.create.design',csrf_token())}}" type="button" class="btn btn-bold btn-pure btn-success float-right">Crear Nueva Encuesta</a>-->
               </div>
          </div>
          </div>
     </div>
     <!-- modal new -->


     </section>

@endsection
