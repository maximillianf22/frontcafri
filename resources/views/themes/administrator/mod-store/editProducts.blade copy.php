@extends('themes.administrator.template.index')
@section('title', 'Inicio')
@section('content-theme')
<section class="content-wrapper">
     <section class="content-header">
          <h1>{{$Products->nameProduct}}</h1>
          <ol class="breadcrumb">
          <li class="breadcrumb-item active"></li>
          </ol>
     </section>
     <section class="content-body" style="padding:10px;" >
     <div class="row"><div class="col">
          
          <div class="box">
               <div class="box-body"> <div class="row">
                    <div class="col-lg-2">
                         <div class="imgEditProduct">
                              @if(!empty($Products->imageProduct))
                                   @if (file_exists( public_path().'/content/upload/store/'.$Products->imageProduct ))
                                        <img src="{{ asset('/content/upload/store/'.$Products->imageProduct) }}" alt="Producto" />
                                   @else
                                        $Products->imageProduct
                                   @endif
                              @else
                                   $Products->imageProduct
                              @endif
                         </div>
                         
                    </div>
                    
                    <div class="col-lg-10 ">
                    <form id="FrmEditProduct" action="{{route('admin.update.products',$Products->idProduct)}}" method="post"  name="frmEditProduct" files="true" enctype="multipart/form-data">
                         @csrf
                         @method('PUT')
                         <div class="row">
                              
                              <div class="col-lg-6 ">
                                   <div class="form-group">
                                        <label>Nombre del Producto</label>
                                        <input type="text" name="nameProduct" value="{{$Products->nameAttribute}}" class="form-control" placeholder="ingrese nombre">
                                   </div>
                                   <div class="form-group">
                                   <label>Descripción</label>
                                        <textarea class="form-control" name="decriptionProduct" rows="3" placeholder="Descripcion" >{{$Products->description}}</textarea>
                                   </div>
                              </div>

                              <div class="col-lg-6 ">
                                   <div class="row ">
                                        <div class="col-lg-8">
                                             <div class="form-group">
                                             <label>Categoria</label>
                                             <select name="Category_Product" class="form-control">
                                                  <option value="-">Escoger</option>
                                                  @foreach($Category as $Category)
                                                       @if($Category->id === $Products->categoriaAttribute)
                                                            <option value="{{$Category->id}}" selected > {{$Category->nameCategorie}}</option>
                                                       @else
                                                            <option value="{{$Category->id}}">{{$Category->nameCategorie}}</option>
                                                       @endif
                                                       
                                                  @endforeach
                                             </select>
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                             <label>En Oferta</label>
                                             <select name="offers" class="form-control">
                                                  <option value="0">No</option>
                                                  <option value="1">Si</option>
                                             </select>
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                            
                                        </div>
                                   </div>     
                                   <div class="row ">
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Precio Venta</label>
                                                  <input type="number" name="price_Product" value="{{$Products->priceProduct}}" class="form-control" placeholder="0.00">
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Precio Anterior</label>
                                                  <input type="number" name="previous_price" value="{{$Products->previous_price}}"  class="form-control" placeholder="0.00">
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Precio Venta</label>
                                                  <input type="number" name="priceProduct" class="form-control" placeholder="0.00">
                                             </div>
                                        </div>
                                   </div>
                                   <!----->
                                   <div class="row ">
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Inventario</label>
                                                  <input type="number" value="{{$Products->quantity}}" name="quantityProduct" class="form-control" placeholder="0.00">
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Control Stock</label>
                                                  <input type="number" name="stockProduct" value="{{$Products->stock}}"  class="form-control" placeholder="0.00">
                                             </div>
                                        </div>
                                        <div class="col-lg-4">
                                             <div class="form-group">
                                                  <label>Cnt x Unidad </label>
                                                  <input type="text" name="cntbyUnitProduct" value="{{$Products->cntbyUnit}}" class="form-control" placeholder="">
                                             </div>
                                        </div>

                                   </div>
                                   <!------>
                                   <div class="row ">
                                   <div class="col-lg-12 text-right">
                                        <button id="updEditProduct" type="submit" class="btn btn-info ">Actualizar Producto </button>
                                   </div>
                                   </div>
                                   
                                   
                              </div>
                             
                              
                         </div>
                             
                              
                    </form>
                    </div>

               </div></div>
          </div>

     </div></div>
     </section>
</section>
@endsection