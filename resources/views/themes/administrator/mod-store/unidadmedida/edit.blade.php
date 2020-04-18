@extends('themes.administrator.template.index')
@section('title', 'Unidades de Medida')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>{{$Unidades->nameValue}}</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
          <form id="FrmEditProduct" action="{{route('admin.unidad.update',$Unidades->id)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
               @csrf
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                    
                    </div>
                    
                    <div class="col-lg-10 ">
                        
                         
                         <div class="row">
                              <div class="col-lg-7 ">
                                   <div class="form-group">
                                        <label>Prefijo Categoria</label>
                                        <input type="text" name="name" value="{{$Unidades->nameValue}}" class="form-control" placeholder="Nombre de la Categoria" disabled required>
                                   </div>
                              </div>

                              <div class="col-lg-5 ">
                                   <div class="form-group">
                                        <label>Estado Categoria</label>
                                        <select name="state" class="form-control">
                                        <option value="1" <?php if($Unidades->idState===2){ echo "selected"; } ?> >Activo</option>
                                        <option value="2" <?php if($Unidades->idState===2){ echo "selected"; } ?> >Inactivo</option>
                                        <option value="3" >Enviar a Papelera</option>
                                        </select>
                                   </div>
                              </div>

                         </div>
                         <div class="row">
                         <div class="col-lg-12 ">
                              <div class="form-group">
                                   <textarea class="form-control" name="decription" rows="3" placeholder="Descripcion" >{{$Unidades->extra}}</textarea>
                              </div>
                         </div>     
                         </div>

                         <div class="row ">
                              <div class="col-lg-12 text-right">
                                   <button id="addNewProduct" type="submit" class="btn btn-info ">Actualizar Unidad</button>
                              </div>
                         </div>
                              
                    
                    </div>

               </div></div>
          </div>
          </form>

     </div></div>
     </section>
</section>
@endsection