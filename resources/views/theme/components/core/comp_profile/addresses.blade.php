@extends('theme.templates.'.$Config_->nameDirectory.'.'.$Config_->themeTemplate)
@section('content-store-theme')
@include('theme.includes.defines')
<br /><br /><br /><br /><br />
<div class="album pad-top bg-white ">
  <div class="container pad-top">
     <div class="row pad-all"> 
          
          <!--
          <div class="container-fluid">
               <div class="row">
                    <div class="col-md-7 col-sm-7 col pad-all "><h4 class="box-title">Direcciones Actuales </h4></div>
                    <div class="col-md-5 col-sm-5 col pad-all " style="text-align: right"> <a class="btn-new-outline" href="{{route('account.addresses.create')}}"  >+ Agregar Dirección </a> </div>
               </div>

               @foreach($addresses_ as $address)
               <div class="items_ row pad-all">
                    <div class="col-xs-6 col-sm-6 col-md-8   brd_  ">
                         <span class="address_item">{{$address->addrees}}</span><br />Observaciones : {{$address->comments}}
                    </div>
                    <div class="col-xs-3 col-sm-1 col-md-1   brd_ text-center ">
                         Editar
                    </div>
                    <div class="col-xs-3 col-sm-1 col-md-1   brd_ text-center">
                         Eliminar
                    </div>
               </div>
               @endforeach
          </div>
     -->
          
          
     <div class="box" style="border:none">
          <div class="box-header" style="border-bottom:none !important " >
               <h4 class="box-title">Mis Direcciones </h4>
               <a href="{{route('account.addresses.create')}}" style="float:right"><button id="saveeditDir" type="submit" class="btn btn-info ">Crear </button></a>
          </div>
          <div class="box-body">
               <div class="row">
                    <div class="col-lg-12">
                        
                    <table id="tbl_Addresses" class="table table-responsive table-app-content" style="border-top:none !important">
                         <thead style="border-top:none !important ">
                         <tr>
                              <th>#</th>
                              <th class="text-center">Direccion </th>
                              <th class="text-center">Comentarios</th>
                              <th class="text-center"></th>
                         </tr>
                         </thead>
                         <tbody class="store-b-manager">
                              @foreach($addresses_ as $address)
                              <tr>
                                   <td></td>
                                   <td>{{$address->addrees}}</td>
                                   <td>{{$address->comments}}</td>
                                   <td><a href="{{route('account.addresses.edit',$address->id)}}" >Editar </a></td>
                                   <td><a href="{{route('account.addresses.delete',$address->id)}}">Eliminar</a></td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>

                    </div>
               </div>
          </div>
     </div>
          
    

</div></div></div>

@endsection